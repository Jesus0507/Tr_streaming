<?php


class inventoryController
{

	public function __construct()
	{
		require_once "modelo/inventoryModel.php";
		require_once "modelo/brandsModel.php";
		require_once "modelo/productsTypeModel.php";
		require_once "modelo/shoppingModel.php";
		require_once "modelo/salesModel.php";
	}

	public function index()
	{
		$modelo = new inventory_model();
		$modeloPFC = new shopping_model();
		$fechas = [];
		$inventario = $modelo->get_inventory();
		foreach ($inventario as $i) {
			$fechas[] = $modeloPFC->get_fechas_cercanas($i->get_codigo());
		}
		require_once "vista/inventory.php";
	}


	public function printInventory1()
	{
		$documento = "<title>Market MP - Inventario</title>";
		$documento .= "<link rel='shortcut icon' type='imagen/x-icon' href='vista/images/marketmk.jpg'>";

		$modelo = new shopping_model();
		$info = $modelo->get_shopping_detail($_GET['id']);

		$modeloI = new inventory_model();
		$inventario = $modeloI->get_inventory();

		$documento .= "<center>";
		$compras = [];

		foreach ($info as $i) {
			$producto = "";
			$factura=$i->get_nro_factura();

			if($i->get_anulado()==1){
				$factura.=" (Anulada)";
			}

			for ($n = 0; $n < count($inventario); $n++) {
				if ($inventario[$n]->get_codigo() == $i->get_codigo_barras()) {
					$producto = $inventario[$n]->get_tipo_producto() . " " . $inventario[$n]->get_marca_producto();
				}
			}


			if (count($compras) == 0) {
				$tabla = "<h3>Factura " . $factura . "</h3><table style='width:75%;margin-bottom:80px;' border='1' ><tr><td colspan='1'>Factura #" . $factura . "</td><td colspan='4'>Fecha: " . $i->get_fecha_entrada() . "</td></tr>";
				$tabla .= "<tr><td colspan='5'>Proveedor: " . $i->get_dni_proveedor() . "</td></tr>";
				$tabla .= "<tr><td colspan='5' style='text-align:center;-webkit-print-color-adjust: exact;background:black;color:white'>DETALLE DE COMPRA</td></tr>";
				$tabla .= "<tr style='-webkit-print-color-adjust: exact;background:gray;color:white'><td>Código de producto</td><td>Producto</td><td>Cantidad</td><td>Precio unitario</td><td>Total</td></tr>";
				$tabla .= "<tr><td>" . $i->get_codigo_barras() . "</td><td>" . $producto . "</td><td>" . $i->get_cantidad() . "</td><td>" . $i->get_costo() . "</td><td>" . floatval($i->get_cantidad()) * floatval($i->get_costo()) . "</td></tr>";

				$compras[] = [
					"codigo" => $i->get_nro_factura(),
					"tabla" => $tabla,
					'total' => floatval($i->get_cantidad()) * floatval($i->get_costo())
				];
			} else {
				$existe = false;
				for ($j = 0; $j < count($compras); $j++) {
					if ($compras[$j]['codigo'] == $i->get_nro_factura()) {
						$existe = $j;
					}
				}

				if ($existe == false) {
					$tabla = "<h3>Factura " . $factura . "</h3><table style='width:75%;margin-bottom:80px;' border='1' ><tr><td colspan='1'>Factura #" . $factura . "</td><td colspan='4'>Fecha: " . $i->get_fecha_entrada() . "</td></tr>";
					$tabla .= "<tr><td colspan='5'>Proveedor: " . $i->get_dni_proveedor() . "</td></tr>";
					$tabla .= "<tr><td colspan='5' style='text-align:center;-webkit-print-color-adjust: exact;background:black;color:white'>DETALLE DE COMPRA</td></tr>";
					$tabla .= "<tr style='-webkit-print-color-adjust: exact;background:gray;color:white'><td>Código de producto</td><td>Producto</td><td>Cantidad</td><td>Precio unitario</td><td>Total</td></tr>";
					$tabla .= "<tr><td>" . $i->get_codigo_barras() . "</td><td>" . $producto . "</td><td>" . $i->get_cantidad() . "</td><td>" . $i->get_costo() . "</td><td>" . floatval($i->get_cantidad()) * floatval($i->get_costo()) . "</td></tr>";

					$compras[] = [
						"codigo" => $i->get_nro_factura(),
						"tabla" => $tabla,
						'total' => floatval($i->get_cantidad()) * floatval($i->get_costo())
					];
				} else {
					$compras[$existe]["tabla"] .= "<tr><td>" . $i->get_codigo_barras() . "</td><td>" . $producto . "</td><td>" . $i->get_cantidad() . "</td><td>" . $i->get_costo() . "</td><td>" . $i->get_total() . "</td></tr>";
					$compras[$existe]['total'] += floatval($i->get_cantidad()) * floatval($i->get_costo());
				}
			}
		}


		for ($i = 0; $i < count($compras); $i++) {
			$compras[$i]['tabla'] .= "<tr><td colspan='5' style='text-align:right;background:black;color:white;-webkit-print-color-adjust: exact;'>TOTAL: " . $compras[$i]['total'] . " Bolívares</td></tr></table>";

			$documento .= $compras[$i]["tabla"];
		}

		$documento .= "<script>window.print();</script>";
		echo $documento;
	}

