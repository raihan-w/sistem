<?php

namespace App\Controllers;

use App\Models\Model_Dokumen;
use App\Models\Model_Keluarga;
use App\Models\Model_Pendidikan;
use App\Models\Model_Penduduk;

class Kependudukan extends BaseController
{
    protected $penduduk, $keluarga, $pendidikan;
    public function __construct()
    {
        $this->penduduk    = new Model_Penduduk();
        $this->pendidikan  = new Model_Pendidikan();
        $this->keluarga    = new Model_Keluarga();
        $this->dokumen     = new Model_Dokumen();
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
            'domisili'      => $this->request->getPost('domisili'),
        );

        $keluarga = array(
            'nkk'            => $this->request->getPost('kk'),
            'alamat'         => $this->request->getPost('alamat'),
            'rt'             => $this->request->getPost('rt'),
            'rw'             => $this->request->getPost('rw'),
        );

        $this->keluarga->ignore(true)->insert($keluarga);
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
        $this->dokumen->join('penduduk', 'penduduk.nik = dokumen.nik');
        $data = [
            'penduduk'    => $this->penduduk->find($id),
            'pendidikan'  => $this->pendidikan->findAll(),
            'dokumen'     => $this->dokumen->findAll(),
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
            'domisili'      => $this->request->getPost('domisili'),
        );

        $this->penduduk->update($id, $data);
        return redirect()->back()->with('message', 'Data updated successfully');
    }

    public function keluarga()
    {
        $this->keluarga->select('nkk, alamat, rt, rw, count(kk) as jml, nama');
        $this->keluarga->join('penduduk', 'penduduk.kk = keluarga.nkk', 'LEFT');
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
            $data = $spreadsheet->getActiveSheet()->toArray();

            foreach ($data as $key => $row) {
                if ($key == 0) {
                    continue;
                }

                $keluarga = [
                    'nkk' => $row[2],
                    'alamat' => $row[14],
                    'rt' => $row[15],
                    'rw' => $row[16],
                ];
                $this->keluarga->ignore(true)->insert($keluarga);

                if ($row[9] == 'Tidak/Belum Sekolah' || $row[9] == 'Tidak Sekolah' || $row[9] == 'Belum Sekolah') {
                    $pendidikan = 1;
                } elseif ($row[9] == 'Belum Tamat SD/Sederajat') {
                    $pendidikan = 2;
                } elseif ($row[9] == 'Tamat SD/Sederajat' || $row[9] == 'SD' || $row[9] == 'SDLB' || $row[9] == 'Paket A') {
                    $pendidikan = 3;
                } elseif ($row[9] == 'SLTP/Sederajat' || $row[9] == 'SMP' || $row[9] == 'MTS' || $row[9] == 'Paket B') {
                    $pendidikan = 4;
                } elseif ($row[9] == 'SLTA/Sederajat' || $row[9] == 'SLTA' || $row[9] == 'SMA' || $row[9] == 'SMK' || $row[9] == 'MAN' || $row[9] == 'Paket C') {
                    $pendidikan = 5;
                } elseif ($row[9] == 'Diploma I/II' || $row[9] == 'Diploma I' || $row[9] == 'Diploma II' || $row[9] == 'D-1' || $row[9] == 'D-2' || $row[9] == 'D1' || $row[9] == 'D2') {
                    $pendidikan = 6;
                } elseif ($row[9] == 'Akademi/Diploma III/Sarjana Muda' || $row[9] == 'Diploma III/Sarjana Muda' || $row[9] == 'Diploma 3/Sarjana Muda' || $row[9] == 'Diploma III' || $row[9] == 'Sarjana Muda' || $row[9] == 'D-3' || $row[9] == 'D3') {
                    $pendidikan = 7;
                } elseif ($row[9] == 'Diploma IV/Strata I' || $row[9] == 'Diploma IV' || $row[9] == 'Strata I' || $row[9] == 'D-4' || $row[9] == 'S-1' || $row[9] == 'D4' || $row[9] == 'S1') {
                    $pendidikan = 8;
                } elseif ($row[9] == 'Strata II' || $row[9] == 'S-2' || $row[9] == 'S2') {
                    $pendidikan = 9;
                } elseif ($row[9] == 'Strata III' || $row[9] == 'S-3' || $row[9] == 'S3') {
                    $pendidikan = 10;
                }

                $penduduk = [
                    'nik' => $row[1],
                    'kk' => $row[2],
                    'nama' => $row[3],
                    'tpt_lahir' => $row[4],
                    'tgl_lahir' => $row[5],
                    'jenkel' => $row[6],
                    'goldar' => $row[7],
                    'pernikahan' => $row[8],
                    'pendidikan' => $pendidikan,
                    'agama' => $row[10],
                    'hub_keluarga' => $row[11],
                    'pekerjaan' => $row[12],
                    'status' => $row[13],
                    'domisili' => $row[17],
                ];
                $this->penduduk->ignore(true)->insert($penduduk);
            }
            return redirect()->to('penduduk')->with('message', 'Data Excel Berhasil Diimport');
        } else {
            return redirect()->back()->with('error', 'Format File Tidak Sesuai');
        }
    }
}
