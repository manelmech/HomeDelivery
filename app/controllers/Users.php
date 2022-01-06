<?php

class Users extends Controller{


    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->annonceModel = $this->model('Annonce');
        $this->transactionModel=$this->model('Transaction');
    }



    public function login() {
        
        $data = [
            'title' => 'Login page',
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        //Check for post
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => 'Login page',
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => '',
            ];


         
            //Validate username
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter a username.';
            }

            //Validate password
            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter a password.';
            }

            //Check if all errors are empty
            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Password or username is incorrect. Please try again.';

                    $this->view('users/login', $data);
                }
            }

        } else {
            $data = [
                'title' => 'Login page',
                'username' => '',
                'password' => '',
                'usernameError' => '',
                'passwordError' => ''
            ];
        }
        $this->view('users/login', $data);
    }



    public function register() {
        $data = [
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'wilaya' => '',
            'transporteur'=>'',
            'transporteurcertifie'=>'',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => '',
            'wilayaError' => '',
            'numtel' => '',



        ];

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

              $data = [
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'wilaya' =>trim($_POST['wilaya']),
                'transporteur'=>trim($_POST['yesnotran']),
                'transporteurcertifie'=>trim($_POST['yesnocert']),
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
                'wilayaError' => '' ,
                'numtel' => trim($_POST['numtel']),
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";
            $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";

            //Validate username on letters/numbers
            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter username.';
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = 'Name can only contain letters and numbers.';
            }

            if (empty($data['numtel'])) {
                $data['numtel'] = 'Please enter the number phone.';
            }

            //Validate email
            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter email address.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            } else {
                //Check if email exists.
                if ($this->userModel->findUserByEmail($data['email'])) {
                $data['emailError'] = 'Email is already taken.';
                }
            }

           // Validate password on length, numeric values,
            if(empty($data['password'])){
              $data['passwordError'] = 'Please enter password.';
            } elseif(strlen($data['password']) < 6){
              $data['passwordError'] = 'Password must be at least 8 characters';
            } elseif (preg_match($passwordValidation, $data['password'])) {
              $data['passwordError'] = 'Password must be have at least one numeric value.';
            }

            if (empty($data['wilaya']) &&  ($data['transporteur']=='yes')) {
                $data['wilayaError'] = 'Please enter at least one wilaya.';
            } 

            //Validate confirm password
             if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please enter password.';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                }
            }

            // Make sure that errors are empty
            if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError']) && empty($data['wilayaError'])) {

                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user from model function
                if ($this->userModel->register($data)) {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/users/login');
                } else {
                    die('Something went wrong.');
                }
            }

            

            
        }
        $this->view('users/register', $data);
    }
      


    public function createUserSession($user) {
    
        $_SESSION['user_id'] = $user->iduser;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;
        $_SESSION['numtelephone'] = $user->numtelephone;
        $_SESSION['transporteur'] = $user->transporteur;
        $_SESSION['transporteurcertifie'] = $user->transporteurcertifie;
        

        header('location:' . URLROOT . '/users/indexuser');
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['numtelephone']);
        unset($_SESSION['transporteur'] );
        unset($_SESSION['transporteurcertifie']);
        

        header('location:' . URLROOT . '/users/login');
    }



    public function indexuser(){
         

        $annonces = $this->annonceModel->getAnnonces(); 
        $data = [
            'pointdepart' => '',
            'pointarrive' => '',
            'transporttype' => '',
            'transport' => '',
            'fourchettepoid' => '',
            'fourchettevolume' => '',
            'user_id' =>'',
            'prix' =>'',
            'Etat' =>'',
            'annonces'=>$annonces];
        


        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
          'pointdepart' => trim($_POST['pointdepart']),
          'pointarrive' => trim($_POST['pointarrive']),
          'transporttype' => trim($_POST['transporttype']),
          'transport' => trim($_POST['transport']),
          'fourchettepoid' => trim($_POST['forchettepoid']),
          'fourchettevolume' => trim($_POST['forchettevolume']),
          'user_id' => trim($_POST['iduser'])
      ];  

          if(($data['transporttype']=='Lettre')|| ($data['transporttype']=='Petit colis')){
               
            $data = [ 'prix' => 'negociable'];
          }

      if ($this->annonceModel->setAnnonce($data))
       {
        //Redirect to the login page
        header('location: ' . URLROOT . 'Users/indexuser');
    } else {
        die('Something went wrong.');
    }
         
    }
         



        $this->view('Users/indexuser', $data);
    }



    public function detailAnnonce(){


        if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $detannonce = $this->annonceModel->findAnnonceById($_GET['id']); 
        $data = ['detannonce'=>$detannonce];
        }
    

        $this->view('Users/detailAnnonce', $data);



    }
     

    public function postulerAnnonce(){
        $data = ['annonces'=>'',
        'transactionsclient'=>'',
        'transactionstransporteur'=>'',
        'Avisclient'=>'',
        'id_annonce'=>'',
        'id_transporteur'=> '',
        'Avistrans'=>'' ];

        if($_SERVER['REQUEST_METHOD'] == 'GET'){
             
            $data = ['Avisclient'=>'En Attente',
          'id_annonce'=>$_GET['id'],
          'id_transporteur'=>  $_SESSION['user_id'],
          'Avistrans'=>'En Attente'
        ];

        $this->transactionModel->setTransactions($data); 
    }

    header('location:' . URLROOT . '/users/userProfile');
}

  public function confirmerClient()
  {
   
    $this->transactionModel->updateAvisClient( 'Confirme', $_GET['idtrans']);

    header('location:' . URLROOT . '/users/userProfile');
    
  }

  public function  refuserClient()
  {
   
    $this->transactionModel->updateAvisClient( 'Refuse', $_GET['idtrans']);

    header('location:' . URLROOT . '/users/userProfile');
    
  }




  public function confirmerTransporteur()
  {
    $this->transactionModel->updateAvisTransporteur( 'Confirme', $_GET['idtrans']);

    $this->annonceModel->updateEtatAnnonce($_GET['idannonce'],'Termine');

    header('location:' . URLROOT . '/users/userProfile');
    
  }
    

  public function  modifierAnnonce()
  {
    
    $data = [
        'pointdepart' => '',
        'pointarrive' => '',
        'transporttype' => '',
        'transport' => '',
        'fourchettepoid' => '',
        'fourchettevolume' => '',
        'user_id' =>'',
        'prix' =>'',
        'Etat' =>'',
        'annonces'=>''];

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        $detannonce = $this->annonceModel->findAnnonceById($_GET['idannonce']); 
        $data = ['detannonce'=>$detannonce];}
        
    

       if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $data = [
            'pointdepart' => '',
            'pointarrive' => '',
            'transporttype' => '',
            'transport' => '',
            'fourchettepoid' => '',
            'fourchettevolume' => '',
            'user_id' =>'',
            'prix' =>'',
            'Etat' =>'',
            'annonces'=>''];
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'pointdepart' => trim($_POST['pointdepart']),
            'pointarrive' => trim($_POST['pointarrive']),
            'transporttype' => trim($_POST['transporttype']),
            'transport' => trim($_POST['transport']),
            'fourchettepoid' => trim($_POST['forchettepoid']),
            'fourchettevolume' => trim($_POST['forchettevolume']),
            'idannonce' => trim($_POST['idannonce'])
           ];  

     

                if ($this->annonceModel->updateAnnonce($data))
                {
                    //Redirect to the login page
                    header('location: ' . URLROOT . '/users/userProfile');
                } else {
                    die('Something went wrong.');
                }
                        
}
     
$this->view('Users/modifierAnnonce', $data);

  }

  
  public function refuserTransporteur()
  {
    $this->transactionModel->updateAvisTransporteur( 'Refuse', $_GET['idtrans']);

  

    header('location:' . URLROOT . '/users/userProfile');
    
  }
    

    
    public function userProfile(){
        $data = ['annonces'=>'',
              'transactionsclient'=>'',
              'transactionstransporteur'=>'' ];

        
       
        $annonces = $this->annonceModel->getAnnonces(); 

        $transaction = $this->transactionModel->getTransactionsClient(); 
        $transactionstransporteur = $this->transactionModel->getTransactionsTransporteur();


        $data = ['annonces'=> $annonces,
              'transactionsclient'=> $transaction,
              'transactionstransporteur'=> $transactionstransporteur ];

 
        $this->view('Users/userProfile', $data);


    }


}


    




?>