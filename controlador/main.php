<?php
	
	class mainController {
		
		public function __construct(){
			require_once "modelo/mainModel.php";
		}
		
		public function index(){
			
			$modelo=new main_model();
			$tasa_dolar=$modelo->get_tasa();
            
			if(isset($_GET['init'])){
				$modelo->set_user($_POST['usuario'],$_POST['clave']);
				$resultado=$modelo->get_inicio();
				if(count($resultado)>0){
					require_once "vista/main.php";	
				}
				else{
					echo "<script>alert('Algo ha salido mal, revisa los datos e intenta nuevamente');</script>";
					require_once "vista/login.php";	
				}
			}
			else{
				require_once "vista/main.php";	
			 }
			echo "holaaa";
		
		}

		public function changeTasa(){
			$modelo=new main_model();
			$resultado=$modelo->changeTasa($_POST['inputBs']);
			if($resultado==1){
				header('Location: index.php?c=main&a=index');
				Die();
			}
			else{
				echo $resultado;
			}
		}
		
	}
?>
