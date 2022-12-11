<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Desa extends Model
{
    protected $table = 'desa';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'kode_desa', 'desa', 'kode_pos', 'alamat', 'kecamatan', 'kabupaten', 'provinsi', 'logo'
    ];
}
