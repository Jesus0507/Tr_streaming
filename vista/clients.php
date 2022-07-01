<?php
require_once "vista/header/header.php";
?>


<title>Market MP - Clientes</title>

<body id="page-top">



    <div id="wrapper">


<?php require_once("vista/header/sidebar.php") ?>
       

        <div id="content-wrapper" class="d-flex flex-column">

          
            <div id="content">

   <?php require_once("vista/header/navbar.php"); ?>
                               <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Clientes</h1>
                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="addClient"><i 
                                class="fas fa-user-plus fa-sm text-white-50" ></i> Agregar nuevo cliente</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="background:#E5E5E5">
                                            <th>Cédula</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Jurídico</th>
                                            <th>Teléfono</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                       
                                    <tbody>
                                        <?php foreach($clientes as $c){ ?>
                                        <tr>
                                            <td><?php echo $c->get_cedula_cliente(); ?></td>
                                            <td><?php echo $c->get_nombre_cliente(); ?></td>
                                            <td><?php echo $c->get_apellido_cliente(); ?></td>

                                            <?php if($c->get_juridico()==1){?>
                                            <td style="text-align:center">
                                            <em class="fa fa-check"></em>
                                        </td>
                                        <?php } else { ?>
                                            <td style="text-align:center">
                                            <em class="fa fa-times"></em>
                                        </td>
                                        <?php } ?>
                                            <td><?php echo $c->get_telefono_cliente(); ?></td>
                                            <td style="text-align:center">
                                               <em onclick="seeClient('<?php echo $c->get_cedula_cliente(); ?>','<?php echo $c->get_nombre_cliente(); ?>','<?php echo $c->get_apellido_cliente(); ?>','<?php echo $c->get_telefono_cliente(); ?>','<?php echo $c->get_juridico(); ?>')" class="fa fa-eye iconEye" ></em>
                                               <em onclick="updateClient('<?php echo $c->get_cedula_cliente(); ?>')" class="fa fa-edit iconEdit" ></em>
                                               <em onclick="deleteClient('<?php echo $c->get_cedula_cliente(); ?>')" class="fa fa-trash iconTrash"></em>
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
<script src="vista/js/clients.js"></script>

</body>

</html>