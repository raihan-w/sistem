<?php

namespace App\Controllers;

use App\Models\Model_Outgoing;
use Dompdf\Dompdf;

class Outgoing extends BaseController
{
    protected $outgoing;
    public function __construct()
    {
        $this->outgoing   = new Model_Outgoing();
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

    public function upload()
    {
        if (!$this->validate([
            'lampiran'   => [
                'rules' => 'max_size[logo,2048]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar',
                    'is_image' => 'Format file tidak didukung',
                    'mime_in' => 'Format file tidak didukung',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }


}
