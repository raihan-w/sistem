<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Dokumen extends Model
{
    protected $table = 'dokumen';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nik', 'dokumen', 'file'
    ];

    protected $useAutoIncrement = true;
}
