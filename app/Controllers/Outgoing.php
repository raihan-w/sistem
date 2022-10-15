<?php

namespace App\Controllers;

use Dompdf\Dompdf;

class Outgoing extends BaseController
{
    protected $dompdf, $bedanama;
    public function __construct()
    {
        $this->dompdf       = new Dompdf();
    }

    public function index()
    {
        return view('Persuratan/outgoing');
    }

    public function detail()
    {
        return view('Persuratan/detail');
    }


}
