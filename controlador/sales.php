<?php

class salesController
{

	public function __construct()
	{
		require_once "modelo/salesModel.php";
		require_once "modelo/clientsModel.php";
		require_once "modelo/inventoryModel.php";
		require_once "modelo/mainModel.php";
	}

	public function index()
	{    
		$modelo=new sales_model();
		$ventas=$modelo->get_sales();
		$todo=$modelo->get_sales_list();

		$modeloP=new inventory_model();
		$inventario=$modeloP->get_inventory();

		$modeloC=new clients_model();
		$clients=$modeloC->get_clients();
		require_once "vista/sales.php";
	}

	public function addSales()
	{
		$modeloC = new clients_model();
		$clientes = $modeloC->get_clients();

		$modeloI = new inventory_model();
		$inventario = $modeloI->get_inventory();

		$modeloMain = new main_model();
		$tasa_dolar = $modeloMain->get_tasa();

		require_once "vista/addSales.php";
	}

	public function printReports()
	{

		$documento = "<title>Market MP - Reporte de ventas</title>";
		$documento .= "<link rel='shortcut icon' type='imagen/x-icon' href='vista/images/marketmk.jpg'>";

		$documento .= "<center><table style='width:90%;font-weight:bolder' border='1'>
			<tr><td style='text-align:center' colspan='8'>Reporte de ventas</td></tr>
            <tr><td>Factura</td><td>Fecha</td><td>Cliente</td><td>Vendedor</td><td>Anulada</td><td>Subtotal</td><td>IVA</td><td>Total</td></tr>
            <tr><td>1</td><td>19-09-2021</td><td>Cliente #1</td><td>Vendedor #1</td><td>No</td><td>25 Bs</td><td>0 Bs</td><td>25 Bs</td></tr>

			</table></center>";

		$documento .= "<script>window.print();</script>";

		echo $documento;
	}

	public function agregar()
	{
		if ($_POST['observaciones'] == "" || $_POST['observaciones'] == NULL) {
			$observaciones = "Sin observaciones";
		} else {
			$observaciones = $_POST['observaciones'];
		}

		$informacion = explode("/", $_POST['informacion']);
		$total = explode("&", $informacion[count($informacion) - 2]);
		$total = $total[3];
		$modelo = new sales_model();
		$modelo->set_factura(" ", $_POST['datalistClients'], $observaciones, date('Y-m-d H:i:s'), 0, $total);
		$resultado1 = $modelo->registrar();

		if ($resultado1 == "true") {
			$facturas = $modelo->get_sales();
			$ultima = $facturas[count($facturas) - 1];
			$id = $ultima->get_nro_factura();
			$funciona = 0;
			for ($i = 0; $i < count($informacion) - 1; $i++) {
				$detalle = explode("&", $informacion[$i]);
				$modelo->set_detalle_factura(" ", $detalle[0], $id, intval($detalle[1]), $detalle[2]);
				$resultado2 = $modelo->registrar_detalle($id);

				if ($resultado2 == true) {
					$funciona++;
					$modeloInventario = new inventory_model();
					$resultado3 = $modeloInventario->get_inventory();
					foreach ($resultado3 as $in) {
						if ($in->get_codigo() == $detalle[0]) {
							$totalIn = intval($in->get_cant_neto()) - intval($detalle[1]);
							$modeloInventario->ingreso_egreso($totalIn, $detalle[0]);
						}
					}
				}
			}

			if ($funciona != 0) {
				echo "<script>alert('Se ha registrado la venta con éxito');setTimeout(function(){location.href='index.php?c=sales&a=index'},100);</script>";
			}


		} else {
			echo $resultado1;
		}
	}
	public function anular(){
		$modelo=new sales_model();
		$modeloI=new inventory_model();
		$resultado=$modelo->anular_factura($_GET['id'],$_GET['razon']);
		$productos=$modelo->get_sales_list();
		$inventario=$modeloI->get_inventory();

		if($resultado==true){
			
			foreach($productos as $p){
				if($p->get_nro_factura()==$_GET['id']){
					   foreach($inventario as $i){
						   if($p->get_codigo_barras()==$i->get_codigo()){
							$totalIn=intval($i->get_cant_neto())+intval($p->get_cantidad());
							$modeloI->ingreso_egreso($totalIn,$p->get_codigo_barras());
						   }
					   }
				}
			}

			echo "<script>alert('Factura anulada con éxito');setTimeout(function(){location.href='index.php?c=sales&a=index'},100);</script>";
		}
		else{
			echo $resultado;
		}
	 }
}
