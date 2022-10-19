<?php

namespace App\Controllers;

use App\Models\Model_Kematian;
use App\Models\Model_Outgoing;
use App\Models\Model_Penduduk;
use App\Models\Model_Perangkat;
use Dompdf\Dompdf;

class Kematian extends BaseController
{
    protected $dompdf, $penduduk, $perangkat, $kematian, $outgoing;
    public function __construct()
    {
        $this->dompdf       = new Dompdf();
        $this->penduduk     = new Model_Penduduk();
        $this->perangkat    = new Model_Perangkat();
        $this->kematian     = new Model_Kematian();
        $this->outgoing     = new Model_Outgoing();
    }

    public function index()
    {
        $data = [
            'penduduk'  => $this->penduduk->findAll(),
            'perangkat' => $this->perangkat->orderBy('nip', 'DESC')->findAll(),
        ];
        return view('Persuratan/blangko_kematian', $data);
    }

    public function print()
    {
        if (!$this->validate([
            'nomor'   => [
                'rules' => 'required|is_unique[surat_kematian.nomor]',
                'errors' => [
                    'required' => 'Form "{field}" harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'nik'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Form pemohon harus diisi',
                ]
            ],
            'pemohon'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Form pemohon harus diisi',
                ]
            ],
            'isi_surat'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Form keperluan harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('kematian')->withInput();
        }

        $outgoing = [
            'nomor_surat' => $this->request->getPost('nomor'),
            'pemohon' => $this->request->getPost('nama'),
            'perihal' => $this->request->getPost('perihal'),
        ];
        $this->outgoing->insert($outgoing);

        $data = array(
            'nomor'         => $this->request->getPost('nomor'),
            'pemohon'       => $this->request->getPost('pemohon'),
            'nik'           => $this->request->getPost('nik'),
            'isi_surat'     => $this->request->getPost('isi_surat'),
            'keterangan'    => $this->request->getPost('keterangan'),
            'due_date'      => $this->request->getPost('due_date'),
            'penandatangan' => $this->request->getPost('penandatangan'),
        );

        $this->kematian->insert($data);
        $id = $this->request->getVar('nomor');

        $this->kematian->select('nomor, pemohon, penduduk.*, alamat, isi_surat, keterangan, due_date, perangkat_desa.nama as nama_penandatangan, jabatan, created_at');
        $this->kematian->join('penduduk', 'penduduk.nik = surat_kematian.nik');
        $this->kematian->join('perangkat_desa', 'perangkat_desa.nip = surat_kematian.penandatangan');
        $print['data'] = $this->kematian->find($id);

        $html = view('Surat/kematian', $print);

        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'potrait');
        $this->dompdf->render();
        $this->dompdf->stream('Surat Keterangan Kematian.pdf', array(
            "Attachment" => false
        ));
    }
}
