<?php
	
	class mainController {
		
		public function __construct(){
			require_once "modelo/mainModel.php";
			require_once "modelo/bitacoraModel.php";
		}
		
		public function index(){
			
			 $modelo=new main_model();
			 $modelo_bitacora=new bitacora_model();
			 $resp=0;
            
			if(isset($_GET['init'])){
				$modelo->set_user($_POST['usuario'],$_POST['clave']);
				$resultado=$modelo->get_inicio();
				if(count($resultado)>0){	
					$resp=1;
				}
			}
			else{
				$resp=1;
			 }

			 if($resp==1){
				$fecha = new DateTime('NOW', new DateTimeZone('America/Caracas'));
				$fecha=$fecha->format('H:i:s A');
                  $modelo_bitacora->set_inicio($_POST['usuario'],$fecha);
				  $modelo_bitacora->registrar();
			 }

			 echo $resp;
		
		}

		public function main_view(){
			require_once "vista/main.php";
		}

		
	}
?>
