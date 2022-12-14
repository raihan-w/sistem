<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Penduduk extends Model
{
    protected $table = 'penduduk';
    protected $primaryKey = 'nik';
    protected $allowedFields = ['nik', 'kk', 'nama', 'tpt_lahir', 'tgl_lahir', 'jenkel', 'pernikahan', 'pendidikan', 'agama', 'goldar', 'pekerjaan', 'hub_keluarga', 'status', 'domisili'];

}
