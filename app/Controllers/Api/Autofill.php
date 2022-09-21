<?php

namespace App\Controllers\Api;

use App\Models\Model_Penduduk;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Autofill extends ResourceController
{
    use ResponseTrait;
    protected $penduduk;
    public function __construct()
    {
        $this->penduduk     = new Model_Penduduk();
    }

    public function show($id = null)
    {
        $this->penduduk->join('keluarga', 'keluarga.nkk = penduduk.kk');
        $data = $this->penduduk->find($id);
        return $this->respond($data);
    }
}