	public function addProducts()
	{
		$modeloMarca = new brands_model();
		$modeloTipoP = new productsType_model();
		$marcas = $modeloMarca->get_brands();
		$tiposProducto = $modeloTipoP->get_products();
		require_once "vista/addProducts.php";
	}

	public function editProducts()
	{
		$modelo = new inventory_model();
		$producto = "";

		$modeloMarca = new brands_model();
		$modeloTipoP = new productsType_model();


		$registros = $modelo->get_inventory();
		$marcas = $modeloMarca->get_brands();
		$tiposP = $modeloTipoP->get_products();

		foreach ($registros as $r) {
			if ($_GET['id'] == $r->get_codigo()) {
				$producto = $r;
			}
		}

		require_once "vista/editProducts.php";
	}

	public function new_product()
	{
		$modeloInventario = new inventory_model();
		$modeloMarca = new brands_model();
		$modeloTipoP = new productsType_model();

		$_POST['tipoProductoInput'] == "" ? $tipo_p = $_POST['tipoProductoSelect'] : $tipo_p = $_POST['tipoProductoInput'];
		$_POST['marcaProductoInput'] == "" ? $marca_p = $_POST['marcaProductoSelect'] : $marca_p = $_POST['marcaProductoInput'];
		$modeloInventario->set_inventario($_POST['codigo_barra'], $_POST['excento'], $tipo_p, $marca_p, $_POST['ubicacionProducto'], $_POST['stockMaximo'], $_POST['stockMinimo'], 0);

		$marcas = $modeloMarca->get_brands();
		$tiposProducto = $modeloTipoP->get_products();
		$inventarios = $modeloInventario->get_inventory();

		$existe_marca = false;
		$existe_producto = false;
		$existe_inventario = false;

		foreach ($marcas as $m) {
			if (strtolower($m->get_nombre()) == strtolower($marca_p)) {
				$existe_marca = true;
			}
		}

		foreach ($tiposProducto as $tp) {
			if (strtolower($tp->get_nombre()) == strtolower($tipo_p)) {
				$existe_producto = true;
			}
		}

		foreach ($inventarios as $i) {
			if ($i->get_codigo() == $_POST['codigo_barra']) {
				$existe_inventario = true;
			}
		}

		if ($existe_marca == false) {
			$modeloMarca->set_marca($marca_p);
			$modeloMarca->registrar();
		}

		if ($existe_producto == false) {
			$modeloTipoP->set_producto($tipo_p);
			$modeloTipoP->registrar();
		}

		if ($existe_inventario == false) {

			$resultado = $modeloInventario->registrar();
			if ($resultado == true) {
				echo "<script>alert('Se ha registrado con éxito');setTimeout(function(){location.href='index.php?c=inventory&a=index'},100);</script>";
			} else {
				echo $resultado;
			}
		} else {
			echo "<script>alert('Ya hay un registro con este código');setTimeout(function(){location.href='index.php?c=inventory&a=addProducts'},100);</script>";
		}
	}


	public function update()
	{
		$modeloInventario = new inventory_model();
		$modeloMarca = new brands_model();
		$modeloTipoP = new productsType_model();

		$_POST['tipoProductoInput'] == "" ? $tipo_p = $_POST['tipoProductoSelect'] : $tipo_p = $_POST['tipoProductoInput'];
		$_POST['marcaProductoInput'] == "" ? $marca_p = $_POST['marcaProductoSelect'] : $marca_p = $_POST['marcaProductoInput'];
		$modeloInventario->set_inventario($_POST['codigo_barra'], $_POST['excento'], $tipo_p, $marca_p, $_POST['ubicacionProducto'], $_POST['stockMaximo'], $_POST['stockMinimo'], 0);

		$tiposProducto = $modeloTipoP->get_products();
		$marcas = $modeloMarca->get_brands();

		$existe_marca = false;
		$existe_producto = false;

		foreach ($marcas as $m) {
			if (strtolower($m->get_nombre()) == strtolower($marca_p)) {
				$existe_marca = true;
			}
		}

		foreach ($tiposProducto as $tp) {
			if (strtolower($tp->get_nombre()) == strtolower($tipo_p)) {
				$existe_producto = true;
			}
		}

		if ($existe_marca == false) {
			$modeloMarca->set_marca($marca_p);
			$modeloMarca->registrar();
		}

		if ($existe_producto == false) {
			$modeloTipoP->set_producto($tipo_p);
			$modeloTipoP->registrar();
		}


		$resultado = $modeloInventario->modificar();
		if ($resultado == true) {
			echo "<script>alert('Se ha modificado con éxito');setTimeout(function(){location.href='index.php?c=inventory&a=index'},100);</script>";
		} else {
			echo $resultado;
		}
	}


