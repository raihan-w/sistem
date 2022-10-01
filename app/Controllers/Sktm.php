<?php

namespace App\Controllers;

use App\Models\Model_Penduduk;
use App\Models\Model_Perangkat;
use Dompdf\Dompdf;

class Sktm extends BaseController
{
    protected $dompdf, $penduduk, $perangkat;
    public function __construct()
    {
        $this->dompdf       = new Dompdf();
        $this->penduduk     = new Model_Penduduk();
        $this->perangkat    = new Model_Perangkat();
    }

    public function index()
    {
        $data = [
            'penduduk'  => $this->penduduk->findAll(),
            'perangkat' => $this->perangkat->orderBy('nip', 'DESC')->findAll(),
        ];
        return view('Persuratan/blangko_sktm', $data);
    }

}
