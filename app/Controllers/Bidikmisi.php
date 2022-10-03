<?php

namespace App\Controllers;

use App\Models\Model_Bidikmisi;
use App\Models\Model_Penduduk;
use App\Models\Model_Perangkat;
use Dompdf\Dompdf;

class Bidikmisi extends BaseController
{
    protected $dompdf, $penduduk, $perangkat;
    public function __construct()
    {
        $this->dompdf       = new Dompdf();
        $this->bidikmisi     = new Model_Bidikmisi();
        $this->penduduk     = new Model_Penduduk();
        $this->perangkat    = new Model_Perangkat();
    }

    public function index()
    {
        $data = [
            'penduduk' => $this->penduduk->findAll(),
            'perangkat' => $this->perangkat->orderBy('nip', 'DESC')->findAll(),
        ];
        return view('Persuratan/blangko_bidikmisi', $data);
    }

    public function print()
    {
        if (!$this->validate([
            'nomor'   => [
                'rules' => 'required|is_unique[surat_bidikmisi.nomor]',
                'errors' => [
                    'required' => 'Form "{field}" harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'nik'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Form data orang tua harus diisi',
                ]
            ],
            'nik_ank'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Form data anak harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = array(
            'nomor'      => $this->request->getPost('nomor'),
            'nik_ortu'   => $this->request->getPost('nik'),
            'nik_anak'   => $this->request->getPost('nik_ank'),
            'penghasilan'  => $this->request->getPost('penghasilan'),
            'penandatangan' => $this->request->getPost('penandatangan'),
        );
        $this->bidikmisi->insert($data);
        $id = $this->request->getVar('nomor');
        $this->bidikmisi->select(
            'nomor, nik_ortu,ortu.nama AS nama_ortu, ortu.tpt_lahir AS tpt_ortu, ortu.tgl_lahir AS tgl_ortu, ortu.pekerjaan AS pkj_ortu, ortu.pernikahan AS pernikahan_ortu, gaji_ortu, nik_anak, 
            anak.nama AS nama_anak, anak.tpt_lahir AS tpt_anak, anak.tgl_lahir AS tgl_anak, anak.pekerjaan AS pkj_anak, perangkat_desa.nama as nama_penandatangan, jabatan, created_at'
        );
        $this->bidikmisi->join('penduduk as ortu', 'ortu.nik = surat_bidikmisi.nik_ortu');
        $this->bidikmisi->join('penduduk as anak', 'anak.nik = surat_bidikmisi.nik_anak');
        $this->bidikmisi->join('perangkat_desa', 'perangkat_desa.nip = surat_bidikmisi.penandatangan');
        $print['data'] = $this->bidikmisi->find($id);

        $html = view('Surat/bidikmisi', $print);
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'potrait');
        $this->dompdf->render();
        $this->dompdf->stream('Surat Beda Nama - '.$id.'.pdf', array(
            "Attachment" => false
        ));
    }
}
