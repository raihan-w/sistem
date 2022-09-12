<?php

namespace App\Controllers;

use App\Models\Model_Keluarga;
use App\Models\Model_Penduduk;

class Dashboard extends BaseController
{
    protected $penduduk, $keluarga;
    public function __construct()
    {
        $this->penduduk     = new Model_Penduduk();
        $this->keluarga     = new Model_Keluarga();
    }

    public function index()
    {
        $data['jml_kk'] = $this->keluarga->countAll();
        $data['jml_penduduk'] = $this->penduduk->countAll();
        $data['jml_L'] = $this->penduduk->where('jenkel', 'Laki-laki')->countAllResults();
        $data['jml_P'] = $this->penduduk->where('jenkel', 'Perempuan')->countAllResults();
        return view('dashboard', $data);
    }
}
