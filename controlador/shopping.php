<?php
	
	class shoppingController {
		
		public function __construct(){
			require_once "modelo/shoppingModel.php";
            require_once "modelo/inventoryModel.php";
            require_once "modelo/suppliersModel.php";
            require_once "modelo/mainModel.php";
		}
		
		public function index(){
            $modelo=new shopping_model();
            $compras=$modelo->get_shopping();
            $todo=$modelo->get_shopping_list();

            $modeloP=new inventory_model();
            $inventario=$modeloP->get_inventory();

            $modeloS=new suppliers_model();
            $suppliers=$modeloS->get_proveedores();

			require_once "vista/shopping.php";	
		}

		public function addShopping(){
                $modeloI=new inventory_model();
                $modeloP=new suppliers_model();
                $modeloMain=new main_model();
                $inventario=$modeloI->get_inventory();
                $proveedores=$modeloP->get_proveedores();
                $tasa_dolar=$modeloMain->get_tasa();
               require_once "vista/addShopping.php";
		}


        public function agregar(){
            if($_POST['observaciones']=="" || $_POST['observaciones']==NULL){
                $observaciones="Sin observaciones";
            }
            else{
                $observaciones=$_POST['observaciones'];
            }

            $informacion=explode("/",$_POST['informacion']);
            $total=explode("&",$informacion[count($informacion)-2]);
            $dni=$total[5];
            $total=$total[4];


            $modelo=new shopping_model();
            $modelo->set_factura($observaciones,date('Y-m-d H:i:s')," ",$total,$dni,0);


            $resultado1=$modelo->registrar();

            if($resultado1=="true"){
               $facturas=$modelo->get_shopping();
               $ultima=$facturas[count($facturas)-1];
               $funciona=0;
               for ($i=0;$i<count($informacion)-1; $i++){
                   $detalle=explode("&",$informacion[$i]);
                   $modelo->set_detalle_factura(" ",$detalle[0],$ultima->get_nro_factura(),intval($detalle[1]),$detalle[2],$detalle[3]);
                   $resultado2=$modelo->registrar_detalle();
                   if($resultado2==true){
                       $funciona++;
                       $modeloInventario=new inventory_model();
                       $resultado3=$modeloInventario->get_inventory();
                       foreach($resultado3 as $in){
                           if($in->get_codigo()==$detalle[0]){
                               $totalIn=intval($in->get_cant_neto())+intval($detalle[1]);
                          $modeloInventario->ingreso_egreso($totalIn,$detalle[0]);
                            
                           }
                       }
                   }
                }

                if($funciona!=0){
                  echo "<script>alert('Se ha registrado la compra con éxito');setTimeout(function(){location.href='index.php?c=shopping&a=index'},100);</script>";
                }
                 

          ///  echo json_encode($informacion);
            }
            else{
                echo $resultado1;
            }
           
        }

         public function anular(){
            $modelo=new shopping_model();
            $modeloI=new inventory_model();
            $resultado=$modelo->anular_factura($_GET['id'],$_GET['razon']);
            $productos=$modelo->get_shopping_list();
            $inventario=$modeloI->get_inventory();

            if($resultado==true){
                
                foreach($productos as $p){
                    if($p->get_nro_factura()==$_GET['id']){
                           foreach($inventario as $i){
                               if($p->get_codigo_barras()==$i->get_codigo()){
                                $totalIn=intval($i->get_cant_neto())-intval($p->get_cantidad());
                                $modeloI->ingreso_egreso($totalIn,$p->get_codigo_barras());
                               }
                           }
                    }
                }



                echo "<script>alert('Factura anulada con éxito');setTimeout(function(){location.href='index.php?c=shopping&a=index'},100);</script>";
            }
            else{
                echo $resultado;
            }
         }		
	}
?>
