<?php
	
	class usersController {
		
		public function __construct(){
			require_once "modelo/usersModel.php";
		}
		
		public function index(){
			$modelo=new users_model();
			$usuarios=$modelo->get_users();
			
			require_once "vista/users.php";	
		}

		public function addUsers(){
               require_once "vista/addUsers.php";
		}

		public function editUsers(){
			$modelo=new users_model();
			$usuarios=$modelo->get_users();
			$usuario="";
			foreach($usuarios as $u){
				if($u->get_cedula_usuario()==$_GET['id']){
					$usuario=$u;
				}
			}
			
               require_once "vista/editUsers.php";
		}

		public function new_user(){
			$modelo=new users_model();
			$modelo->set_usuario($_POST['cedula'],$_POST['nombre'],$_POST['apellido'],$_POST['telefono'],$_POST['correo'],$_POST['clave'],$_POST['cargo'],$_POST['userName'],$_POST['tipoUsuario']);
		    $registros=$modelo->search_users();
            
			if(count($registros)>0){
				echo "<script>alert('Este usuario ya se encuentra registrado');setTimeout(function(){location.href='index.php?c=users&a=addUsers'},100);</script>";
			}
			else{
			
			$resultado=$modelo->registrar();
			if($resultado){
				echo "<script>alert('Registrado con éxito');setTimeout(function(){location.href='index.php?c=users&a=index'},100);</script>";
			}
			else{
				echo $resultado;
			}
		}
		}

		public function delete(){
			$modelo=new users_model();
			if($modelo->eliminar($_GET['id'])){
				echo "<script>alert('Se ha eliminado al usuario');setTimeout(function(){location.href='index.php?c=users&a=index'},100);</script>";
			}
			else{
				echo $modelo->eliminar($_GET['id']);
			}
		}

		public function update_user(){
			$modelo=new users_model();
			$modelo->set_usuario($_POST['cedula'],$_POST['nombre'],$_POST['apellido'],$_POST['telefono'],$_POST['correo'],$_POST['contrasenia'],$_POST['cargo'],$_POST['userName'],$_POST['tipoUsuario']);
		    $resultado=$modelo->editar();
			if($resultado){
				echo "<script>alert('Se ha modificado con éxito');setTimeout(function(){location.href='index.php?c=users&a=index'},100);</script>";
			}
			else{
				echo $resultado;
			}
		}
		
	}
?>
