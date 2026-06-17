<?php
 
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProduit extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'designation' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'prix_unitaire' => [
                'type' => 'DOUBLE',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('produit');
    }

    public function down()
    {
        $this->forge->dropTable('produit');
    }
}
