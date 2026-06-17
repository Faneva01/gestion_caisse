<?php

namespace App\Models;

use CodeIgniter\Model;

class AchatProduitModel extends Model
{
    protected $table         = 'achat_produit';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = ['id_achat', 'id_produit', 'id_caisse', 'quantite', 'date_achat'];
    protected $useTimestamps = false;

    /**
     * Récupère les lignes d'un achat avec la désignation et le prix
     * unitaire du produit (jointure avec la table produit).
     */
    public function getLignesAchat(int $idAchat): array
    {
        return $this->select('achat_produit.id, achat_produit.quantite, produit.designation, produit.prix_unitaire')
            ->join('produit', 'produit.id = achat_produit.id_produit')
            ->where('achat_produit.id_achat', $idAchat)
            ->orderBy('achat_produit.id', 'ASC')
            ->findAll();
    }

    /**
     * Ajoute un produit à l'achat en cours.
     */
    public function ajouterLigne(int $idAchat, int $idProduit, int $idCaisse, int $quantite): bool
    {
        return (bool) $this->insert([
            'id_achat'   => $idAchat,
            'id_produit' => $idProduit,
            'id_caisse'  => $idCaisse,
            'quantite'   => $quantite,
            'date_achat' => date('Y-m-d H:i:s'),
        ]);
    }
}
