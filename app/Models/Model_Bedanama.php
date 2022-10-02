<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Bedanama extends Model
{
    protected $table = 'surat_bedanama';
    protected $primaryKey = 'nomor';
    protected $allowedFields = [
        'nomor', 'isi_surat', 'nik_pemohon', 'penandatangan'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
