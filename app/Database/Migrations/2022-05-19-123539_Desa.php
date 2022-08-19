<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Desa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_desa'           => ['type'  => 'int', 'constraint'   => 10],
            'kode_pos'          => ['type'  => 'int', 'constraint'   => 5],
            'logo'              => ['type'  => 'varchar', 'constraint'  => 100, 'default'   => 'default.jpg'],
            'desa'              => ['type'  => 'varchar', 'constraint'  => 100],
            'kecamatan'         => ['type'  => 'varchar', 'constraint'  => 100],
            'kabupaten'         => ['type'  => 'varchar', 'constraint'  => 100],
            'provinsi'          => ['type'  => 'varchar', 'constraint'  => 100],
            'alamat'            => ['type'  => 'varchar', 'constraint'  => 255],
            'nip'               => ['type'  => 'int', 'constraint'  => 20],
            'kades'             => ['type'  => 'varchar', 'constraint'  => 255],
        ]);
        $this->forge->addPrimaryKey('id_desa');
        $this->forge->createTable('desa');
    }

    public function down()
    {
        $this->forge->dropTable('desa');
    }
}
