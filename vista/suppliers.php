<?php
require_once "vista/header/header.php";
?>


<title>Market MP - Proveedores</title>

<body id="page-top">



    <div id="wrapper">


<?php require_once("vista/header/sidebar.php") ?>
       

        <div id="content-wrapper" class="d-flex flex-column">

          
            <div id="content">

   <?php require_once("vista/header/navbar.php"); ?>
                               <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Proveedores</h1>
                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="addSupplier"><i 
                                class="fas fa-plus-circle fa-sm text-white-50" ></i> Agregar nuevo proveedor</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="background:#E5E5E5">
                                            <th>DNI</th>
                                            <th>Nombre</th>
                                            <th>Teléfono</th>
                                            <th>Dirección</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                       
                                    <tbody>
                                        <?php foreach($proveedores as $p){ ?>
                                        <tr>
                                            <td><?php echo $p->get_dni(); ?></td>
                                            <td><?php echo $p->get_nombre(); ?></td>
                                            <td><?php echo $p->get_telefono();?></td>
                                            <td><?php echo $p->get_direccion();?></td>
                                            <td style="text-align:center">
                                               <em onclick="seeSupplier('<?php echo $p->get_dni(); ?>','<?php echo $p->get_nombre(); ?>','<?php echo $p->get_telefono();?>','<?php echo $p->get_direccion(); ?>','<?php echo $p->get_contacto(); ?>','<?php echo $p->get_correo(); ?>')" class="fa fa-eye iconEye" ></em>
                                               <em onclick="updateSupplier('<?php echo $p->get_dni(); ?>')" class="fa fa-edit iconEdit" ></em>
                                               <em onclick="deleteSupplier('<?php echo $p->get_dni(); ?>')" class="fa fa-trash iconTrash"></em>
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
<script src="vista/js/suppliers.js"></script>

</body>

</html>