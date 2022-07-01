<?php
require_once "vista/header/header.php";
?>


<title>Market MP - Compras</title>

<body id="page-top">



    <div id="wrapper">


<?php require_once("vista/header/sidebar.php") ?>
       

        <div id="content-wrapper" class="d-flex flex-column">

          
            <div id="content">

   <?php require_once("vista/header/navbar.php"); ?>
                               <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Compras realizadas</h1>
                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="addShopping"><i 
                                class="fas fa-plus-circle fa-sm text-white-50" ></i> Agregar nueva compra</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="background:#E5E5E5">
                                            <th>Nro Factura</th>
                                            <th>Fecha de compra</th>
                                            <th>Proveedor</th>
                                            <th>Observaciones</th>
                                            <th>Total de compra</th>
                                            <th style="text-align: center">Acción</th>
                                        </tr>
                                    </thead>
                       
                                    <tbody>
                                        <?php foreach($compras as $c){ 
                                            $proveedor="";
                                            foreach($suppliers as $s){
                                                if($s->get_dni()==$c->get_dni_proveedor()){
                                                    $proveedor=$s->get_nombre();
                                                }
                                            }

                                             $productos_compra="";
                                             foreach($todo as $t){
                                                $product="";
                                                foreach($inventario as $i){
                                                    if($i->get_codigo()==$t->get_codigo_barras()){
                                                      $product.=$i->get_tipo_producto()." ".$i->get_marca_producto();
                                                    }
                                                }

                                                 if($t->get_nro_factura() == $c->get_nro_factura()){
                                                $productos_compra.="<tr><td>".$t->get_codigo_barras()."</td>";
                                                $productos_compra.="<td>".$product."</td><td>".$t->get_cantidad()."</td>";
                                                $productos_compra.="<td>".$t->get_costo()."</td><td>".floatval($t->get_cantidad())*floatval($t->get_costo())."</td></tr>";
                                                 }
                                             }   
                                            

                                            if($c->get_anulado()==0){
                                        ?>
                                        <tr>
                                            <td><?php echo $c->get_nro_factura(); ?></td>
                                            <td><?php echo $c->get_fecha_entrada(); ?></td>
                                            <td><?php echo $proveedor ?></td>
                                            <td><?php echo $c->get_observaciones(); ?></td>
                                            <td><?php echo $c->get_total(); ?></td>
                                            <td style="text-align:center">
                                                 <em onclick="seeShoppingDetail('<?php echo $c->get_nro_factura(); ?>','<?php echo $c->get_fecha_entrada(); ?>','<?php echo $proveedor ?>','<?php echo $c->get_total(); ?>','<?php echo $productos_compra; ?>',0)" class="fa fa-eye iconEye" ></em>
                                               <em title="Anular compra" onclick="anularCompra('<?php echo $c->get_nro_factura(); ?>')" class="fa fa-trash iconTrash"></em>
                                            </td>
                                        </tr>
                            <?php } else{ ?>
                                <tr style='background:#FBD1D1'>
                                            <td><?php echo $c->get_nro_factura(); ?></td>
                                            <td><?php echo $c->get_fecha_entrada(); ?></td>
                                            <td><?php echo $proveedor ?></td>
                                            <td><?php echo $c->get_observaciones(); ?></td>
                                            <td><?php echo $c->get_total(); ?></td>
                                            <td style="text-align:center">
                                                 <em onclick="seeShoppingDetail('<?php echo $c->get_nro_factura(); ?>','<?php echo $c->get_fecha_entrada(); ?>','<?php echo $proveedor ?>','<?php echo $c->get_total(); ?>','<?php echo $productos_compra; ?>',1)" class="fa fa-eye iconEye" ></em>
                                            </td>
                                        </tr>
                                   <?php }} ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>


            </div>

<?php require_once("vista/footer/footer.php"); ?>
<script src="vista/js/shopping.js"></script>

</body>

</html>