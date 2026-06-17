<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AchatController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $data['produits'] = $db->table('produit')->get()->getResult();

        $data['panier'] = session()->get('panier') ?? [];

        $data['total'] = array_sum(array_column($data['panier'], 'montant'));

        return view('achat/index', $data);
    }

    public function ajouterProduit()
    {
        $db = \Config\Database::connect();

        $id = $this->request->getPost('id_produit');
        $qte = $this->request->getPost('quantite');

        $produit = $db->table('produit')->where('id', $id)->get()->getRow();

        if (!$produit) {
            return redirect()->back();
        }

        $panier = session()->get('panier') ?? [];

        $panier[] = [
            'id' => $produit->id,
            'designation' => $produit->designation,
            'prix' => $produit->prix_unitaire,
            'quantite' => $qte,
            'montant' => $produit->prix_unitaire * $qte
        ];

        session()->set('panier', $panier);

        return redirect()->to('/achat');
    }

    public function supprimerProduit($id)
    {
        $panier = session()->get('panier') ?? [];

        unset($panier[$id]);

        session()->set('panier', array_values($panier));

        return redirect()->to('/achat');
    }

    public function cloturer()
    {
        $db = \Config\Database::connect();

        $panier = session()->get('panier') ?? [];

        if (empty($panier)) {
            return redirect()->to('/achat');
        }

        // 1. créer achat
        $db->table('achat')->insert([
            'id_client' => 1
        ]);

        $id_achat = $db->insertID();

        // 2. stocker détails
        foreach ($panier as $item) {
            $db->table('achat_produit')->insert([
                'id_achat' => $id_achat,
                'id_produit' => $item['id'],
                'id_caisse' => 1,
                'quantite' => $item['quantite'],
                'date_achat' => date('Y-m-d')
            ]);
        }

        // 3. vider panier
        session()->remove('panier');

        return redirect()->to('/achat');
    }
}