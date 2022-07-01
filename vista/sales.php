<?php
require_once "vista/header/header.php";
?>


<title>Market MP - Ventas</title>

<body id="page-top">



    <div id="wrapper">


        <?php require_once("vista/header/sidebar.php") ?>


        <div id="content-wrapper" class="d-flex flex-column">


            <div id="content">

                <?php require_once("vista/header/navbar.php"); ?>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Ventas realizadas</h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="addSale"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Agregar nueva venta</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="background:#E5E5E5">
                                            <th>Nro Factura</th>
                                            <th>Fecha de venta</th>
                                            <th>Cliente</th>
                                            <th>Observaciones</th>
                                            <th>Total de venta</th>
                                            <th style="text-align: center">Acción</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach($ventas as $v){
                                         $cliente="";
                                         $productos_venta="";
                                         foreach($clients as $c){
                                            if($c->get_cedula_cliente()==$v->get_cedula_cliente()){
                                                $cliente=$c->get_nombre_cliente()." ".$c->get_apellido_cliente();
                                            } 
                                        }
 
                                        foreach($todo as $t){
                                            $product="";
                                            foreach($inventario as $i){
                                                if($i->get_codigo()==$t->get_codigo_barras()){
                                                  $product.=$i->get_tipo_producto()." ".$i->get_marca_producto();
                                                }
                                            }

                                             if($t->get_nro_factura() == $v->get_nro_factura()){
                                            $productos_venta.="<tr><td>".$t->get_codigo_barras()."</td>";
                                            $productos_venta.="<td>".$product."</td><td>".$t->get_cantidad()."</td>";
                                            $productos_venta.="<td>".$t->get_precio()."</td><td>".floatval($t->get_cantidad())*floatval($t->get_precio())."</td></tr>";
                                             }
                                         }   
                                        

                                        if($v->get_anulada()==0){
                                           ?>
                                        <tr>
                                            <td><?php echo $v->get_nro_factura(); ?></td>
                                            <td><?php echo $v->get_fecha_salida(); ?></td>
                                            <td><?php echo $cliente; ?></td>
                                            <td><?php echo $v->get_observaciones(); ?></td>
                                            <td><?php echo $v->get_total(); ?></td>
                                            <td style="text-align:center">
                                                <em onclick="seeSaleDetail('<?php echo $v->get_nro_factura(); ?>','<?php echo $v->get_fecha_salida(); ?>','<?php echo $cliente; ?>','<?php echo $v->get_total(); ?>','<?php echo $productos_venta; ?>',0)" class="fa fa-eye iconEye"></em>
                                                <em title="Anular venta" onclick="anularVenta('<?php echo $v->get_nro_factura(); ?>')" class="fa fa-trash iconTrash"></em>
                                            </td>
                                        </tr>
                                        <?php } else{ ?>
                                            <tr style='background:#FBD1D1'>
                                            <td><?php echo $v->get_nro_factura(); ?></td>
                                            <td><?php echo $v->get_fecha_salida(); ?></td>
                                            <td><?php echo $cliente; ?></td>
                                            <td><?php echo $v->get_observaciones(); ?></td>
                                            <td><?php echo $v->get_total(); ?></td>
                                            <td style="text-align:center">
                                                <em onclick="seeSaleDetail('<?php echo $v->get_nro_factura(); ?>','<?php echo $v->get_fecha_salida(); ?>','<?php echo $cliente; ?>','<?php echo $v->get_total(); ?>','<?php echo $productos_venta; ?>',1)" class="fa fa-eye iconEye"></em>
                                            </td>
                                        </tr>
                                             <?php } } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>


            </div>

            <?php require_once("vista/footer/footer.php"); ?>
            <script src="vista/js/sales.js"></script>

</body>

</html>