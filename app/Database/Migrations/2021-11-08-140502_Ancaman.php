<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ancaman extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_anc'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_anc'       => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'penanggulangan'          => [
                'type'           => 'TEXT',
                'null'           => true,
            ],
            'created-at'       => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
            'updated-at'       => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id_anc', true);
        $this->forge->createTable('ancaman', true);
    }

    public function down()
    {
        $this->forge->dropTable('ancaman');
    }
}
