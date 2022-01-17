
<?php

class Signalement{

    private $db;

    public function __construct()
    {
      $this->db =new Database;

    }

    public function getSignalements()
    {
        $this->db->query("SELECT * FROM signalements");
        $result= $this->db->resultSet();
        return $result;

    }


    public function setSignalement($data)
    {
        $this->db->query('INSERT INTO signalements(idsignaleur, idsignale,idannonce) VALUES (:idsignaleur, :idsignale, :idannonce)');
        $this->db->bind('idsignaleur',$data['idsignaleur']);
        $this->db->bind(':idsignale',$data['idsignale']);
        $this->db->bind(':idannonce',$data['idannonce']);
       

        if($this->db->execute()){
            return true ;
        }else{

            return false;
        }

    }



   


}


?>