<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Sktm extends Model
{
    protected $table = 'surat_tidakmampu';
    protected $primaryKey = 'nomor';
    protected $allowedFields = [
        'nomor', 'nik_pemohon', 'no_pengantar', 'tgl_pengantar', 'isi_surat', 'penandatangan'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
