<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\RawSql;
use CodeIgniter\Database\Migration;

class CreateTableKriteria extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'kode_kriteria' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'bobot' => [
                'type' => 'FLOAT',
            ],
            'jenis' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP')
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('kriteria', true);
    }

    public function down()
    {
        $this->forge->dropTable('kriteria', true);
    }
}
