<?php

class Database
{
private $dbHost =DB_HOST;
private $dbName =DB_NAME;
private $dbPass =DB_PASS;
private $dbUser =DB_USER;


private $statement;
private $dbHandler;
private $error ;




public function __construct(){

$conn ='mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName; 
$options = array(
 PDO::ATTR_PERSISTENT =>true ,
 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
try{
    $this->dbHandler =new PDO($conn,$this->dbUser,$this->dbPass,$options);

}
catch(PDOException $e){

$this->error = $e-> getMessage();
echo $this->error;

}


}

//Write queries 
public function query($sql){

 $this->statement= $this->dbHandler->prepare($sql);

}

//Bind values 
public function bind($parameter , $value, $type=null){

    switch(is_null($type)){
        case is_int($value):
            $type = PDO::PARAM_INT;
            BREAK;
        case is_bool($value):
            $type = PDO::PARAM_BOOL;
            BREAK;
        case is_null($value):
            $type = PDO::PARAM_NULL;
        default:
             $type= PDO::PARAM_STR ; 

    }


        $this->statement->bindValue($parameter, $value ,$type);
}

//Execute the statement 
public function execute() 
{
 return $this->statement->execute();
}




//Return an array 
public function resultSet()
{
    $this->execute();
    return $this->statement->fetchAll(PDO::FETCH_OBJ);

}


//Return a specific row as an object 
public function single()
{

    $this->execute();
    return $this->statement->fetch(PDO::FETCH_OBJ);

}

//Get the row's count
public function rowCount()
{

    return $this->statement->rowCount();

} 

}












?>