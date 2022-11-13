<?php

namespace App\Controllers;

use App\Models\Model_Dokumen;

class Dokumen extends BaseController
{
    protected $dokumen;
    public function __construct()
    {
        $this->dokumen = new Model_Dokumen();
    }

    public function upload ($id)
    {
        if (!$this->validate([
            'file'   => [
                'rules' => 'max_size[file,2048]|is_image[file]|mime_in[file,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran file terlalu besar',
                    'is_image' => 'Format file tidak didukung',
                    'mime_in' => 'Format file tidak didukung',
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->to('penduduk/detail/'.$id)->withInput();
        }
        
        $file = $this->request->getFile('file');
        $fileName = $file->getName();
        $file->move('dokumen');

        $data = array(
            'nik' => $id,
            'dokumen' => $this->request->getPost('dokumen'),
            'file' => $fileName
        );
        $this->dokumen->insert($data);
        return redirect()->back()->to('penduduk/detail/'.$id);
    }

}
