<?php

namespace App\Controllers;

use App\Models\ModelKeluarga;
use App\Models\ModelPenduduk;

class Dashboard extends BaseController
{
    protected $penduduk, $keluarga;
    public function __construct()
    {
        $this->penduduk     = new ModelPenduduk();
        $this->keluarga     = new ModelKeluarga();
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
