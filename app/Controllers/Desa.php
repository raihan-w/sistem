<?php

namespace App\Controllers;

use App\Models\Model_Desa;

class Desa extends BaseController
{
    protected $perangkat, $desa;
    function __construct()
    {
        $this->desa = new Model_Desa();
    }

    public function desa()
    {
        $data['data'] = $this->desa->first();
        return view('Konfigurasi/desa', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'logo'   => [
                'rules' => 'max_size[logo,2048]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran file maksimal 2mb',
                    'is_image' => 'Format file tidak didukung',
                    'mime_in' => 'Extension file yang diperbolehkan .jpg .jpeg atau .png',
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
            if ($oldLogo != 'default.jpg') {
                unlink('img/' . $oldLogo);
            }
        }

        $data = array(
            'kode_desa'   => $this->request->getPost('kode_desa'),
            'kode_pos'   => $this->request->getPost('kode_pos'),
            'logo'   => $nameLogo,
            'desa'      => $this->request->getPost('desa'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kabupaten'   => $this->request->getPost('kabupaten'),
            'provinsi'      => $this->request->getPost('provinsi'),
            'alamat' => $this->request->getPost('alamat'),
        );
        $this->desa->update($id, $data);
        return redirect()->back()->with('message', 'Data updated successfully');;
    }

}