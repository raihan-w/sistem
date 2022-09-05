<?php

namespace App\Controllers;

use App\Models\ModelPenduduk;
use Dompdf\Dompdf;

class Persuratan extends BaseController
{
    protected $penduduk;
    public function __construct()
    {
        $this->penduduk = new ModelPenduduk();
    }

    public function form_bedanama()
    {
        $keyword = $this->request->getVar('keyword');

        $this->penduduk->join('keluarga', 'keluarga.nkk = penduduk.kk');        
        $data['pemohon'] = $this->penduduk->where('nik', $keyword)->first();
        return view('Persuratan/form_beda_nama', $data);
    }

    public function cetak_beda_nama()
    {
        # code...
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
