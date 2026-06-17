<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AppSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('user')->insertBatch([
            [
                'nom' => 'admin',
                'mdp' => password_hash('admin123', PASSWORD_DEFAULT)
            ],
            [
                'nom' => 'vendeur',
                'mdp' => password_hash('vendeur123', PASSWORD_DEFAULT)
            ]
        ]);

        $this->db->table('client')->insertBatch([
            ['nom' => 'Rakoto', 'contact' => '0341234567'],
            ['nom' => 'Rabe', 'contact' => '0339876543'],
            ['nom' => 'Rasoa', 'contact' => '0321112233']
        ]);

        $this->db->table('produit')->insertBatch([
            ['designation' => 'Stylo', 'prix_unitaire' => 1000],
            ['designation' => 'Cahier', 'prix_unitaire' => 2500],
            ['designation' => 'Crayon', 'prix_unitaire' => 500]
        ]);

        /*
         */

        for ($i = 0; $i < 3; $i++) {
            $this->db->table('caisse')->insert([
                'id' => null
            ]);
        }

        $this->db->table('achat')->insertBatch([
            ['id_client' => 1],
            ['id_client' => 2],
            ['id_client' => 3]
        ]);

        $this->db->table('achat_produit')->insertBatch([
            [
                'id_achat' => 1,
                'id_produit' => 1,
                'id_caisse' => 1,
                'quantite' => 2,
                'date_achat' => '2026-06-17'
            ],
            [
                'id_achat' => 2,
                'id_produit' => 2,
                'id_caisse' => 2,
                'quantite' => 1,
                'date_achat' => '2026-06-17'
            ],
            [
                'id_achat' => 3,
                'id_produit' => 3,
                'id_caisse' => 3,
                'quantite' => 5,
                'date_achat' => '2026-06-17'
            ]
        ]);
    }
}