<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDesa extends Model
{
    protected $table = 'desa';
    protected $primaryKey = 'id_desa';

    public function updateDesa($data)
    {
        $query = $this->db->table($this->table)->update($data);
        return $query;
    }
}
