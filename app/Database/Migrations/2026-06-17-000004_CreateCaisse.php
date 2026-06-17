<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class CreateCaisse extends Migration {
    public function up() {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nom' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('caisse');
    }

    public function down() {
        $this->forge->dropTable('caisse');
    }
}
