<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AchatProduitController extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // Liste des détails achats
    public function index()
    {
        $data['details'] = $this->db->table('achat_produit')
            ->select('achat_produit.*, produit.designation, client.nom as client_nom')
            ->join('produit', 'produit.id = achat_produit.id_produit')
            ->join('achat', 'achat.id = achat_produit.id_achat')
            ->join('client', 'client.id = achat.id_client')
            ->get()
            ->getResult();

        return view('achat_produit/index', $data);
    }

    // Formulaire ajout détail achat
    public function create()
    {
        $data['achats'] = $this->db->table('achat')->get()->getResult();
        $data['produits'] = $this->db->table('produit')->get()->getResult();
        $data['caisses'] = $this->db->table('caisse')->get()->getResult();

        return view('achat_produit/create', $data);
    }

    // Enregistrer détail achat
    public function store()
    {
        $this->db->table('achat_produit')->insert([
            'id_achat' => $this->request->getPost('id_achat'),
            'id_produit' => $this->request->getPost('id_produit'),
            'id_caisse' => $this->request->getPost('id_caisse'),
            'quantite' => $this->request->getPost('quantite'),
            'date_achat' => date('Y-m-d')
        ]);

        return redirect()->to('/achat-produits');
    }
}