<?php

   require_once "conect.php";

	class inventory_model  {
       private $codigo;
	   private $iva;
	   private $tipo_producto;
	   private $marca_producto;
	   private $ubicacion;
	   private $stock_minimo;
       private $stock_maximo;
	   private $cant_neto;
       private $conexion;

	   public function __construct(){
		   $this->conexion=new base_datos();
	   }

	   public function set_inventario($codigo,$iva,$tipo_producto,$marca_producto,$ubicacion,$stock_maximo,$stock_minimo,$cant_neto){
		$this->codigo               = $codigo;
		$this->iva                  = $iva;
		$this->tipo_producto        = $tipo_producto;
		$this->marca_producto       = $marca_producto;
		$this->ubicacion            = $ubicacion;
		$this->stock_minimo         = $stock_minimo;
		$this->stock_maximo         = $stock_maximo;
		$this->cant_neto            = $cant_neto;
	   }

	   public function get_codigo(){
		   return $this->codigo;
	   }

	   public function get_iva(){
		return $this->iva;
	}

	public function get_tipo_producto(){
		return $this->tipo_producto;
	}

	public function get_marca_producto(){
		return $this->marca_producto;
	}

	public function get_ubicacion(){
		return $this->ubicacion;
	}

	public function get_stock_minimo(){
		return $this->stock_minimo;
	}

	public function get_stock_maximo(){
		return $this->stock_maximo;
	}

	public function get_cant_neto(){
		return $this->cant_neto;
	}

	public function registrar(){


		$query="INSERT INTO productos (codigo_barras,nombre_tipo_producto,nombre_marca_producto,ubicacion,stock_minimo,stock_maximo,cant_neto,iva) 
		VALUES ('$this->codigo','$this->tipo_producto','$this->marca_producto','$this->ubicacion','$this->stock_minimo','$this->stock_maximo','$this->cant_neto','$this->iva')";
			try {
				$resultado = $this->conexion->prepare($query);
				$resultado->execute();
				return true;
			} catch (PDOException $e) {
				return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
			}
	}


	public function get_inventory(){
		$query="SELECT * FROM productos ORDER BY codigo_barras ASC";
		try {
			$productos=[];
			$resultado = $this->conexion->prepare($query);
			$resultado->execute();
			$resultado->setFetchMode(PDO::FETCH_ASSOC);
			foreach($resultado->fetchAll(PDO::FETCH_ASSOC) as $v){
			 $producto=new inventory_model();
			 $producto->set_inventario($v['codigo_barras'],$v['iva'],$v['nombre_tipo_producto'],$v['nombre_marca_producto'],$v['ubicacion'],$v['stock_maximo'],$v['stock_minimo'],$v['cant_neto']);
			 $productos[]=$producto;
			}
			return $productos;
		} catch (PDOException $e) {
			return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
		}
	}


	public function search_inventory(){
		$query="SELECT * FROM productos WHERE codigo_barra='$this->codigo'";
		try {
			$productos=[];
			$resultado = $this->conexion->prepare($query);
			$resultado->execute();
			$resultado->setFetchMode(PDO::FETCH_ASSOC);
			foreach($resultado->fetchAll(PDO::FETCH_ASSOC) as $v){
			 $producto=new inventory_model();
			 $producto->set_inventario($v['codigo_barras'],$v['iva'],$v['nombre_tipo_producto'],$v['nombre_marca_producto'],$v['ubicacion'],$v['stock_maximo'],$v['stock_minimo'],$v['cant_neto']);
			 $productos[]=$producto;
			}
			return $productos;
		} catch (PDOException $e) {
			return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
		}
	}


	public function modificar(){


		$query="UPDATE productos SET nombre_tipo_producto='$this->tipo_producto',nombre_marca_producto='$this->marca_producto',ubicacion='$this->ubicacion',
		stock_minimo='$this->stock_minimo',stock_maximo='$this->stock_maximo',iva='$this->iva' WHERE codigo_barras='$this->codigo'";
					try {
				$resultado = $this->conexion->prepare($query);
				$resultado->execute();
				return true;
			} catch (PDOException $e) {
				return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
			}
	}

    public function ingreso_egreso($total,$codigo){


		$query="UPDATE productos SET cant_neto='$total' WHERE codigo_barras='$codigo'";
					try {
				$resultado = $this->conexion->prepare($query);
				$resultado->execute();
				return $query;
			} catch (PDOException $e) {
				return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
			}
	}
	



	} 
?>