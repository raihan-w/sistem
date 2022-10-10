<?php

namespace App\Controllers;

use App\Models\Model_Penduduk;
use App\Models\Model_Perangkat;
use App\Models\Model_Sktm;
use Dompdf\Dompdf;

class Sktm extends BaseController
{
    protected $dompdf, $penduduk, $perangkat, $sktm;
    public function __construct()
    {
        $this->dompdf       = new Dompdf();
        $this->penduduk     = new Model_Penduduk();
        $this->perangkat    = new Model_Perangkat();
        $this->sktm         = new Model_Sktm();
    }

    public function index()
    {
        $data = [
            'penduduk'  => $this->penduduk->findAll(),
            'perangkat' => $this->perangkat->orderBy('nip', 'DESC')->findAll(),
        ];
        return view('Persuratan/blangko_sktm', $data);
    }

    public function print()
    {
        $data = array(
            'nomor'         => $this->request->getPost('nomor'),
            'nik_pemohon'   => $this->request->getPost('nik'),
            'no_pengantar'  => $this->request->getPost('no_pengantar'),
            'tgl_pengantar' => $this->request->getPost('tgl_pengantar'),
            'isi_surat'     => $this->request->getPost('isi'),
            'penandatangan' => $this->request->getPost('penandatangan'),
        );
        $this->sktm->insert($data);

        $id = $this->request->getVar('nomor');
        $this->sktm->select('nomor, penduduk.*, no_pengantar, tgl_pengantar, isi_surat, perangkat_desa.nama as nama_penandatangan, jabatan, created_at');
        $this->sktm->join('penduduk', 'penduduk.nik = surat_tidakmampu.nik_pemohon');
        $this->sktm->join('perangkat_desa', 'perangkat_desa.nip = surat_tidakmampu.penandatangan');
        $print['data'] = $this->sktm->find($id);

        $html = view('Surat/sktm', $print);

        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'potrait');
        $this->dompdf->render();
        $this->dompdf->stream('Surat Keterangan Tidak Mampu-'.$id.'.pdf', array(
            "Attachment" => false
        ));
    }

}
