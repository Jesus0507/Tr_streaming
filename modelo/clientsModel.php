<?php

require_once "conect.php";
	
	class clients_model {

		private $cedula_cliente;
		private $nombre_cliente;
		private $apellido_cliente;
		private $telefono_cliente;
		private $correo_cliente;
		private $direccion_cliente;
		private $juridico;
        private $conexion;

		public function __construct(){
			$this->conexion=new base_datos();
		}

		public function set_cliente($cedula_cliente,$nombre_cliente,$apellido_cliente,$telefono_cliente,$correo_cliente,$direccion_cliente,$juridico){
		 $this->cedula_cliente      =    $cedula_cliente;
		 $this->nombre_cliente      =    $nombre_cliente;
		 $this->apellido_cliente    =    $apellido_cliente;
		 $this->telefono_cliente    =    $telefono_cliente;
		 $this->correo_cliente      =    $correo_cliente;
		 $this->direccion_cliente   =    $direccion_cliente;
		 $this->juridico            =    $juridico;
		}

		public function get_cedula_cliente(){
			return $this->cedula_cliente;
		}

		public function get_nombre_cliente(){
			return $this->nombre_cliente;
		}

		public function get_apellido_cliente(){
			return $this->apellido_cliente;
		}

		public function get_telefono_cliente(){
			return $this->telefono_cliente;
		}

		public function get_correo_cliente(){
			return $this->correo_cliente;
		}

		public function get_direccion_cliente(){
			return $this->direccion_cliente;
		}

		public function get_juridico(){
			return $this->juridico;
		}


		public function registrar(){
			$query = "INSERT INTO clientes (cedula_cliente,nombre_cliente,apellido_cliente, telefono_cliente,correo_cliente,direccion_cliente,juridico)
			VALUES ('$this->cedula_cliente','$this->nombre_cliente','$this->apellido_cliente','$this->telefono_cliente','$this->correo_cliente','$this->direccion_cliente','$this->juridico')";
			try {
				$resultado = $this->conexion->prepare($query);
				$resultado->execute();
				return true;
			} catch (PDOException $e) {
				return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
			}
		}


		public function get_clients(){
		 
			$query = "SELECT * FROM clientes ORDER BY cedula_cliente ASC";
			try {
				$clientes=[];
				$resultado = $this->conexion->prepare($query);
				$resultado->execute();
				$resultado->setFetchMode(PDO::FETCH_ASSOC);
				$respuesta_arreglo = $resultado->fetchAll(PDO::FETCH_ASSOC);
				foreach($respuesta_arreglo as $v){
				 $cliente=new clients_model();
                 $cliente->set_cliente($v['cedula_cliente'],$v['nombre_cliente'],$v['apellido_cliente'],$v['telefono_cliente'],$v['correo_cliente'],$v['direccion_cliente'],$v['juridico']);
				 $clientes[]=$cliente;
				}
				return $clientes;
			} catch (PDOException $e) {
				return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
			}
	
	}

	public function search_clients(){
		 
		$query = "SELECT * FROM clientes WHERE cedula_cliente='$this->cedula_cliente'";
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

     public function eliminar($cedula){
		$query = "DELETE FROM clientes WHERE cedula_cliente='$cedula'";
		try {
			$resultado = $this->conexion->prepare($query);
			$resultado->execute();
			return true;
		} catch (PDOException $e) {
			return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
		}

	 }


	 public function editar(){
		$query = "UPDATE clientes SET  nombre_cliente='$this->nombre_cliente'
		, apellido_cliente='$this->apellido_cliente', telefono_cliente='$this->telefono_cliente',correo_cliente='$this->correo_cliente',juridico='$this->juridico'
		WHERE cedula_cliente='$this->cedula_cliente'";
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