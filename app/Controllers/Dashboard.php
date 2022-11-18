<?php

namespace App\Controllers;

use App\Models\Model_Desa;
use App\Models\Model_Keluarga;
use App\Models\Model_Penduduk;

class Dashboard extends BaseController
{
    protected $penduduk, $keluarga, $desa;
    public function __construct()
    {
        $this->penduduk     = new Model_Penduduk();
        $this->keluarga     = new Model_Keluarga();
        $this->desa         = new Model_Desa();
    }

    public function index()
    {
        $data = [
            'jml_kk'    => $this->keluarga->countAll(),
            'jml_penduduk'  => $this->penduduk->countAll(),
            'jml_L'     => $this->penduduk->where('jenkel', 'Laki-laki')->countAllResults(),
            'jml_P'     => $this->penduduk->where('jenkel', 'Perempuan')->countAllResults(),
            'desa'      => $this->desa->first(),
        ];
        return view('dashboard', $data);
    }

}
