<?php

   require_once "conect.php";
	
	class bitacora_model {

		private $codigo;
		private $fecha;
		private $cedula_usuario;
		private $inicio_sesion;
		private $acciones;
		private $final_sesion;
		private $conexion;

		public function __construct(){
			$this->conexion= new base_datos();
		}

		public function set_inicio($cedula_usuario,$inicio_sesion){
			$this->cedula_usuario=$cedula_usuario;
			$this->inicio_sesion=$inicio_sesion;
		}
		public function set_bitacora($codigo,$fecha,$cedula_usuario,$inicio_sesion,$acciones,$final_sesion){
			$this->codigo=$codigo;
			$this->fecha=$fecha;
			$this->cedula_usuario=$cedula_usuario;
			$this->inicio_sesion=$inicio_sesion;
			$this->acciones=$acciones;
			$this->final_sesion=$final_sesion;
		}



		public function get_bitacora(){
			$bitacora_result=[
				'codigo'=>$this->codigo,
				'fecha'=>$this->fecha,
				'cedula_usuario'=>$this->cedula_usuario,
				'inicio_sesion'=>$this->inicio_sesion,
				'acciones'=>$this->acciones,
				'final_sesion'=>$this->final_sesion

			];
			return $bitacora_result;
		}

		public function registrar(){
			$query="INSERT INTO bitacora (cedula_usuario,inicio_sesion) VALUES ('$this->cedula_usuario','$this->inicio_sesion')";
			try {
				$resultado = $this->conexion->prepare($query);
				$resultado->execute();
				return true;
			} catch (PDOException $e) {
				return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
			}
		}

		public function get_bitacora_bd(){
			$query="SELECT * FROM bitacora";
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


		public function editar($acciones,$codigo){
			$query="UPDATE bitacora SET acciones='$this->acciones' WHERE codigo='$codigo'";
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