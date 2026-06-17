<?php

namespace App\Controllers;

use App\Models\ProduitModel;
use App\Models\AchatModel;
use App\Models\AchatProduitModel;

class Achat extends BaseController
{
    protected ProduitModel $produitModel;
    protected AchatModel $achatModel;
    protected AchatProduitModel $achatProduitModel;

    public function __construct()
    {
        $this->produitModel      = new ProduitModel();
        $this->achatModel        = new AchatModel();
        $this->achatProduitModel = new AchatProduitModel();
    }

    /**
     * Affiche la page de saisie des achats pour la caisse en cours.
     * La session contient 'caisse_id', défini par CaisseController::choisir()
     * de ton coéquipier.
     */
    public function index()
    {
        if (! session('user')) {
            return redirect()->to('/');
        }

        $idCaisse = session('caisse_id');

        if (! $idCaisse) {
            return redirect()->to('/choix_caisse')->with('erreur', 'Veuillez choisir une caisse.');
        }

        // Si aucun achat n'est en cours, on en démarre un nouveau
        if (! session('id_achat')) {
            $idAchat = $this->achatModel->creerNouvelAchat();
            session()->set('id_achat', $idAchat);
        }

        $lignes = $this->achatProduitModel->getLignesAchat(session('id_achat'));

        $total = array_reduce($lignes, function ($somme, $ligne) {
            return $somme + ($ligne['prix_unitaire'] * $ligne['quantite']);
        }, 0);

        return view('achat', [
            'idCaisse' => $idCaisse,
            'produits' => $this->produitModel->findAll(),
            'lignes'   => $lignes,
            'total'    => $total,
        ]);
    }

    /**
     * Ajoute un produit à l'achat en cours (appelé par le formulaire du haut).
     */
    public function ajouter()
    {
        if (! session('user')) {
            return redirect()->to('/');
        }

        $idCaisse = session('caisse_id');
        $idAchat  = session('id_achat');

        if (! $idCaisse || ! $idAchat) {
            return redirect()->to('/choix_caisse')->with('erreur', 'Session expirée, veuillez recommencer.');
        }

        $idProduit = (int) $this->request->getPost('id_produit');
        $quantite  = (int) $this->request->getPost('quantite');

        if ($idProduit <= 0 || $quantite <= 0) {
            return redirect()->to('/achat')->with('erreur', 'Produit ou quantité invalide.');
        }

        $this->achatProduitModel->ajouterLigne($idAchat, $idProduit, $idCaisse, $quantite);

        return redirect()->to('/achat');
    }

    /**
     * Clôture l'achat en cours : l'achat reste enregistré tel quel en base,
     * et on retire simplement 'id_achat' de la session pour qu'un nouvel
     * achat (liste vide) soit créé au prochain client.
     */
    public function cloturer()
    {
        session()->remove('id_achat');

        return redirect()->to('/achat');
    }
}
