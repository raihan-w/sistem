<?php

namespace App\Controllers;

use App\Models\Model_Bedanama;
use Dompdf\Dompdf;

class Outgoing extends BaseController
{
    protected $dompdf, $bedanama;
    public function __construct()
    {
        $this->dompdf       = new Dompdf();
        $this->bedanama     = new Model_Bedanama();
    }

    public function index()
    {
        return view('Persuratan/outgoing');
    }


}
