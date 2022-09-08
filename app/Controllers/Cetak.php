<?php

namespace App\Controllers;

use App\Models\ModelDesa;
use Dompdf\Dompdf;
use Dompdf\Options;

class Cetak extends BaseController
{
    protected $dompdf, $desa;
    public function __construct()
    {
        $this->dompdf = new Dompdf();
        $this->desa = new ModelDesa();
    }

    public function print_beda_nama()
    {
        $html = view('cetak/beda_nama');

        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'potrait');
        $this->dompdf->render();
        $this->dompdf->stream('Surat Keterangan Beda Nama.pdf', array(
            "Attachment" => false
        ));

        // return view('Cetak/beda_nama');
    }
}
