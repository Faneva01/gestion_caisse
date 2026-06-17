<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class UserModel extends Model{
        protected $table = "user";
        protected $allowedFields = ['nom', 'mdp'];

        public function findByNom(string $nom){
            return $this->where('nom', $nom)->first();
        }
    }
?>