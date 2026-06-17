<?php

namespace App\Models;

use CodeIgniter\Model;

class AchatModel extends Model
{
    protected $table         = 'achat';
    protected $primaryKey    = 'id';
    protected $returnType    = 'array';
    protected $allowedFields = ['id_client'];
    protected $useTimestamps = false;

    /**
     * Crée un nouvel achat = un nouveau passage en caisse.
     * id_client n'est pas géré par cet écran (pas d'écran de sélection
     * de client dans le sujet), donc on le laisse à null pour l'instant.
     * A adapter facilement si vous ajoutez un écran "choix client".
     */
    public function creerNouvelAchat(?int $idClient = null): int
    {
        $this->insert(['id_client' => $idClient]);

        return (int) $this->getInsertID();
    }
}
