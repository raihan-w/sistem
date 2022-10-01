<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Perangkat extends Model
{
    protected $table = 'perangkat_desa';
    protected $primaryKey = 'nip';
    protected $allowedFields = ['nip', 'nama', 'jabatan'];
}
