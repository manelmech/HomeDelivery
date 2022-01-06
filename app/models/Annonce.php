<?php

class Annonce{

    private $db;

    public function __construct()
    {
      $this->db =new Database;

    }

    public function getAnnonces()
    {
        $this->db->query("SELECT * FROM annonces");
        $result= $this->db->resultSet();
        return $result;

    }


    public function setAnnonce($data)
    {
        $this->db->query('INSERT INTO annonces (pointdepart, pointarrive,transport,transporttype,fourchettepoid,fourchettevolume,userid,Etat,prix) VALUES (:pointdepart, :pointarrive, :transport, :transporttype, :fourchettepoid, :fourchettevolume, :userid, :Etat, :prix)');
        $this->db->bind('pointdepart',$data['pointdepart']);
        $this->db->bind(':pointarrive',$data['pointarrive']);
        $this->db->bind(':transport',$data['transport']);
        $this->db->bind(':transporttype',$data['transporttype']);
        $this->db->bind(':fourchettepoid',$data['fourchettepoid']);
        $this->db->bind(':fourchettevolume',$data['fourchettevolume']);
        $this->db->bind(':userid',$data['user_id']);
        $this->db->bind(':Etat',$data['Etat']);
        $this->db->bind(':prix',$data['prix']);

       

        if($this->db->execute()){
            return true ;
        }else{

            return false;
        }

    }



    public function findAnnonceById($id)
    {
        $this->db->query('SELECT * FROM annonces WHERE idannonce = :idannonce');
         
        $this->db->bind(':idannonce',$id);

        $row =$this->db->single();
          
       
            return $row;




    }

    public function updateEtatAnnonce($id,$etat){

        $this->db->query("UPDATE `annonces` SET `Etat` = :etat WHERE `idannonce` = :idannonce ");
         
        $this->db->bind(':etat',$etat);
        $this->db->bind(':idannonce',$id);
        

        $this->db->execute();


    }
  
    public function updateAnnonce($data){

         

        $this->db->query(" UPDATE annonces

        SET pointdepart= :pointdepart, pointarrive= :pointarrive, transport = :transport, transporttype= :transporttype, fourchettepoid= :fourchettepoid, fourchettevolume= :fourchettevolume 
       
        WHERE idannonce= :idannonce ");
        
        $this->db->bind(':pointdepart',$data['pointdepart']); 
        $this->db->bind(':pointarrive',$data['pointarrive']); 
        $this->db->bind(':transport', $data['transport']);
        $this->db->bind(':transporttype',$data['transporttype']);
        $this->db->bind(':fourchettepoid',$data['fourchettepoid']);
        $this->db->bind(':fourchettevolume',$data['fourchettevolume']);
        $this->db->bind(':idannonce',$data['idannonce']);
        
       if( $this->db->execute()){

            return true;

       }else{return false ; };
        




    }
    

    


}


?>