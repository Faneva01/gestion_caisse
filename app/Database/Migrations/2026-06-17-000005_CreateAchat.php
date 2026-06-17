<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAchat extends Migration {
    public function up() {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_client' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('achat');
    }

    public function down() {
        $this->forge->dropTable('achat');
    }
}       