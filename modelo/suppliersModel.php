<?php

require_once "conect.php";
	
	class suppliers_model {
		private $dni;
		private $nombre;
		private $telefono;
		private $correo;
		private $contacto;
		private $direccion;
		private $conexion;

		public function __construct(){
			$this->conexion=new base_datos();
		}

		public function set_proveedor($dni,$nombre,$telefono,$correo,$contacto,$direccion){
        $this->dni          =  $dni;
		$this->nombre       =  $nombre;
		$this->telefono     =  $telefono;
		$this->correo       =  $correo;
		$this->contacto     =  $contacto;
		$this->direccion    =  $direccion;

		}

		public function get_dni(){
			return $this->dni;
		}

		public function get_nombre(){
			return $this->nombre;
		}

		public function get_telefono(){
			return $this->telefono;
		}

		public function get_correo(){
			return $this->correo;
		}

		public function get_contacto(){
			return $this->contacto;
		}

		public function get_direccion(){
			return $this->direccion;
		}
		public function registrar(){
			$query = "INSERT INTO proveedores (dni_proveedor,nombre_proveedor,telefono_proveedor,correo_proveedor,contacto_proveedor,direccion_proveedor)
			VALUES ('$this->dni','$this->nombre','$this->telefono','$this->correo','$this->contacto','$this->direccion')";
			try {
				$resultado = $this->conexion->prepare($query);
				$resultado->execute();
				return true;
			} catch (PDOException $e) {
				return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
			}
		}

		public function search_supplier(){
		 
			$query = "SELECT * FROM proveedores WHERE dni_proveedor='$this->dni'";
			try {
				$resultado = $this->conexion->prepare($query);
				$resultado->execute();
				$resultado->setFetchMode(PDO::FETCH_ASSOC);
				return $resultado->fetchAll(PDO::FETCH_ASSOC);
	
			} catch (PDOException $e) {
				return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
			}
	
	}


	public function get_proveedores(){
		 
		$query = "SELECT * FROM proveedores ORDER BY nombre_proveedor ASC";
		try {
			$proveedores=[];
			$resultado = $this->conexion->prepare($query);
			$resultado->execute();
			$resultado->setFetchMode(PDO::FETCH_ASSOC);
			foreach($resultado->fetchAll(PDO::FETCH_ASSOC) as $v){
			 $proveedor=new suppliers_model();
			 $proveedor->set_proveedor($v['dni_proveedor'],$v['nombre_proveedor'],$v['telefono_proveedor'],$v['correo_proveedor'],$v['contacto_proveedor'],$v['direccion_proveedor']);
			 $proveedores[]=$proveedor;
			}
			return $proveedores;
		} catch (PDOException $e) {
			return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
		}

}

public function eliminar($dni){
	$query = "DELETE FROM proveedores WHERE dni_proveedor='$dni'";
	try {
		$resultado = $this->conexion->prepare($query);
		$resultado->execute();
		return true;
	} catch (PDOException $e) {
		return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
	}
}

public function editar(){
	$query = "UPDATE proveedores SET nombre_proveedor='$this->nombre',telefono_proveedor='$this->telefono',correo_proveedor='$this->correo',
	contacto_proveedor='$this->contacto',direccion_proveedor='$this->direccion' WHERE dni_proveedor ='$this->dni'";
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