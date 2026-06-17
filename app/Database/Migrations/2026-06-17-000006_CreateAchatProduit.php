<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;


class CreateAchatProduit extends Migration {
    public function up() {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_achat' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_produit' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'id_caisse' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'quantite' => [
                'type' => 'INT',
                'constraint' => 4,
            ],
            'date_achat' => [
                'type' => 'DATE'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('achat_produit');
    }

    public function down() {
        $this->forge->dropTable('achat_produit');
    }
}