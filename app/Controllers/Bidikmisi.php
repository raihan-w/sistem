<?php

namespace App\Controllers;

use App\Models\Model_Bidikmisi;
use App\Models\Model_Penduduk;
use Dompdf\Dompdf;

class Bidikmisi extends BaseController
{
    protected $dompdf, $penduduk;
    public function __construct()
    {
        $this->dompdf       = new Dompdf();
        $this->bedanama     = new Model_Bidikmisi();
        $this->penduduk     = new Model_Penduduk();
    }

    public function index()
    {
        $data['data'] = $this->penduduk->findAll();
        return view('Persuratan/blangko_bidikmisi', $data);
    }

}
