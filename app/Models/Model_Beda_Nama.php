<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Beda_Nama extends Model
{
    protected $table = 'surat_beda_nama';
    protected $primaryKey = 'no_surat';
    protected $allowedFields = ['no_surat', 'isi_surat'];
}
