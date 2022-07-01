<?php
	require_once "conect.php";
	class users_model {
          private $cedula_usuario;
		  private $nombre;
		  private $apellido;
		  private $telefono;
		  private $correo;
		  private $contrasenia;
		  private $cargo;
		  private $nombre_usuario;
		  private $tipo_usuario;
		  private $conexion;

		  public function __construct(){
             $this->conexion=new base_datos();
		  }

		  public function set_usuario($cedula_usuario,$nombre,$apellido,$telefono,$correo,$contrasenia,$cargo,$nombre_usuario,$tipo_usuario){
			$this->cedula_usuario     =   $cedula_usuario;
			$this->nombre             =   $nombre;
			$this->apellido           =   $apellido;   
			$this->telefono           =   $telefono;
			$this->correo             =   $correo;
			$this->contrasenia        =   $contrasenia;
			$this->cargo              =   $cargo;
			$this->nombre_usuario     =   $nombre_usuario;
			$this->tipo_usuario       =   $tipo_usuario;
		  }

		  public function get_cedula_usuario(){
			  return $this->cedula_usuario;
		  }

		  public function get_nombre(){
			  return $this->nombre;
		  }

		  public function get_apellido(){
			  return $this->apellido;
		  }

		  public function get_telefono(){
			return $this->telefono;
		}

		public function get_correo(){
			return $this->correo;
		}

		public function get_contrasenia(){
			return $this->contrasenia;
		}

		public function get_cargo(){
			return $this->cargo;
		}

		public function get_nombre_usuario(){
			return $this->nombre_usuario;
		}

		public function get_tipo_usuario(){
			return $this->tipo_usuario;
		}

		public function registrar(){
			$query = "INSERT INTO usuarios (cedula_usuario,nombre,apellido, telefono,correo,contrasenia,cargo,nombre_usuario,tipo_usuario)
			VALUES ('$this->cedula_usuario','$this->nombre','$this->apellido','$this->telefono','$this->correo','$this->contrasenia','$this->cargo','$this->nombre_usuario','$this->tipo_usuario')";
			try {
				$resultado = $this->conexion->prepare($query);
				$resultado->execute();
				return true;
			} catch (PDOException $e) {
				return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
			}
		}

		public function eliminar($cedula){
			$query = "DELETE FROM usuarios WHERE cedula_usuario='$cedula'";
			try {
				$resultado = $this->conexion->prepare($query);
				$resultado->execute();
				return true;
			} catch (PDOException $e) {
				return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
			}
		}


		public function get_users(){
			$query = "SELECT * FROM usuarios ORDER BY cedula_usuario ASC";
			try {
				$usuarios=[];
				$resultado = $this->conexion->prepare($query);
				$resultado->execute();
				$resultado->setFetchMode(PDO::FETCH_ASSOC);
				$respuesta_arreglo = $resultado->fetchAll(PDO::FETCH_ASSOC);
				foreach($respuesta_arreglo as $v){
				 $usuario=new users_model();
                 $usuario->set_usuario($v['cedula_usuario'],$v['nombre'],$v['apellido'],$v['telefono'],$v['correo'],$v['contrasenia'],$v['cargo'],$v['nombre_usuario'],$v['tipo_usuario']);
				 $usuarios[]=$usuario;
				}
				return $usuarios;
			} catch (PDOException $e) {
				return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
			}
	
	}

	public function search_users(){
		 
		$query = "SELECT * FROM usuarios WHERE cedula_usuario='$this->cedula_usuario'";
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

public function editar(){
	$query = "UPDATE usuarios SET nombre='$this->nombre',apellido='$this->apellido', telefono='$this->telefono',correo='$this->correo',contrasenia='$this->contrasenia',cargo='$this->cargo',nombre_usuario='$this->nombre_usuario',tipo_usuario='$this->tipo_usuario'
    WHERE cedula_usuario='$this->cedula_usuario'";
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