<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Bedanama extends Model
{
    protected $table = 'surat_bedanama';
    protected $primaryKey = 'no_surat';
    protected $allowedFields = ['no_surat', 'isi_surat', 'nik_pemohon', 'nama_pemohon'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
