<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKeluarga extends Model
{
    protected $table = 'keluarga';
    protected $primaryKey = 'nkk';
    protected $allowedFields = ['nkk', 'alamat', 'rt', 'rw'];

    public function checkKeluarga($id)
    {
        return $this->db->table($this->table)->where('nkk', $id)->get()->getRowArray();
    }

}
