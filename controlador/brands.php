<?php
	
	class brandsController {
		
		public function __construct(){
			require_once "modelo/brandsModel.php";
		}
		
		public function index(){
			$modelo=new brands_model();
			$marcas=$modelo->get_brands();
			require_once "vista/brands.php";	
		}

		public function addBrands(){
               require_once "vista/addBrands.php";
		}

		public function editBrands(){
               require_once "vista/editBrands.php";
		}

		public function new_brand(){
			$modelo=new brands_model();
			$modelo->set_marca($_POST['nombre']);
			$registros=$modelo->get_brands();
			$registrada=false;
			foreach($registros as $v){
				if(strtolower($v->get_nombre())==strtolower($_POST['nombre'])){
					$registrada=true;
				}
			}

			if($registrada==true){
				echo "<script>alert('Ya esta marca se encuentra registrada');setTimeout(function(){location.href='index.php?c=brands&a=addBrands'},100);</script>";
			}
			else{
				if($modelo->registrar()){
					echo "<script>alert('Registrado exitosamente');setTimeout(function(){location.href='index.php?c=brands&a=index'},100);</script>";
				}
				else {
					echo $modelo->registrar();
				}
			}
		}

		public function delete(){
			$marca=$_GET['id'];
			$modelo=new brands_model();
			$result=$modelo->eliminar($marca);
			if($result){
				echo "<script>alert('Eliminado exitosamente');setTimeout(function(){location.href='index.php?c=brands&a=index'},100);</script>";
			}
			else {
				echo $result;
			}
		}


			public function update(){
				$modelo=new brands_model();
				$modelo->set_marca($_POST['updateNombre']);
				$result=$modelo->editar($_POST['Nombre']);
				if($result){
					echo "<script>alert('Modificado exitosamente');setTimeout(function(){location.href='index.php?c=brands&a=index'},100);</script>";
				}
				else {
					echo $result;
				}
			}
		}
		
?>
