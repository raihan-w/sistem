<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKeluarga extends Model
{
    protected $table = 'keluarga';
    protected $primaryKey = 'nkk';
    protected $allowedFields = ['nkk', 'alamat', 'rt', 'rw'];
}
