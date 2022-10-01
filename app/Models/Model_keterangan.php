<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Bedanama extends Model
{
    protected $table = 'surat_keterangan';
    protected $primaryKey = 'nomor';
    protected $allowedFields = [
        'nomor', 'isi_surat', 'nik_pemohon', 'nama_pemohon', 'jk_pemohon', 'tpt_lahir', 'tgl_lahir', 'agama', 'warganegara', 'pekerjaan', 'alamat', 'penandatangan'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
