<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SeederPendidikan extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id'            => '1',
                'pendidikan'    => 'Tidak/Belum Sekolah'
            ],
            [
                'id'            => '2',
                'pendidikan'    => 'Belum Tamat SD/Sederajat'
            ],
            [
                'id'            => '3',
                'pendidikan'    => 'Tamat SD/Sederajat'
            ],
            [
                'id'            => '4',
                'pendidikan'    => 'SLTP/Sederajat'
            ],
            [
                'id'            => '5',
                'pendidikan'    => 'SLTA/Sederajat'
            ],
            [
                'id'            => '6',
                'pendidikan'    => 'Diploma I/II'
            ],
            [
                'id'            => '7',
                'pendidikan'    => 'Akademi/Diploma III/Sarjana Muda'
            ],
            [
                'id'            => '8',
                'pendidikan'    => 'Diploma IV/Strata I'
            ],
            [
                'id'            => '9',
                'pendidikan'    => 'Strata II'
            ],
            [
                'id'            => '10',
                'pendidikan'    => 'Strata III'
            ],
        ];
        $this->db->table('pendidikan')->insertBatch($data);
    }
}
