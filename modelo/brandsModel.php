<?php

   require_once "conect.php";
	
	class brands_model {

		private $nombre;
		private $conexion;

		public function __construct(){
			$this->conexion= new base_datos();
		}

		public function set_marca($nombre){
			$this->nombre=$nombre;
		}


		public function get_nombre(){
			return $this->nombre;
		}

		public function registrar(){
			$query="INSERT INTO marca_producto (nombre_marca_producto) VALUES ('$this->nombre')";
			try {
				$resultado = $this->conexion->prepare($query);
				$resultado->execute();
				return true;
			} catch (PDOException $e) {
				return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
			}
		}

		public function get_brands(){
			$query="SELECT * FROM marca_producto ORDER BY nombre_marca_producto ASC";
			try {
				$marcas=[];
				$resultado = $this->conexion->prepare($query);
				$resultado->execute();
				$resultado->setFetchMode(PDO::FETCH_ASSOC);
				foreach($resultado->fetchAll(PDO::FETCH_ASSOC) as $v){
				 $marca=new brands_model();
				 $marca->set_marca($v['nombre_marca_producto']);
				 $marcas[]=$marca;
				}
				return $marcas;
			} catch (PDOException $e) {
				return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
			}
		}


		public function editar($nombre){
			$query="UPDATE marca_producto SET nombre_marca_producto='$this->nombre' WHERE nombre_marca_producto='$nombre'";
			try {
				$resultado = $this->conexion->prepare($query);
				$resultado->execute();
				return true;
			} catch (PDOException $e) {
				return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
			}
		}

		public function eliminar($marca){
			$query="DELETE FROM marca_producto WHERE nombre_marca_producto='$marca'";
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