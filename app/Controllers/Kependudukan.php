<?php

namespace App\Controllers;

use App\Models\ModelKeluarga;
use App\Models\ModelPendidikan;
use App\Models\ModelPenduduk;

class Kependudukan extends BaseController
{
    protected $penduduk, $keluarga, $pendidikan;
    public function __construct()
    {
        $this->penduduk     = new ModelPenduduk();
        $this->pendidikan   = new ModelPendidikan();
        $this->keluarga     = new ModelKeluarga();
    }

    public function penduduk()
    {
        $data['penduduk'] = $this->penduduk->findAll();
        return view('Penduduk/penduduk', $data);
    }

    public function create()
    {
        $data['pendidikan'] = $this->pendidikan->findAll();
        return view('Penduduk/tambah', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nik'   => [
                'rules' => 'required|is_unique[penduduk.nik]',
                'errors' => [
                    'required' => 'Form "{field}" harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'kk'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Form "{field}" harus diisi',
                ]
            ],
            'nama'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Form "{field}" harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $penduduk = array(
            'nik'           => $this->request->getPost('nik'),
            'kk'            => $this->request->getPost('kk'),
            'nama'          => $this->request->getPost('nama'),
            'tpt_lahir'     => $this->request->getPost('tempat_lahir'),
            'tgl_lahir'     => $this->request->getPost('tanggal_lahir'),
            'jenkel'        => $this->request->getPost('jenis_kelamin'),
            'agama'         => $this->request->getPost('agama'),
            'goldar'        => $this->request->getPost('gol_darah'),
            'pendidikan'    => $this->request->getPost('pendidikan'),
            'pekerjaan'     => $this->request->getPost('pekerjaan'),
            'pernikahan'    => $this->request->getPost('pernikahan'),
            'hub_keluarga'  => $this->request->getPost('hub_keluarga'),
            'status'        => $this->request->getPost('status'),
        );

        $keluarga = array(
            'nkk'            => $this->request->getPost('kk'),
            'alamat'         => $this->request->getPost('alamat'),
            'rt'             => $this->request->getPost('rt'),
            'rw'             => $this->request->getPost('rw'),
        );

        $id = $this->request->getPost('kk');
        $nkk = $this->keluarga->checkKeluarga($id);
        if ($id != $nkk['nkk']) {
            $this->keluarga->insert($keluarga);
        }

        $this->penduduk->insert($penduduk);
        return redirect()->to('/penduduk')->with('message', 'Data added successfully');
    }

    public function delete($id)
    {
        $this->penduduk->delete($id);
        return redirect()->back()->with('message', 'Data deleted successfully');
    }

    public function detail($id)
    {
        $this->penduduk->join('pendidikan', 'pendidikan.id = penduduk.pendidikan');
        $data = [
            'penduduk'      => $this->penduduk->find($id),
            'pendidikan'    => $this->pendidikan->findAll(),
        ];
        return view('Penduduk/detail', $data);
    }

    public function update($id)
    {
        $data = array(
            'kk'            => $this->request->getPost('kk'),
            'nama'          => $this->request->getPost('nama'),
            'tpt_lahir'     => $this->request->getPost('tempat_lahir'),
            'tgl_lahir'     => $this->request->getPost('tanggal_lahir'),
            'jenkel'        => $this->request->getPost('jenis_kelamin'),
            'agama'         => $this->request->getPost('agama'),
            'goldar'        => $this->request->getPost('gol_darah'),
            'pendidikan'    => $this->request->getPost('pendidikan'),
            'pekerjaan'     => $this->request->getPost('pekerjaan'),
            'pernikahan'    => $this->request->getPost('pernikahan'),
            'hub_keluarga'  => $this->request->getPost('hub_keluarga'),
            'status'        => $this->request->getPost('status'),
        );

        $this->penduduk->update($id, $data);
        return redirect()->back()->with('message', 'Data updated successfully');
    }

    public function keluarga()
    {
        $this->keluarga->select('nkk, alamat, rt, rw, count(kk) as jml');
        $this->keluarga->join('penduduk', 'penduduk.kk = keluarga.nkk', 'right');
        $this->keluarga->groupBy('nkk');
        $data['keluarga'] = $this->keluarga->findAll();
        return view('Penduduk/kepala_keluarga', $data);
    }

    public function kartu($id)
    {
        $this->penduduk->join('keluarga', 'keluarga.nkk = penduduk.kk');
        $this->penduduk->where('kk', $id);
        $data = [
            'list'  => $this->penduduk->findAll(),
            'kartu' => $this->keluarga->find($id),
        ];
        return view('Penduduk/kartu_keluarga', $data);
    }

    public function update_kk($id)
    {
        $data = [
            'alamat'    => $this->request->getPost('alamat'),
            'rt'        => $this->request->getPost('rt'),
            'rw'        => $this->request->getPost('rw'),
        ];
        $this->keluarga->update($id, $data);
        return redirect()->back()->with('message', 'Data updated successfully');
    }

    public function delete_kk($id)
    {
        $this->keluarga->delete($id);
        return redirect()->back()->to('keluarga')->with('message', 'Data deleted successfully');
    }

    public function import()
    {
        $file = $this->request->getFile('file-excel');
        $extension = $file->getClientExtension();
        if ($extension == 'xlsx' || $extension == 'xls' || $extension == 'xml') {
            if ($extension == 'xls') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } elseif ($extension == 'xml') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xml();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($file);
            $penduduk = $spreadsheet->getActiveSheet()->toArray();
            foreach ($penduduk as $key => $row) {
                if ($key == 0) {
                    continue;
                }

                $nik = $this->ModelPenduduk->checkPenduduk($key['1']);
                if ($key['1'] == $nik['nik']) {
                    continue;
                }

                $data = [
                    'nik' => $row[1],
                    'nama' => $row[1],
                    'tpt_lahir' => $row[1],
                    'tgl_lahir' => $row[1],
                    'jenkel' => $row[1],
                    'agama' => $row[1],
                    'goldar' => $row[1],
                    'pendidikan' => 0,
                    'pekerjaan' => $row[1],
                    'pernikahan' => $row[1],
                    'hub_keluarga' => $row[1],
                ];
                $this->penduduk->saveData($data);
            }
            return redirect()->back()->with('massage', 'Data Excel Berhasil Diimport');
        } else {
            return redirect()->back()->with('error', 'Format File Tidak Sesuai');
        }
    }
}
