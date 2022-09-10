<?php

namespace App\Controllers;

use App\Models\Model_Bedanama;
use App\Models\ModelPenduduk;
use Dompdf\Dompdf;

class Persuratan extends BaseController
{
    protected $dompdf, $penduduk, $bedanama;
    public function __construct()
    {
        $this->dompdf = new Dompdf();
        $this->penduduk = new ModelPenduduk();
        $this->bedanama = new Model_Bedanama();
    }

    public function form_bedanama()
    {
        $keyword = $this->request->getVar('keyword');

        $this->penduduk->join('keluarga', 'keluarga.nkk = penduduk.kk');
        $data['pemohon'] = $this->penduduk->where('nik', $keyword)->first();
        return view('Persuratan/form_beda_nama', $data);
    }

    public function beda_nama()
    {
        if (!$this->validate([
            'no_surat'   => [
                'rules' => 'required|is_unique[penduduk.nik]',
                'errors' => [
                    'required' => 'Form "Nomor Surat" harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'isi_surat'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Form "Keterangan" harus diisi',
                ]
            ],
            'nik_pemohon'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Data Pemohon harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = array(
            'no_surat'       => $this->request->getPost('no_surat'),
            'isi_surat'      => $this->request->getPost('isi_surat'),
            'nik_pemohon'    => $this->request->getPost('nik_pemohon'),
            'nama_pemohon'   => $this->request->getPost('nama_pemohon')
        );

        $this->bedanama->insert($data);
        return redirect()->to('Persuratan/print_beda_nama');
    }

    public function print_beda_nama()
    {
        $html = view('Surat/beda_nama');

        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'potrait');
        $this->dompdf->render();
        $this->dompdf->stream('Surat Keterangan Beda Nama.pdf', array(
            "Attachment" => false
        ));
    }

    public function form_bidikmisi()
    {
        $key1 = $this->request->getVar('key1');
        $key2 = $this->request->getVar('key2');

        $data['ortu'] = $this->penduduk->where('nik', $key1)->first();
        $data['anak'] = $this->penduduk->where('nik', $key2)->first();
        return view('Persuratan/form_bidikmisi', $data);
    }

    public function form_domisili()
    {
        return view('Persuratan/form_domisili');
    }

    public function form_keterangan()
    {
        return view('Persuratan/form_keterangan');
    }

    public function form_sktm()
    {
        return view('Persuratan/form_sktm');
    }

    public function form_kematian()
    {
        # code...
    }

    public function form_pengantar()
    {
        return view('Persuratan/form_pengantar');
    }
}
