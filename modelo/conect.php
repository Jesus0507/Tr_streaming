<?php

class base_datos extends PDO {
	public $host="localhost";
	public $bd="tr_db";
	public $password="root";
	public $usuario="root";
	public $conexion;
	public $error;
	public $repconexion;

    public function __construct(){

    	try{
    		$this->conexion=parent::__construct("mysql:host=$this->host;dbname=$this->bd",$this->usuario,$this->password);
    		$this->repconexion=true;
    		$this->errorconexion="";
    	}
    	catch(PDOException $e){
    		$this->error="Ha ocurrido un error en la linea :".$e->getLine()." <br><br> Error: ".$e->getMessage();
    	}
    }




    public function getRepConexion(){
    	return $this->repconexion;
    }


    public function getErrorConexion(){
    	return $this->error;
    }
} 
?>