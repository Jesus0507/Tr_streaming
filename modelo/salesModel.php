<?php
	
	require_once "conect.php";


	class sales_model {
		private $nro_factura;
		private $cedula_cliente;
		private $observaciones;
		private $fecha_salida;
		private $anulada;
		private $codigo_barras;
		private $id_producto_factura;
		private $total;
		private $cantidad;
		private $precio;
		private $conexion;

		public function __construct(){
          $this->conexion=new base_datos();
		}

		public function set_factura($nro_factura,$cedula_cliente,$observaciones,$fecha_salida,$anulada,$total){
			$this->nro_factura   =  $nro_factura;
			$this->cedula_cliente   =  $cedula_cliente;
			$this->observaciones   =  $observaciones;
			$this->fecha_salida   =  $fecha_salida;
			$this->anulada   =  $anulada;
			$this->total   =  $total;
		}


		public function set_detalle_factura($id_producto_factura,$codigo_barras,$nro_factura,$cantidad,$precio){
              $this->id_producto_factura=$id_producto_factura;
			  $this->codigo_barras=$codigo_barras;
			  $this->$nro_factura=$nro_factura;
			  $this->cantidad=$cantidad;
			  $this->precio=$precio;
		}

		public function get_nro_factura(){
			return $this->nro_factura;
		}

		public function get_cedula_cliente(){
            return $this->cedula_cliente;
		}

		public function get_observaciones(){
            return $this->observaciones;
		}

		public function get_fecha_salida(){
            return $this->fecha_salida;
		}

		public function get_anulada(){
            return $this->anulada;
		}

		public function get_codigo_barras(){
            return $this->codigo_barras;
		}

		public function get_id_producto_factura(){
            return $this->id_producto_factura;
		}

		public function get_total(){
            return $this->total;
		}

		public function get_cantidad(){
            return $this->cantidad;
		}


		public function get_precio(){
            return $this->precio;
		}

        
		public function registrar(){

			$query="INSERT INTO facturas_venta (cedula_cliente,observaciones,fecha_salida,anulada,total) 
			VALUES ('$this->cedula_cliente','$this->observaciones','$this->fecha_salida',0,'$this->total')";
			try {
				$resultado = $this->conexion->prepare($query);
				$resultado->execute();
				return true;
			} catch (PDOException $e) {
				return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
			}
		
	}


	public function registrar_detalle($id){
		$query="INSERT INTO productos_factura_venta (codigo_barras,nro_factura,cantidad,precio_unidad) VALUES ('$this->codigo_barras','$id','$this->cantidad','$this->precio')";
		try {
			$resultado = $this->conexion->prepare($query);
			$resultado->execute();
			return $query;
		} catch (PDOException $e) {
			return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
		}
	
}

public function get_sales(){
		 
    $query = "SELECT * FROM facturas_venta";
    try {
        $facturas=[];
        $resultado = $this->conexion->prepare($query);
        $resultado->execute();
        $resultado->setFetchMode(PDO::FETCH_ASSOC);
        $respuesta_arreglo = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach($respuesta_arreglo as $v){
         $venta=new sales_model();
         $venta->set_factura($v['nro_factura'],$v['cedula_cliente'],$v['observaciones'],$v['fecha_salida'],$v['anulada'],$v['total']);
         $facturas[]=$venta;
        }
        return $facturas;
    } catch (PDOException $e) {
        return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
    }

}


public function get_sales_detail($codigo){
		 
    $query = "SELECT * FROM facturas_venta FV, productos_factura_venta PFV WHERE PFV.nro_factura=FV.nro_factura AND PFV.codigo_barras='$codigo'";
    try {
        $facturas=[];
        $resultado = $this->conexion->prepare($query);
        $resultado->execute();
        $resultado->setFetchMode(PDO::FETCH_ASSOC);
        $respuesta_arreglo = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach($respuesta_arreglo as $v){
         $venta=new sales_model();
		 $venta->set_factura($v['nro_factura'],$v['cedula_cliente'],$v['observaciones'],$v['fecha_salida'],$v['anulada'],$v['total']);
         $venta->set_detalle_factura($v['id_producto_factura_venta'],$v['codigo_barras'],$v['nro_factura'],$v['cantidad'],$v['precio_unidad']);
		 $facturas[]=$venta;
        }
        return $facturas;
    } catch (PDOException $e) {
        return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
    }

}


public function get_sales_list(){
		 
    $query = "SELECT * FROM facturas_venta FV, productos_factura_venta PFV WHERE PFV.nro_factura=FV.nro_factura";
    try {
        $facturas=[];
        $resultado = $this->conexion->prepare($query);
        $resultado->execute();
        $resultado->setFetchMode(PDO::FETCH_ASSOC);
        $respuesta_arreglo = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach($respuesta_arreglo as $v){
			$venta=new sales_model();
			$venta->set_factura($v['nro_factura'],$v['cedula_cliente'],$v['observaciones'],$v['fecha_salida'],$v['anulada'],$v['total']);
			$venta->set_detalle_factura($v['id_producto_factura_venta'],$v['codigo_barras'],$v['nro_factura'],$v['cantidad'],$v['precio_unidad']);
			$facturas[]=$venta;
        }
        return $facturas;
    } catch (PDOException $e) {
        return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
    }

}

public function anular_factura($factura,$razon){
	$query="UPDATE facturas_venta SET anulada=1, observaciones='$razon' WHERE nro_factura='$factura'";
	try {
		$resultado = $this->conexion->prepare($query);
		$resultado->execute();
        

		return true;
	} catch (PDOException $e) {
		return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
	}

}


  
	} 
?>