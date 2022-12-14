<?php

namespace App\Controllers;

use App\Models\Model_Desa;
use App\Models\Model_Keterangan;
use App\Models\Model_Penduduk;
use App\Models\Model_Perangkat;
use Dompdf\Dompdf;

class Keterangan extends BaseController
{
    protected $dompdf, $penduduk, $perangkat, $keterangan, $desa;
    public function __construct()
    {
        $this->dompdf       = new Dompdf();
        $this->desa         = new Model_Desa();
        $this->penduduk     = new Model_Penduduk();
        $this->perangkat    = new Model_Perangkat();
        $this->keterangan   = new Model_Keterangan();
    }

    public function index()
    {
        $data = [
            'penduduk'  => $this->penduduk->findAll(),
            'perangkat' => $this->perangkat->orderBy('nip', 'DESC')->findAll(),
        ];
        return view('Persuratan/blangko_keterangan', $data);
    }

    public function print()
    {
        if (!$this->validate([
            'nomor'   => [
                'rules' => 'required|is_unique[surat_keterangan.nomor]',
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
            'isi'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Form keterangan harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = array(
            'nomor'         => $this->request->getPost('nomor'),
            'nik_pemohon'   => $this->request->getPost('nik'),
            'isi_surat'     => $this->request->getPost('isi'),
            'isi_tambahan'  => $this->request->getPost('isi_tambahan'),
            'due_date'       => $this->request->getPost('due_date'),
            'penandatangan' => $this->request->getPost('penandatangan'),
        );

        $this->keterangan->insert($data);
        $id = $this->request->getVar('nomor');
        $this->keterangan->select('nomor, penduduk.*, isi_surat, isi_tambahan, due_date, perangkat_desa.nama as nama_penandatangan, jabatan, created_at');
        $this->keterangan->join('penduduk', 'penduduk.nik = surat_keterangan.nik_pemohon');
        $this->keterangan->join('keluarga', 'keluarga.nkk=penduduk.kk');
        $this->keterangan->join('perangkat_desa', 'perangkat_desa.nip = surat_keterangan.penandatangan');

        $print = [
            'data' => $this->keterangan->find($id),
            'desa' => $this->desa->first(),
        ];

        $html = view('Surat/keterangan', $print);
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'potrait');
        $this->dompdf->render();
        $this->dompdf->stream('Surat Keterangan-'.$id.'.pdf', array(
            "Attachment" => false
        ));
    }

}
