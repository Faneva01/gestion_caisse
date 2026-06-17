<?php
    namespace App\Controllers;
    use CodeIgniter\Controller;
    use App\Models\CaisseModel;

    class CaisseController extends BaseController {

        public function index() {
            $caisseModel = new CaisseModel();
            $data['caisses'] = $caisseModel->getAllCaisses();
            return view('choix_caisse', $data);
        }

        public function choisir() {
            $caisseId = $this->request->getPost('caisse_id');
            session()->set('caisse_id', $caisseId);
            return redirect()->to('achat');
        }
    }