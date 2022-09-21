<?php

namespace App\Controllers;

use App\Models\Model_Penduduk;
use Dompdf\Dompdf;

class Domisili extends BaseController
{
    protected $dompdf, $penduduk;
    public function __construct()
    {
        $this->dompdf       = new Dompdf();
        $this->penduduk     = new Model_Penduduk();
    }

    public function index()
    {
        $data['data'] = $this->penduduk->findAll();
        return view('Persuratan/blangko_domisili', $data);
    }

    public function save()
    {
        dd($this->request->getVar());
    }
}
