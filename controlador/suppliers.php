<?php
	
	class suppliersController {
		
		public function __construct(){
			require_once "modelo/suppliersModel.php";
		}
		
		public function index(){
			$modelo=new suppliers_model();
			$proveedores=$modelo->get_proveedores();
			
			require_once "vista/suppliers.php";	
		}

		public function addSuppliers(){
               require_once "vista/addSuppliers.php";
		}

		public function editSuppliers(){
			$modelo=new suppliers_model();
			$proveedores=$modelo->get_proveedores();
			$proveedor='';
			foreach($proveedores as $p){
				if($p->get_dni()==$_GET['id']){
					$proveedor=$p;
				}
			}
          require_once "vista/editSuppliers.php";
		}

		public function new_supplier(){
			$modelo=new suppliers_model();
			$dni=$_POST['tipoDocumento']."-".$_POST['dni'];
		   $modelo->set_proveedor($dni,$_POST['nombre'],$_POST['telefono'],$_POST['correo'],$_POST['contacto'],$_POST['direccion']);
		   $registros=$modelo->search_supplier();
   
		   if(count($registros)>0){
			   echo "<script>alert('Ya este proveedor se encuentra registrado');setTimeout(function(){location.href='index.php?c=suppliers&a=addSuppliers'},100);</script>";
		   }
		   else{
		   
		   $resultado=$modelo->registrar();
		   if($resultado){
			   echo "<script>alert('Se ha registrado exitosamente');setTimeout(function(){location.href='index.php?c=suppliers&a=index'},100);</script>";
		   }
		   else{
			   echo $resultado;
		   }
   
	   }
		}


		public function delete(){
			$dni=$_GET['id'];
			$modelo=new suppliers_model();
			$result=$modelo->eliminar($dni);
			if($result){
				echo "<script>alert('Se ha eliminado exitosamente');setTimeout(function(){location.href='index.php?c=suppliers&a=index'},100);</script>";
			}
			else{
				echo $result;
			}
		}
	
		public function update(){
			$modelo=new suppliers_model();
			$modelo->set_proveedor($_POST['dni'],$_POST['nombre'],$_POST['telefono'],$_POST['correo'],$_POST['contacto'],$_POST['direccion']);
			$result=$modelo->editar();
			if($result){
				echo "<script>alert('Se ha modificado exitosamente');setTimeout(function(){location.href='index.php?c=suppliers&a=index'},100);</script>";
			}
			else{
				echo $result;
			}
		  
		}

	}
?>
