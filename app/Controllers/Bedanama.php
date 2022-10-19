<?php

namespace App\Controllers;

use App\Models\Model_Bedanama;
use App\Models\Model_Outgoing;
use App\Models\Model_Penduduk;
use App\Models\Model_Perangkat;
use Dompdf\Dompdf;

class Bedanama extends BaseController
{
    protected $dompdf, $penduduk, $perangkat, $outgoing;
    public function __construct()
    {
        $this->dompdf    = new Dompdf();
        $this->bedanama  = new Model_Bedanama();
        $this->penduduk  = new Model_Penduduk();
        $this->perangkat = new Model_Perangkat();
        $this->outgoing  = new Model_Outgoing();
    }

    public function index()
    {
        $data = [
            'penduduk'  => $this->penduduk->findAll(),
            'perangkat' => $this->perangkat->orderBy('nip', 'DESC')->findAll(),
        ];
        return view('Persuratan/blangko_bedanama', $data);
    }

    public function print()
    {
        if (!$this->validate([
            'nomor'   => [
                'rules' => 'required|is_unique[surat_bedanama.nomor]',
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
            'penandatangan' => $this->request->getPost('penandatangan'),
        );
        $this->bedanama->insert($data);

        $outgoing = [
            'nomor_surat' => $this->request->getPost('nomor'),
            'pemohon' => $this->request->getPost('nama'),
            'perihal' => $this->request->getPost('perihal'),
        ];
        $this->outgoing->insert($outgoing);

        $id = $this->request->getVar('nomor');
        $this->bedanama->select('nomor, penduduk.*, isi_surat, perangkat_desa.nama as nama_penandatangan, jabatan, created_at');
        $this->bedanama->join('penduduk', 'penduduk.nik = surat_bedanama.nik_pemohon');
        $this->bedanama->join('perangkat_desa', 'perangkat_desa.nip = surat_bedanama.penandatangan');
        $print['data'] = $this->bedanama->find($id);

        $html = view('Surat/bedanama', $print);

        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'potrait');
        $this->dompdf->render();
        $this->dompdf->stream('Surat Beda Nama.pdf', array(
            "Attachment" => false
        ));
    }
}
