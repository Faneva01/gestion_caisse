<?php
    namespace App\Controllers;
    use CodeIgniter\Controllers;
    use App\Models\UserModel;

    class UserController extends BaseController{
        public function index(){
            return view('login');
        }

        public function login(){
            $nom = $this->resquest->getPost('nom');
            $mdp = $this->request->getPost('mdp');

            $userModel = new UserModel();
            $user = $userModel->findByNom($nom);


            if($user && password_verify($mdp, $user['mdp'])){
                session()->set('user',$user);
                return redirect()->to('choix_caisse');
            }

            return redirect()->back()->with('error', 'Identifiant ou mot de passe incorrect');
        }
    }
?>