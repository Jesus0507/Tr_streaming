<?php

   require_once "conect.php";
	
	class productsType_model {

		private $nombre;
		private $conexion;

		public function __construct(){
           $this->conexion=new base_datos();
		}
		public function set_producto($nombre){
			$this->nombre=$nombre;
		}


		public function get_nombre(){
			return $this->nombre;
		}

		public function registrar(){
			$query="INSERT INTO tipo_producto (nombre_tipo_producto) VALUES ('$this->nombre')";
			try {
				$resultado = $this->conexion->prepare($query);
				$resultado->execute();
				return true;
			} catch (PDOException $e) {
				return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
			}
		}

		public function get_products(){
			$query="SELECT * FROM tipo_producto ORDER BY nombre_tipo_producto ASC";
			try {
				$productos=[];
				$resultado = $this->conexion->prepare($query);
				$resultado->execute();
				$resultado->setFetchMode(PDO::FETCH_ASSOC);
				foreach($resultado->fetchAll(PDO::FETCH_ASSOC) as $v){
				 $producto=new productsType_model();
				 $producto->set_producto($v['nombre_tipo_producto']);
				 $productos[]=$producto;
				}
				return $productos;
			} catch (PDOException $e) {
				return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
			}
		}


		public function editar($nombre){
			$query="UPDATE tipo_producto SET nombre_tipo_producto='$this->nombre' WHERE nombre_tipo_producto='$nombre'";
			try {
				$resultado = $this->conexion->prepare($query);
				$resultado->execute();
				return $query;
			} catch (PDOException $e) {
				return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
			}
		}

		public function eliminar($producto){
			$query="DELETE FROM tipo_producto WHERE nombre_tipo_producto='$producto'";
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