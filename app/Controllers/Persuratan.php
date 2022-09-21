<?php

namespace App\Controllers;

use App\Models\Model_Bedanama;
use App\Models\Model_Desa;
use App\Models\Model_Penduduk;
use App\Models\Model_Surat;
use Dompdf\Dompdf;

class Persuratan extends BaseController
{
    protected $dompdf, $penduduk, $bedanama, $desa;
    public function __construct()
    {
        $this->dompdf = new Dompdf();
        $this->penduduk = new Model_Penduduk();
        $this->desa = new Model_Desa();
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
                'rules' => 'required|is_unique[surat_bedanama.no_surat]',
                'errors' => [
                    'required' => 'Form "Nomor Surat" harus diisi',
                    'is_unique' => 'Nomor surat sudah terdaftar'
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
            'nik_pemohon'    => $this->request->getPost('nik_pemohon'),
            'nama_pemohon'   => $this->request->getPost('nama_pemohon'),
            'isi_surat'      => $this->request->getPost('isi_surat'),
        );

        $this->bedanama->insert($data);
        return redirect()->to('Persuratan/print_beda_nama');
    }

    public function print_beda_nama()
    {

        $data = [
            'desa'      => $this->desa->first(),
            'bedanama'    => $this->bedanama->first(),
        ];

        $html = view('Surat/beda_nama', $data);

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

        $this->penduduk->join('keluarga', 'keluarga.nkk = penduduk.kk');
        $data['ortu'] = $this->penduduk->where('nik', $key1)->first();
        $this->penduduk->join('keluarga', 'keluarga.nkk = penduduk.kk');
        $data['anak'] = $this->penduduk->where('nik', $key2)->first();
        return view('Persuratan/form_bidik_misi', $data);
    }

    public function form_domisili()
    {
        $keyword = $this->request->getVar('keyword');

        $this->penduduk->join('keluarga', 'keluarga.nkk = penduduk.kk');
        $data['pemohon'] = $this->penduduk->where('nik', $keyword)->first();
        return view('Persuratan/form_domisili', $data);
    }

    public function form_keterangan()
    {
        $keyword = $this->request->getVar('keyword');

        $this->penduduk->join('keluarga', 'keluarga.nkk = penduduk.kk');
        $data['pemohon'] = $this->penduduk->where('nik', $keyword)->first();
        return view('Persuratan/form_keterangan', $data);
    }

    public function form_sktm()
    {
        $keyword = $this->request->getVar('keyword');

        $this->penduduk->join('keluarga', 'keluarga.nkk = penduduk.kk');
        $data['pemohon'] = $this->penduduk->where('nik', $keyword)->first();
        return view('Persuratan/form_sktm', $data);
    }

    public function form_kematian()
    {
        # code...
    }

    public function form_pengantar()
    {
        $keyword = $this->request->getVar('keyword');

        $this->penduduk->join('keluarga', 'keluarga.nkk = penduduk.kk');
        $data['pemohon'] = $this->penduduk->where('nik', $keyword)->first();
        return view('Persuratan/form_pengantar', $data);
    }
}
