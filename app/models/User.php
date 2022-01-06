<?php

class User{

    private $db;

    public function __construct()
    {
      $this->db =new Database;


    }


    public function getUsers()
    {
        $this->db->query("SELECT * FROM users");
        $result= $this->db->resultSet();
        return $result;

    }

    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email= :email');
         
        $this->db->bind(':email',$email);

        if($this->db->rowCount()>0){
            return true ;


        }else 
        {
          return false ;

        }


    }

    public function register($data)
    {
        $this->db->query('INSERT INTO users  (username,email,password,transporteur,transporteurcertifie,wilayas,numtelephone) VALUES (:username, :email, :password,:transporteur,:transporteurcertifie,:wilayas,:numtelephone)');
        $this->db->bind('username',$data['username']);
        $this->db->bind(':email',$data['email']);
        $this->db->bind(':password',$data['password']);
        $this->db->bind(':transporteur',$data['transporteur']);
        $this->db->bind(':transporteurcertifie',$data['transporteurcertifie']);
        $this->db->bind(':wilayas',$data['wilaya']);
        $this->db->bind(':numtelephone',$data['numtel']);

        if($this->db->execute()){
            return true ;
        }else{

            return false;
        }

    }



    public function login($username , $password)
    {

        $this->db->query('SELECT * FROM users WHERE username= :username');
        $this->db->bind(':username',$username);

        $row =$this->db->single();
          
        $hashedPassword= $row->password;

        if(password_verify($password, $hashedPassword))
        {
            return $row;


        }else{


            return false;
        }

    }



}


?>