<?php

namespace App\Controllers;

use App\Models\Model_Domisili;
use App\Models\Model_Outgoing;
use App\Models\Model_Penduduk;
use App\Models\Model_Perangkat;
use Dompdf\Dompdf;

class Domisili extends BaseController
{
    protected $dompdf, $penduduk, $perangkat, $domisili, $outgoing;
    public function __construct()
    {
        $this->dompdf    = new Dompdf();
        $this->penduduk  = new Model_Penduduk();
        $this->perangkat = new Model_Perangkat();
        $this->domisili  = new Model_Domisili();
        $this->outgoing  = new Model_Outgoing();
    }

    public function index()
    {
        $data = [
            'penduduk'  => $this->penduduk->findAll(),
            'perangkat' => $this->perangkat->orderBy('nip', 'DESC')->findAll(),
        ];
        return view('Persuratan/blangko_domisili', $data);
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
            'no_pengantar'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Form nomor surat pengantar harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $outgoing = [
            'nomor_surat' => $this->request->getPost('nomor'),
            'pemohon' => $this->request->getPost('nama'),
            'perihal' => $this->request->getPost('perihal'),
        ];
        $this->outgoing->insert($outgoing);

        $data = array(
            'nomor'         => $this->request->getPost('nomor'),
            'nik_pemohon'   => $this->request->getPost('nik'),
            'no_pengantar'  => $this->request->getPost('no_pengantar'),
            'tgl_pengantar' => $this->request->getPost('tgl_pengantar'),
            'isi_surat'     => $this->request->getPost('keterangan'),
            'penandatangan' => $this->request->getPost('penandatangan'),
        );
        $this->domisili->insert($data);

        $id = $this->request->getVar('nomor');
        $this->domisili->select('nomor, penduduk.*, alamat, isi_surat, no_pengantar, tgl_pengantar, perangkat_desa.nama as nama_penandatangan, jabatan, created_at');
        $this->domisili->join('penduduk', 'penduduk.nik = surat_domisili.nik_pemohon');
        $this->domisili->join('perangkat_desa', 'perangkat_desa.nip = surat_domisili.penandatangan');
        $print['data'] = $this->domisili->find($id);

        $html = view('Surat/domisili', $print);

        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'potrait');
        $this->dompdf->render();
        $this->dompdf->stream('Surat Domisili.pdf', array(
            "Attachment" => false
        ));
    }
}
