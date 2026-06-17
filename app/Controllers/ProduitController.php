<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ProduitController extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // Liste des produits
    public function index()
    {
        $data['produits'] = $this->db->table('produit')->get()->getResult();
        return view('produit/index', $data);
    }

    // Ajouter un produit
    public function create()
    {
        return view('produit/create');
    }

    public function store()
    {
        $this->db->table('produit')->insert([
            'designation' => $this->request->getPost('designation'),
            'prix_unitaire' => $this->request->getPost('prix_unitaire')
        ]);

        return redirect()->to('/produits');
    }
}