<?php

class Pages extends Controller {

     public function __construct()
     {
       $this->userModel = $this->model('User');

     }

    public function index(){
     $users = $this->userModel->getUsers();
       
     $data =['user' => $users];
     $this->view('Pages/index',$data);

    }

    public function about(){

        $this->view('Pages/about');

    }
    
    
}






?> 
