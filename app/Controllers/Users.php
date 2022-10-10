<?php

namespace App\Controllers;

class Users extends BaseController
{
    protected $users;
    public function __construct()
    {
        $this->users = new \Myth\Auth\Models\UserModel();
    }

    public function index()
    {
        $this->users->select('username, email, name as role');
        $this->users->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->users->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $data['users'] = $this->users->findAll();
        return view('Users/users', $data);
    }

    public function profile()
    {
        return view('Users/profile');
    }
}