	public function printInventory2()
	{
		$documento = "<title>Market MP - Inventario</title>";
		$documento .= "<link rel='shortcut icon' type='imagen/x-icon' href='vista/images/marketmk.jpg'>";

		$modelo = new sales_model();
		$info = $modelo->get_sales_detail($_GET['id']);

		$modeloI = new inventory_model();
		$inventario = $modeloI->get_inventory();

		$documento .= "<center>";
		$ventas = [];

		foreach ($info as $i) {
			$producto = "";
			$factura=$i->get_nro_factura();

			if($i->get_anulada()==1){
				$factura.=" (Anulada)";
			}

			for ($n = 0; $n < count($inventario); $n++) {
				if ($inventario[$n]->get_codigo() == $i->get_codigo_barras()) {
					$producto = $inventario[$n]->get_tipo_producto() . " " . $inventario[$n]->get_marca_producto();
				}
			}


			if (count($ventas) == 0) {
				$tabla = "<h3>Factura " . $factura . "</h3><table style='width:75%;margin-bottom:80px;' border='1' ><tr><td colspan='1'>Factura #" . $factura . "</td><td colspan='4'>Fecha: " . $i->get_fecha_salida() . "</td></tr>";
				$tabla .= "<tr><td colspan='5'>Cliente: " . $i->get_cedula_cliente() . "</td></tr>";
				$tabla .= "<tr><td colspan='5' style='text-align:center;-webkit-print-color-adjust: exact;background:black;color:white'>DETALLE DE VENTA</td></tr>";
				$tabla .= "<tr style='-webkit-print-color-adjust: exact;background:gray;color:white'><td>Código de producto</td><td>Producto</td><td>Cantidad</td><td>Precio unitario</td><td>Total</td></tr>";
				$tabla .= "<tr><td>" . $i->get_codigo_barras() . "</td><td>" . $producto . "</td><td>" . $i->get_cantidad() . "</td><td>" . $i->get_precio() . "</td><td>" . floatval($i->get_cantidad()) * floatval($i->get_precio()) . "</td></tr>";

				$ventas[] = [
					"codigo" => $i->get_nro_factura(),
					"tabla" => $tabla,
					'total' => floatval($i->get_cantidad()) * floatval($i->get_precio())
				];
			} else {
				$existe = false;
				for ($j = 0; $j < count($ventas); $j++) {
					if ($ventas[$j]['codigo'] == $i->get_nro_factura()) {
						$existe = $j;
					}
				}

				if ($existe == false) {
					$tabla = "<h3>Factura " . $factura . "</h3><table style='width:75%;margin-bottom:80px;' border='1' ><tr><td colspan='1'>Factura #" . $factura . "</td><td colspan='4'>Fecha: " . $i->get_fecha_salida() . "</td></tr>";
					$tabla .= "<tr><td colspan='5'>Cliente: " . $i->get_cedula_cliente() . "</td></tr>";
					$tabla .= "<tr><td colspan='5' style='text-align:center;-webkit-print-color-adjust: exact;background:black;color:white'>DETALLE DE VENTA</td></tr>";
					$tabla .= "<tr style='-webkit-print-color-adjust: exact;background:gray;color:white'><td>Código de producto</td><td>Producto</td><td>Cantidad</td><td>Precio unitario</td><td>Total</td></tr>";
					$tabla .= "<tr><td>" . $i->get_codigo_barras() . "</td><td>" . $producto . "</td><td>" . $i->get_cantidad() . "</td><td>" . $i->get_precio() . "</td><td>" . floatval($i->get_cantidad()) * floatval($i->get_precio()) . "</td></tr>";

					$ventas[] = [
						"codigo" => $i->get_nro_factura(),
						"tabla" => $tabla,
						'total' => floatval($i->get_cantidad()) * floatval($i->get_precio())
					];
				} else {
					$ventas[$existe]["tabla"] .= "<tr><td>" . $i->get_codigo_barras() . "</td><td>" . $producto . "</td><td>" . $i->get_cantidad() . "</td><td>" . $i->get_precio() . "</td><td>" . $i->get_total() . "</td></tr>";
					$ventas[$existe]['total'] += floatval($i->get_cantidad()) * floatval($i->get_precio());
				}
			}
		}


		for ($i = 0; $i < count($ventas); $i++) {
			$ventas[$i]['tabla'] .= "<tr><td colspan='5' style='text-align:right;background:black;color:white;-webkit-print-color-adjust: exact;'>TOTAL: " . $ventas[$i]['total'] . " Bolívares</td></tr></table>";

			$documento .= $ventas[$i]["tabla"];
		}

		$documento .= "<script>window.print();</script>";
		echo $documento;
	}
}
