<?php

namespace App\Controllers;

use App\Models\Model_Bedanama;
use App\Models\Model_Penduduk;
use App\Models\Model_Perangkat;
use Dompdf\Dompdf;

class Bedanama extends BaseController
{
    protected $dompdf, $penduduk;
    public function __construct()
    {
        $this->dompdf       = new Dompdf();
        $this->bedanama     = new Model_Bedanama();
        $this->penduduk     = new Model_Penduduk();
        $this->perangkat    = new Model_Perangkat();
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
        // dd($this->request->getVar());
        
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
            'nama_pemohon'  => $this->request->getPost('nama'),
            'jk_pemohon'    => $this->request->getPost('jenkel'),
            'tpt_lahir'     => $this->request->getPost('tpt_lahir'),
            'tgl_lahir'     => $this->request->getPost('tgl_lahir'),
            'agama'         => $this->request->getPost('agama'),
            'warganegara'   => $this->request->getPost('status'),
            'pekerjaan'     => $this->request->getPost('pekerjaan'),
            'alamat'        => $this->request->getPost('alamat'),
            'isi_surat'     => $this->request->getPost('isi'),
            'penandatangan' => $this->request->getPost('penandatangan'),
        );

        $this->bedanama->insert($data);
        $id = $this->request->getVar('nomor');
        $this->bedanama->join('perangkat_desa', 'perangkat_desa.nip = surat_bedanama.penandatangan');
        $print['data'] = $this->bedanama->find($id);
        
        $html = view('Surat/bedanama', $print);

        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'potrait');
        $this->dompdf->render();
        $this->dompdf->stream('Surat Beda Nama - '.$id.'.pdf', array(
            "Attachment" => false
        ));
    }
}
