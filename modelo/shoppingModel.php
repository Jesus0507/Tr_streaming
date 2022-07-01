<?php

   require_once "conect.php";
	
	class shopping_model {

		private $nro_factura;
		private $observaciones;
		private $fecha_entrada;
		private $dni_proveedor;
		private $codigo_barras;
		private $cantidad;
		private $fecha_vencimiento;
		private $costo;
        private $total;
		private $id_detalle;
		private $anulado;
		private $conexion;

		public function __construct(){
            $this->conexion=new base_datos();
		}

		public function set_factura($observaciones,$fecha_entrada,$nro_factura,$total,$dni_proveedor,$anulado){
			$this->observaciones = $observaciones;
			$this->fecha_entrada = $fecha_entrada;
			$this->nro_factura=$nro_factura;
            $this->total=$total;
			$this->dni_proveedor=$dni_proveedor;
			$this->anulado=$anulado;
		}

		public function set_detalle_factura($id_detalle,$codigo_barras,$nro_factura,$cantidad,$fecha_vencimiento,$costo){
			$this->id_detalle = $id_detalle;
			$this->codigo_barras = $codigo_barras;
			$this->nro_factura = $nro_factura;
			$this->cantidad=$cantidad;
			$this->fecha_vencimiento=$fecha_vencimiento;
			$this->costo=$costo;
		}

		public function get_nro_factura(){
             return $this->nro_factura;
		}

		public function get_observaciones(){
			return $this->observaciones;
	   }

	   public function get_fecha_entrada(){
		return $this->fecha_entrada;
      }

   public function get_dni_proveedor(){
	return $this->dni_proveedor;
    }

    public function get_codigo_barras(){
		return $this->codigo_barras;
		}

	public function get_cantidad(){
			return $this->cantidad; 
			}

	public function get_fecha_vencimiento(){
				return $this->fecha_vencimiento;
				}

	public function get_costo(){
					return $this->costo;
					}

	public function get_id_detalle(){
						return $this->id_detalle;
						}

    public function get_total(){
                            return $this->total;
                            }

    public function get_anulado(){
								return $this->anulado;
								}


		public function registrar(){

			$query="INSERT INTO facturas_compra (observaciones,fecha_entrada,total,dni_proveedor,anulada) VALUES ('$this->observaciones','$this->fecha_entrada','$this->total','$this->dni_proveedor',0)";
			try {
				$resultado = $this->conexion->prepare($query);
				$resultado->execute();
				return true;
			} catch (PDOException $e) {
				return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
			}
		
	}

	public function registrar_detalle(){
		$query="INSERT INTO productos_factura_compra (codigo_barras,nro_factura,cantidad,fecha_vencimiento,costo) VALUES ('$this->codigo_barras','$this->nro_factura','$this->cantidad','$this->fecha_vencimiento','$this->costo')";
		try {
			$resultado = $this->conexion->prepare($query);
			$resultado->execute();
			return true;
		} catch (PDOException $e) {
			return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
		}
	
}

public function get_shopping(){
		 
    $query = "SELECT * FROM facturas_compra";
    try {
        $facturas=[];
        $resultado = $this->conexion->prepare($query);
        $resultado->execute();
        $resultado->setFetchMode(PDO::FETCH_ASSOC);
        $respuesta_arreglo = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach($respuesta_arreglo as $v){
         $compra=new shopping_model();
         $compra->set_factura($v['observaciones'],$v['fecha_entrada'],$v['nro_factura'],$v['total'],$v['dni_proveedor'],$v['anulada']);
         $facturas[]=$compra;
        }
        return $facturas;
    } catch (PDOException $e) {
        return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
    }

}

public function get_shopping_detail($codigo){
		 
    $query = "SELECT * FROM facturas_compra FC, productos_factura_compra PFC WHERE PFC.nro_factura=FC.nro_factura AND PFC.codigo_barras='$codigo'";
    try {
        $facturas=[];
        $resultado = $this->conexion->prepare($query);
        $resultado->execute();
        $resultado->setFetchMode(PDO::FETCH_ASSOC);
        $respuesta_arreglo = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach($respuesta_arreglo as $v){
         $compra=new shopping_model();
         $compra->set_factura($v['observaciones'],$v['fecha_entrada'],$v['nro_factura'],$v['total'],$v['dni_proveedor'],$v['anulada']);
         $compra->set_detalle_factura($v['id_producto_factura_compra'],$v['codigo_barras'],$v['nro_factura'],$v['cantidad'],$v['fecha_vencimiento'],$v['costo']);
		 $facturas[]=$compra;
        }
        return $facturas;
    } catch (PDOException $e) {
        return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
    }

}

public function get_shopping_list(){
		 
    $query = "SELECT * FROM facturas_compra FC, productos_factura_compra PFC WHERE PFC.nro_factura=FC.nro_factura";
    try {
        $facturas=[];
        $resultado = $this->conexion->prepare($query);
        $resultado->execute();
        $resultado->setFetchMode(PDO::FETCH_ASSOC);
        $respuesta_arreglo = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach($respuesta_arreglo as $v){
         $compra=new shopping_model();
         $compra->set_factura($v['observaciones'],$v['fecha_entrada'],$v['nro_factura'],$v['total'],$v['dni_proveedor'],$v['anulada']);
         $compra->set_detalle_factura($v['id_producto_factura_compra'],$v['codigo_barras'],$v['nro_factura'],$v['cantidad'],$v['fecha_vencimiento'],$v['costo']);
		 $facturas[]=$compra;
        }
        return $facturas;
    } catch (PDOException $e) {
        return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
    }

}

public function get_fechas_cercanas($codigo){
	$query = "SELECT MAX(fecha_vencimiento),codigo_barras FROM productos_factura_compra WHERE codigo_barras='$codigo'";
	try {
        $resultado = $this->conexion->prepare($query);
        $resultado->execute();
        $resultado->setFetchMode(PDO::FETCH_ASSOC);
        $respuesta_arreglo = $resultado->fetchAll(PDO::FETCH_ASSOC);
		$result="";
        foreach($respuesta_arreglo as $v){
			if($v['MAX(fecha_vencimiento)'] !=null){
         $result=[
			 "fecha"=> $v['MAX(fecha_vencimiento)'],
			 "codigo"=>$v['codigo_barras']
		 ];
		}
		else{
			$result=[
				"fecha"=> 'No aplica',
				"codigo"=>'No aplica'
			];
		}
        }
        return $result;
    } catch (PDOException $e) {
        return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
    }


}


public function anular_factura($factura,$razon){
	$query="UPDATE facturas_compra SET anulada=1, observaciones='$razon' WHERE nro_factura='$factura'";
	try {
		$resultado = $this->conexion->prepare($query);
		$resultado->execute();
        

		return true;
	} catch (PDOException $e) {
		return "Ha ocurrido un error en la línea ".$e->getLine()." <br> Error: ".$e->getMessage();
	}

}



	}
