<?php

namespace App\Controllers;

use App\Models\Model_Desa;
use App\Models\Model_Outgoing;
use App\Models\Model_Penduduk;
use App\Models\Model_Perangkat;
use App\Models\Model_Sktm;
use Dompdf\Dompdf;

class Sktm extends BaseController
{
    protected $dompdf, $penduduk, $perangkat, $sktm, $outgoing, $desa;
    public function __construct()
    {
        $this->dompdf       = new Dompdf();
        $this->desa         = new Model_Desa();
        $this->penduduk     = new Model_Penduduk();
        $this->perangkat    = new Model_Perangkat();
        $this->sktm         = new Model_Sktm();
        $this->outgoing     = new Model_Outgoing();
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
        if (!$this->validate([
            'nomor'   => [
                'rules' => 'required|is_unique[surat_tidakmampu.nomor]',
                'errors' => [
                    'required' => 'Form "{field}" harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'nik'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Form pemohon harus diisi',
                ]
            ],
            'no_pengantar'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Form nomor surat pengantar harus diisi'
                ]
            ],
            'isi'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Form keterangan harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('sktm');
        }

        $outgoing = [
            'nomor_surat' => $this->request->getPost('nomor'),
            'pemohon' => $this->request->getPost('nama'),
            'perihal' => $this->request->getPost('perihal'),
        ];
        $this->outgoing->insert($outgoing);

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
        $this->sktm->join('keluarga', 'keluarga.nkk=penduduk.kk');
        $this->sktm->join('perangkat_desa', 'perangkat_desa.nip = surat_tidakmampu.penandatangan');
        
        $print = [
            'data' => $this->sktm->find($id),
            'desa' => $this->desa->first(),
        ];

        $html = view('Surat/sktm', $print);
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'potrait');
        $this->dompdf->render();
        $this->dompdf->stream('Surat Keterangan Tidak Mampu-'.$id.'.pdf', array(
            "Attachment" => false
        ));
    }

}
