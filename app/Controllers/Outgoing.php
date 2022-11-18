<?php

namespace App\Controllers;

use App\Models\Model_Bedanama;
use App\Models\Model_Bidikmisi;
use App\Models\Model_Domisili;
use App\Models\Model_Kematian;
use App\Models\Model_Keterangan;
use App\Models\Model_Outgoing;
use App\Models\Model_Pengantar;
use App\Models\Model_Sktm;
use Dompdf\Dompdf;

class Outgoing extends BaseController
{
    protected $dompdf, $outgoing, $bedanama, $bidikmisi, $domisili, $keterangan, $kematian, $pengantar, $sktm;
    public function __construct()
    {
        $this->dompdf    = new Dompdf();
        $this->outgoing  = new Model_Outgoing();
        $this->bedanama  = new Model_Bedanama();
        $this->bidikmisi = new Model_Bidikmisi();
        $this->domisili = new Model_Domisili();
        $this->keterangan = new Model_Keterangan();
        $this->kematian = new Model_Kematian();
        $this->pengantar = new Model_Pengantar();
        $this->sktm = new Model_Sktm();
    }

    public function index()
    {
        $data['outgoing'] = $this->outgoing->findAll();
        return view('Persuratan/outgoing', $data);
    }

    public function detail($id)
    {
        $data['outgoing'] = $this->outgoing->find($id);
        return view('Persuratan/detail', $data);
    }

    public function upload($id)
    {
        if (!$this->validate([
            'lampiran'   => [
                'rules' => 'max_size[lampiran,2048]|ext_in[lampiran,pdf]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar',
                    'ext_in' => 'Format file tidak didukung',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back();
        }

        $lampiran = $this->request->getFile('lampiran');
        $fileName = $lampiran->getName();
        $lampiran->move('attachment');

        $this->outgoing->update($id, ['lampiran' => $fileName]);
        return redirect()->back();
    }

    public function delete($id)
    {
        $lampiran = $this->outgoing->find($id);
        if ($lampiran['lampiran'] != null) {
            unlink('attachment/' . $lampiran['lampiran']);
        }

        if ($lampiran['perihal'] == 'Beda Nama') {
            $this->bedanama->delete($lampiran['nomor_surat']);
        } elseif ($lampiran['perihal'] == 'Bidik Misi') {
            $this->bidikmisi->delete($lampiran['nomor_surat']);
        } elseif ($lampiran['perihal'] == 'Domisili') {
            $this->domisili->delete($lampiran['nomor_surat']);
        } elseif ($lampiran['perihal'] == 'Keterangan') {
            $this->keterangan->delete($lampiran['nomor_surat']);
        } elseif ($lampiran['perihal'] == 'Kematian') {
            $this->kematian->delete($lampiran['nomor_surat']);
        } elseif ($lampiran['perihal'] == 'Pengantar') {
            $this->pengantar->delete($lampiran['nomor_surat']);
        } elseif ($lampiran['perihal'] == 'Keterangan Tidak Mampu') {
            $this->sktm->delete($lampiran['nomor_surat']);
        }
        $this->outgoing->delete($id);
        return redirect()->to('outgoing')->with('message', 'Data deleted successfully');
    }

    public function unlink($id)
    {
        $lampiran = $this->outgoing->find($id);
        unlink('attachment/' . $lampiran['lampiran']);
        $this->outgoing->update($id, ['lampiran' => null]);
        return redirect()->back();
    }

}
