<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Kematian extends Model
{
    protected $table = 'surat_kematian';
    protected $primaryKey = 'nomor';
    protected $allowedFields = [
        'nomor', 'pemohon', 'nik', 'isi_surat', 'keterangan', 'due_date', 'penandatangan'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
