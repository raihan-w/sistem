<?php

namespace App\Controllers;

use App\Models\Model_Perangkat;
use App\Models\Model_Desa;

class Konfigurasi extends BaseController
{
    protected $perangkat, $desa;
    function __construct()
    {
        $this->perangkat = new Model_Perangkat();
        $this->desa = new Model_Desa();
    }

    public function desa()
    {
        $data['data'] = $this->desa->first();
        return view('Konfigurasi/desa', $data);
    }

    public function updateDesa($id)
    {
        if (!$this->validate([
            'logo'   => [
                'rules' => 'uploaded[logo]|max_size[logo,2048]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Unggah file diperlukan',
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
                unlink('img/'.$oldLogo);
            }
        }

        $data = array(
            'kode_pos'   => $this->request->getPost('kode_pos'),
            'logo'   => $nameLogo,
            'desa'      => $this->request->getPost('desa'),
            'kecamatan' => $this->request->getPost('kecamatan'),
            'kabupaten'   => $this->request->getPost('kabupaten'),
            'provinsi'      => $this->request->getPost('provinsi'),
            'alamat' => $this->request->getPost('alamat'),
        );
        $this->desa->update($id, $data);
        return redirect()->back();
    }

    public function perangkat()
    {
        $data['perangkat'] = $this->perangkat->findAll();
        return view('Konfigurasi/perangkat', $data);
    }

    public function insert()
    {
        if (!$this->validate([
            'nip'   => [
                'rules' => 'required|is_unique[perangkat_desa.nip]',
                'errors' => [
                    'required' => 'Form "{field}" harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'nama'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Form "{field}" harus diisi',
                ]
            ],
            'jabatan'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Form "{field}" harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = array(
            'nip'   => $this->request->getPost('nip'),
            'nama'   => $this->request->getPost('nama'),
            'jabatan'   => $this->request->getPost('jabatan'),
        );
        $this->perangkat->insert($data);
        return redirect()->back()->with('message', 'Data added successfully');
    }

    public function delete($id)
    {
        $this->perangkat->delete($id);
        return redirect()->back()->with('message', 'Data deleted successfully');
    }

    public function updatePerangkat($id)
    {
        $data = array(
            'nama'   => $this->request->getPost('nama'),
            'jabatan'   => $this->request->getPost('jabatan'),
        );
        $this->perangkat->update($id, $data);
        return redirect()->back()->with('message', 'Data updated successfully');
    }
}
