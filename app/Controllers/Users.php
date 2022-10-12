<?php

namespace App\Controllers;

use App\Models\Model_User;
use \Myth\Auth\Entities\User;
use \Myth\Auth\Password;
use \Myth\Auth\Authorization\GroupModel;
use \Myth\Auth\Config\Auth as AuthConfig;

class Users extends BaseController
{
    protected $users, $groups, $auth, $config;
    public function __construct()
    {
        $this->users = new \Myth\Auth\Models\UserModel();
        $this->user = new Model_User();
        $this->groups = new \Myth\Auth\Authorization\GroupModel;
        $this->auth  = service('authentication');
        $this->config = config('Auth');
    }

    public function index()
    {
        $this->users->select('users.id as user_id, user_img, username, email, name as role');
        $this->users->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->users->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $data = [
            'users'  => $this->users->findAll(),
        ];
        return view('Users/users', $data);
    }

    public function user($id)
    {
        $this->users->select('users.id as user_id, user_img, username, email, name as role, group_id');
        $this->users->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->users->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $data = [
            'user'  => $this->users->find($id),
            'groups' => $this->groups->findAll(),
        ];
        return view('Users/user', $data);
    }


    public function profile()
    {
        return view('Users/profile');
    }

    public function create()
    {
        $data['config'] = $this->config;
        return view('Auth/register', $data);
    }

    public function save()
    {
        $users = model(UserModel::class);

        // Validate basics first since some password rules rely on these fields
        $rules = [
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Validate passwords since they can only be validated properly here
        $rules = [
            'password'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save the user
        $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
        $user = new User($this->request->getPost($allowedPostFields));

        $this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();

        // Ensure default group gets assigned if set
        if (!empty($this->config->defaultUserGroup)) {
            $users = $users->withGroup($this->config->defaultUserGroup);
        }

        if (!$users->save($user)) {
            return redirect()->back()->withInput()->with('errors', $users->errors());
        }

        if ($this->config->requireActivation !== null) {
            $activator = service('activator');
            $sent = $activator->send($user);

            if (!$sent) {
                return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
            }

            // Success!
            return redirect()->back()->with('message', lang('Auth.activationSuccess'));
        }

        // Success!
        return redirect()->back()->with('message', lang('Auth.registerSuccess'));
    }

    public function setPassword($id)
    {
        // Validate passwords since they can only be validated properly here
        $rules = [
            'password'     => 'required|strong_password',
            'pass_confirm' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        } else {
            $data = [
                'password_hash' => Password::hash($this->request->getVar('password')),
                'reset_hash' => null,
                'reset_at' => null,
                'reset_expires' => null,
            ];
            $this->users->update($id, $data);

            return redirect()->back()->with('message', 'Change password successfully');
        }
    }

    public function setGroup($id)
    {
        $groupId = $this->request->getVar('group');
        $this->groups->removeUserFromAllGroups($id);
        $this->groups->addUserToGroup($id, $groupId);
        return redirect()->back()->with('message', 'Change group successfully');
    }

    public function update($id)
    {
        if (!$this->validate([
            'user_img'   => [
                'rules' => 'max_size[user_img,4029]|is_image[user_img]|mime_in[user_img,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar',
                    'is_image' => 'Format file tidak didukung',
                    'mime_in' => 'Format file tidak didukung',
                ]
            ],
            'email'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Form "{field}" harus diisi',
                ]
            ],
            'username'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Form "{field}" harus diisi',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $fileImg = $this->request->getFile('user_img');
        $oldImg = $this->request->getVar('oldImg');
        if ($fileImg->getError() == 4) {
            $nameImg = $oldImg;
        } else {
            $nameImg = $fileImg->getRandomName();
            $fileImg->move('img/user_img', $nameImg);
            if ($oldImg != 'default.svg') {
                unlink('img/user_img/' . $oldImg);
            }
        }

        $data = array(
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'user_img' => $nameImg,
        );
        $this->user->update($id, $data);
        return redirect()->back()->with('message', 'User updated successfully');
    }

    public function delete($id)
    {
        $user = $this->users->find($id);
        if ($user->user_img !='default.svg') {
            unlink('img/user_img/'.$user->user_img);
        }

        $this->groups->removeUserFromAllGroups($id);
        $this->users->delete($id);
        return redirect()->to(base_url('users/index'))->with('message', 'Data deleted successfully');
    }
}
