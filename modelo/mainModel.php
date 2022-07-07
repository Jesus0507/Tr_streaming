<?php

require_once "conect.php";
	
	class main_model {

		private $usuario;
        private $clave;
		private $conexion;

		public function __construct(){
			$this->conexion=new base_datos();
		}

		public function set_user($usuario,$clave){
			$this->usuario=$usuario;
			$this->clave=$clave;
		}

		public function get_inicio(){
		 
				$query = "SELECT * FROM usuarios WHERE cedula='$this->usuario' AND pw='$this->clave'";
				try {
					$resultado = $this->conexion->prepare($query);
					$resultado->execute();
					$resultado->setFetchMode(PDO::FETCH_ASSOC);
					$respuesta_arreglo = $resultado->fetchAll(PDO::FETCH_ASSOC);
					return $respuesta_arreglo;
				} catch (PDOException $e) {
					return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
				}
		
                
		}

        
        
	public function get_tasa(){
		$query="SELECT * FROM tasa_dolar ";
		try {
			$resultado = $this->conexion->prepare($query);
			$resultado->execute();
			$resultado->setFetchMode(PDO::FETCH_ASSOC);
			$tasa=$resultado->fetchAll(PDO::FETCH_ASSOC);
		
			return $tasa[0]['valor'];
		} catch (PDOException $e) {
			return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
		}
	}

	public function changeTasa($newTasa){
		$query="UPDATE tasa_dolar SET valor='$newTasa' WHERE id_tasa_dolar='3'";
		try {
			$resultado = $this->conexion->prepare($query);
			$resultado->execute();
			return true;
		} catch (PDOException $e) {
			return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
		}
	}


	} 
?>