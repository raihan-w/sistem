<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Surat extends Model
{
    protected $table = 'surat_keluar';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nomor', 'perihal'];
}
