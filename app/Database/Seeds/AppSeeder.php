<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AppSeeder extends Seeder
{
    public function run()
    {
        /*
        |--------------------------------------------------------------------------
        | USERS
        |--------------------------------------------------------------------------
        */
        $users = [
            [
                'nom' => 'admin',
                'mdp' => password_hash('admin123', PASSWORD_DEFAULT)
            ],
            [
                'nom' => 'manager',
                'mdp' => password_hash('manager123', PASSWORD_DEFAULT)
            ],
            [
                'nom' => 'vendeur',
                'mdp' => password_hash('vendeur123', PASSWORD_DEFAULT)
            ]
        ];

        $this->db->table('user')->insertBatch($users);

        /*
        |--------------------------------------------------------------------------
        | CLIENTS
        |--------------------------------------------------------------------------
        */
        $clients = [
            [
                'nom' => 'Rakoto',
                'contact' => '0341234567'
            ],
            [
                'nom' => 'Rabe',
                'contact' => '0339876543'
            ],
            [
                'nom' => 'Rasoa',
                'contact' => '0321112233'
            ],
            [
                'nom' => 'Andry',
                'contact' => '0385554444'
            ]
        ];

        $this->db->table('client')->insertBatch($clients);

        /*
        |--------------------------------------------------------------------------
        | PRODUITS
        |--------------------------------------------------------------------------
        */
        $produits = [
            [
                'designation' => 'Stylo',
                'prix_unitaire' => 1000
            ],
            [
                'designation' => 'Cahier',
                'prix_unitaire' => 2500
            ],
            [
                'designation' => 'Crayon',
                'prix_unitaire' => 500
            ],
            [
                'designation' => 'Gomme',
                'prix_unitaire' => 750
            ],
            [
                'designation' => 'Regle',
                'prix_unitaire' => 1500
            ]
        ];

        $this->db->table('produit')->insertBatch($produits);

        /*
        |--------------------------------------------------------------------------
        | CAISSES
        |--------------------------------------------------------------------------
        */
        $caisses = [
            [],
            [],
            []
        ];

        $this->db->table('caisse')->insertBatch($caisses);

        /*
        |--------------------------------------------------------------------------
        | ACHATS
        |--------------------------------------------------------------------------
        */
        $achats = [
            ['id_client' => 1],
            ['id_client' => 2],
            ['id_client' => 3],
            ['id_client' => 1]
        ];

        $this->db->table('achat')->insertBatch($achats);

        /*
        |--------------------------------------------------------------------------
        | ACHAT_PRODUIT
        |--------------------------------------------------------------------------
        */
        $achatProduits = [
            [
                'id_achat' => 1,
                'id_produit' => 1,
                'id_caisse' => 1,
                'quantite' => 3,
                'date_achat' => '2026-01-10'
            ],
            [
                'id_achat' => 1,
                'id_produit' => 2,
                'id_caisse' => 1,
                'quantite' => 2,
                'date_achat' => '2026-01-10'
            ],
            [
                'id_achat' => 2,
                'id_produit' => 3,
                'id_caisse' => 2,
                'quantite' => 10,
                'date_achat' => '2026-01-11'
            ],
            [
                'id_achat' => 3,
                'id_produit' => 4,
                'id_caisse' => 3,
                'quantite' => 5,
                'date_achat' => '2026-01-12'
            ],
            [
                'id_achat' => 4,
                'id_produit' => 5,
                'id_caisse' => 1,
                'quantite' => 1,
                'date_achat' => '2026-01-13'
            ]
        ];

        $this->db->table('achat_produit')->insertBatch($achatProduits);
    }
}