<?php

namespace App\Controllers;

use App\Models\Model_Desa;
use App\Models\Model_Outgoing;
use App\Models\Model_Penduduk;
use App\Models\Model_Pengantar;
use App\Models\Model_Perangkat;
use Dompdf\Dompdf;

class Pengantar extends BaseController
{
    protected $dompdf, $penduduk, $perangkat, $pengantar, $outgoing, $desa;
    public function __construct()
    {
        $this->dompdf    = new Dompdf();
        $this->desa      = new Model_Desa();
        $this->penduduk  = new Model_Penduduk();
        $this->perangkat = new Model_Perangkat();
        $this->pengantar = new Model_Pengantar();
        $this->outgoing  = new Model_Outgoing();
    }

    public function index()
    {
        $data = [
            'penduduk'  => $this->penduduk->findAll(),
            'perangkat' => $this->perangkat->orderBy('nip', 'DESC')->findAll(),
        ];
        return view('Persuratan/blangko_pengantar', $data);
    }

    public function print()
    {
        if (!$this->validate([
            'nomor'   => [
                'rules' => 'required|is_unique[surat_pengantar.nomor]',
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
            'isi'   => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Form keterangan harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->to('pengantar');
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
            'isi_surat'     => $this->request->getPost('isi'),
            'isi_tambahan'  => $this->request->getPost('isi_tambahan'),
            'due_date'       => $this->request->getPost('due_date'),
            'penandatangan' => $this->request->getPost('penandatangan'),
        );

        $this->pengantar->insert($data);
        $id = $this->request->getVar('nomor');
        $this->pengantar->select('nomor, penduduk.*, isi_surat, isi_tambahan, due_date, perangkat_desa.nama as nama_penandatangan, jabatan, created_at');
        $this->pengantar->join('penduduk', 'penduduk.nik = surat_pengantar.nik_pemohon');
        $this->pengantar->join('keluarga', 'keluarga.nkk=penduduk.kk');
        $this->pengantar->join('perangkat_desa', 'perangkat_desa.nip = surat_pengantar.penandatangan');
        
        $print = [
            'data' => $this->pengantar->find($id),
            'desa' => $this->desa->first(),
        ];

        $html = view('Surat/pengantar', $print);
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'potrait');
        $this->dompdf->render();
        $this->dompdf->stream('Surat Pengantar-'.$id.'.pdf', array(
            "Attachment" => false
        ));
    }

}
