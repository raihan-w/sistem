<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Pengantar extends Model
{
    protected $table = 'surat_pengantar';
    protected $primaryKey = 'nomor';
    protected $allowedFields = [
        'nomor', 'isi_surat', 'isi_tambahan', 'nik_pemohon', 'due_date', 'penandatangan'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
