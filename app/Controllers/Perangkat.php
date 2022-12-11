<?php

namespace App\Controllers;

use App\Models\Model_Perangkat;

class Perangkat extends BaseController
{
    protected $perangkat, $desa;
    function __construct()
    {
        $this->perangkat = new Model_Perangkat();
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

    public function update($id)
    {
        $data = array(
            'nama'   => $this->request->getPost('nama'),
            'jabatan'   => $this->request->getPost('jabatan'),
        );
        $this->perangkat->update($id, $data);
        return redirect()->back()->with('message', 'Data updated successfully');
    }
}
