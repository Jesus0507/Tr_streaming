<?php
require_once "vista/header/header.php";
?>


<title>Market MP - Inventario</title>

<body id="page-top">



    <div id="wrapper">


<?php require_once("vista/header/sidebar.php") ?>
       

        <div id="content-wrapper" class="d-flex flex-column">

          
            <div id="content">

   <?php require_once("vista/header/navbar.php"); ?>
                               <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Inventario de productos</h1>
                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="addProducts"><i 
                                class="fas fa-plus-circle fa-sm text-white-50" ></i> Agregar nuevo producto</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="background:#E5E5E5">
                                            <th style="text-align:center">Código</th>
                                            <th style="text-align:center">Producto</th>
                                            <th style="text-align:center">Stock mínimo</th>
                                            <th style="text-align:center">Stock máximo</th>
                                            <th style="text-align:center">Cantidad total</th>

                                            <th style="text-align:center">Acción</th>
                                        </tr>
                                    </thead>
                       
                                    <tbody>
                                        <?php foreach($inventario as $i) { 
                                            $fecha_vencimiento="No aplica";   
                                           foreach($fechas as $f){
                                               if($f['codigo']==$i->get_codigo()){
                                                     $fecha_vencimiento=$f['fecha'];
                                               }
                                           }
                                            
                                           $nombre_producto=$i->get_tipo_producto()." ".$i->get_marca_producto();
                                        ?>
                                        <tr>
        
                                             <td style="text-align:center"><?php echo $i->get_codigo(); ?></td>
                                             <td style="text-align:center"><?php echo $nombre_producto; ?></td>
                                            <td style="text-align:center"><?php echo $i->get_stock_minimo(); ?></td>
                                            <td style="text-align:center"><?php echo $i->get_stock_maximo(); ?></td>
                                            <td style="text-align:center"><?php echo $i->get_cant_neto(); ?></td>
                                            <td style="text-align:center">
                                               <em onclick="seeProduct('<?php echo $nombre_producto;?>','<?php echo $i->get_ubicacion(); ?>','<?php echo $i->get_codigo(); ?>','<?php echo $fecha_vencimiento; ?>')" class="fa fa-eye iconEye" ></em>
                                               <em onclick="updateProduct('<?php  echo $i->get_codigo();?>')" class="fa fa-edit iconEdit" ></em>
                                            
                                            </td>
                                        </tr>

                                <?php } ?>                            

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>


            </div>

<?php require_once("vista/footer/footer.php"); ?>
<script src="vista/js/inventory.js"></script>

</body>

</html>