<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class CreateTableNilaiV extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_alternatif' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true
            ],
            'id_kriteria' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true
            ],
            'nilai' => [
                'type' => 'FLOAT',
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_alternatif', 'alternatif', 'id');
        $this->forge->addForeignKey('id_kriteria', 'kriteria', 'id');
        $this->forge->createTable('nilai_v', true);
    }

    public function down()
    {
        $this->forge->dropTable('nilai_v', true);
    }
}
