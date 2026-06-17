<?php
namespace App\Models;

use CodeIgniter\Model;

class AchatProduitModel extends Model
{
    protected $table = 'achat_produit';
    protected $allowedFields = ['id', 'id_achat', 'id_produit' , 'id_caisse' , 'quantite', 'date_achat'];
}