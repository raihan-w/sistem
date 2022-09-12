<?php

namespace App\Controllers;

use App\Models\Model_Desa;

class Konfigurasi extends BaseController
{
    protected $desa;
    function __construct()
    {
        $this->desa = new Model_Desa();
    }

    public function profile()
    {
        $data['desa'] = $this->desa->first();
        return view('profile_desa', $data);
    }

    public function update()
    {
        if (!$this->validate([
            'logo'   => [
                'rules' => 'max_size[logo,2048]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar',
                    'is_image' => 'Format file tidak didukung',
                    'mime_in' => 'Format file tidak didukung',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $fileLogo = $this->request->getFile('logo');
        $oldLogo = $this->request->getVar('oldLogo');
        if ($fileLogo->getError() == 4) {
            $nameLogo = $oldLogo;
        } else {
            $nameLogo = $fileLogo->getName();
            $fileLogo->move('img');
        }

        $data = array(
            'id_desa'   => $this->request->getPost('id_desa'),
            'kode_pos'   => $this->request->getPost('kode_pos'),
            'logo'   => $nameLogo,
            'desa'      => $this->request->getPost('desa'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kabupaten'   => $this->request->getPost('kabupaten'),
            'provinsi'      => $this->request->getPost('provinsi'),
            'alamat' => $this->request->getPost('alamat'),
            'nip'      => $this->request->getPost('nip'),
            'kades' => $this->request->getPost('kades'),
        );
        $this->desa->updateDesa($data);
        return redirect()->back();
    }
}
