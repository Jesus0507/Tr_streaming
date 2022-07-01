	<?php
	
	class clientsController {

		
		public function __construct(){
			require_once "modelo/clientsModel.php";
		}
		
		public function index(){

			$modelo=new clients_model();
			$clientes=$modelo->get_clients();
			
			require_once "vista/clients.php";	
		}

		public function addClients(){
               require_once "vista/addClients.php";
		}

		public function editClients(){
			$modelo=new clients_model();
			$clientes=$modelo->get_clients();
			$cliente="";

			foreach($clientes as $c){
				if($c->get_cedula_cliente()==$_GET['id']){
					$cliente=$c;
				}
			}

               require_once "vista/editClients.php";
		}

		public function new_client(){
         $modelo=new clients_model();

		 if(isset($_POST['juridico'])){ 
			 $_POST['juridico']=='off'?$jur=0:$jur=1;
		 }
		 else{
			 $jur=0;
		 }

	    $modelo->set_cliente($_POST['cedula'],$_POST['nombre'],$_POST['apellido'],$_POST['telefono'],$_POST['correo'],$_POST['adress'],$jur);
	    $registros=$modelo->search_clients();

		if(count($registros)>0){
			echo "<script>alert('Ya este cliente se encuentra registrado');setTimeout(function(){location.href='index.php?c=clients&a=addClients'},100);</script>";
		}
		else{
		
		$resultado=$modelo->registrar();
		if($resultado){
			echo "<script>alert('Se ha registrado exitosamente');setTimeout(function(){location.href='index.php?c=clients&a=index'},100);</script>";
		}
		else{
			echo $resultado;
		}

	}
	}

	public function delete(){
		$cedula=$_GET['id'];
		$modelo=new clients_model();
		$resultado=$modelo->eliminar($cedula);
		if($resultado){
			echo "<script>alert('Se ha eliminado exitosamente');setTimeout(function(){location.href='index.php?c=clients&a=index'},100);</script>";
		}
		else{
			echo $resultado;
		}


	}

	public function update(){
		$modelo=new clients_model();
		if(isset($_POST['juridico'])){ 
			$_POST['juridico']=='off'?$jur=0:$jur=1;
		}
		else{
			$jur=0;
		}
		$modelo->set_cliente($_POST['cedula'],$_POST['nombre'],$_POST['apellido'],$_POST['telefono'],$_POST['correo'],$_POST['direccion'],$jur);
	    $resultado=$modelo->editar();
		if($resultado){
			echo "<script>alert('Se ha modificado exitosamente');setTimeout(function(){location.href='index.php?c=clients&a=index'},100);</script>";
		}
		else{
			echo $resultado;
		}

	}
		
	}
?>
