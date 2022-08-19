<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenduduk extends Model
{
    protected $table = 'penduduk';
    protected $primaryKey = 'nik';

    public function saveData($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateData($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('nik' => $id));
        return $query;
    }

    public function cekData($id)
    {
        return $this->db->table($this->table)->where('nik', $id)->get()->getRowArray();
    }

}
