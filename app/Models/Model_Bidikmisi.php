<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Bidikmisi extends Model
{
    protected $table = 'surat_bidikmisi';
    protected $primaryKey = 'nomor';
    protected $allowedFields = ['nomor', 'nik_ortu', 'nama_ortu', 'nik_anak', 'nama_jabatan',];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
