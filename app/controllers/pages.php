<?php

class Pages extends Controller {

     public function __construct()
     {
       $this->userModel = $this->model('User');
       $this->userModel = $this->model('User');
        $this->annonceModel = $this->model('Annonce');
        $this->transactionModel=$this->model('Transaction');
        $this->signalementModel=$this->model('Signalement');
        $this->documentModel=$this->model('Document');
        $this->wilayaModel=$this->model('Wilaya');
        $this->poidModel=$this->model('Poid');
        $this->volumeModel=$this->model('Volume');
        $this->transporttypeModel=$this->model('Transporttype');
        $this->WilayatransporteurModel=$this->model('Wilayatransporteur');

     }

    public function index(){
     $users = $this->userModel->getUsers();
     $annonces = $this->annonceModel->getAnnonces(); 
    
     $data = [
         'pointdepart' => '',
         'pointarrive' => '',
         'transport' => '',
         'fourchettepoid' => '',
         'fourchettevolume' => '',
         'user_id' =>'',
         'annonces'=>$annonces,
         'wilayas' => $this->wilayaModel->getWilayas(),
         'volumes' => $this->volumeModel->getVolume(),
         'poids' => $this->poidModel->getPoids(),
         'transporttype' =>$this->transporttypeModel->getTransporttype(),
         'user' => $users


         ];    


     $this->view('Pages/index',$data);

    }

    public function about(){

        $this->view('Pages/about');

    }

    public function contact(){

        $this->view('Pages/contact');

    }

    public function statistics(){

        $this->view('Pages/statistics');

    }
    
    
}






?> 
