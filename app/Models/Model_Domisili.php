<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Domisili extends Model
{
    protected $table = 'surat_domisili';
    protected $primaryKey = 'nomor';
    protected $allowedFields = [
        'nomor', 'nik_pemohon', 'no_pengantar', 'tg_pengantar', 'isi_surat', 'penandatangan'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}