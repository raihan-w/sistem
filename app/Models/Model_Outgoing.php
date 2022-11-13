<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Outgoing extends Model
{
    protected $table = 'surat_keluar';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nomor_surat', 'perihal', 'pemohon', 'lampiran'
    ];

    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
