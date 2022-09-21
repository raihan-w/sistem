<?php

namespace App\Controllers;

use App\Models\Model_Bedanama;
use App\Models\Model_Penduduk;
use Dompdf\Dompdf;

class Bedanama extends BaseController
{
    protected $dompdf, $penduduk;
    public function __construct()
    {
        $this->dompdf       = new Dompdf();
        $this->bedanama     = new Model_Bedanama();
        $this->penduduk     = new Model_Penduduk();
    }

    public function index()
    {
        $data['data'] = $this->penduduk->findAll();
        return view('Persuratan/blangko_bedanama', $data);
    }

    public function save()
    {
        dd($this->request->getVar());
    }
}
