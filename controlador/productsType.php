<?php
	
	class productsTypeController {
		
		public function __construct(){
			require_once "modelo/productsTypeModel.php";
		}
		
		public function index(){
			$modelo=new productsType_model();
			$productos=$modelo->get_products();
			require_once "vista/productsType.php";	
		}

		public function addProductsType(){
               require_once "vista/addProductsType.php";
		}

		public function editProductsType(){
               require_once "vista/editProductsType.php";
		}

		public function new_product(){
			$modelo=new productsType_model();
			$modelo->set_producto($_POST['nombre']);
			$registros=$modelo->get_products();
			$registrado=false;
			foreach($registros as $v){
				if(strtolower($v->get_nombre())==strtolower($_POST['nombre'])){
					$registrado=true;
				}
			}

			if($registrado==true){
				echo "<script>alert('Ya este tipo de producto se encuentra registrado');setTimeout(function(){location.href='index.php?c=productsType&a=addProductsType'},100);</script>";
			}
			else{
				if($modelo->registrar()){
					echo "<script>alert('Registrado exitosamente');setTimeout(function(){location.href='index.php?c=productsType&a=index'},100);</script>";
				}
				else {
					echo $modelo->registrar();
				}
			}
		}

		public function delete(){
			$producto=$_GET['id'];
			$modelo=new productsType_model();
			$result=$modelo->eliminar($producto);
			if($result){
				echo "<script>alert('Eliminado exitosamente');setTimeout(function(){location.href='index.php?c=productsType&a=index'},100);</script>";
			}
			else {
				echo $result;
			}
		}

		public function update(){
			$modelo=new productsType_model();
			$modelo->set_producto($_POST['updateNombre']);
			$result=$modelo->editar($_POST['Nombre']);
			if($result){
				echo "<script>alert('Modificado exitosamente');setTimeout(function(){location.href='index.php?c=productsType&a=index'},100);</script>";
			}
			else {
				echo $result;
			}
		}

		
	}
?>
