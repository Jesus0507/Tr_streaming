<?php
require_once "vista/header/header.php";
?>


<title>Market MP - Usuarios</title>

<body id="page-top">



    <div id="wrapper">


<?php require_once("vista/header/sidebar.php") ?>
       

        <div id="content-wrapper" class="d-flex flex-column">

          
            <div id="content">

   <?php require_once("vista/header/navbar.php"); ?>
                               <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Usuarios</h1>
                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="addUser"><i 
                                class="fas fa-user-plus fa-sm text-white-50" ></i> Agregar nuevo usuario</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="background:#E5E5E5">
                                            <th>Cédula</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Cargo</th>
                                            <th>Teléfono</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                       
                                    <tbody>
                                        <?php foreach ($usuarios as $u){ ?>
                                            
                                        <tr>
                                            <td><?php echo $u->get_cedula_usuario(); ?></td>
                                            <td><?php echo $u->get_nombre(); ?></td>
                                            <td><?php echo $u->get_apellido(); ?></td>
                                            <td><?php echo $u->get_cargo(); ?></td>
                                            <td><?php echo $u->get_telefono(); ?></td>
                                            <td style="text-align:center">
                                               <em onclick="seeUser('<?php echo $u->get_cedula_usuario(); ?>','<?php echo $u->get_nombre(); ?>','<?php echo $u->get_apellido(); ?>','<?php echo $u->get_cargo(); ?>','<?php echo $u->get_telefono(); ?>','<?php echo $u->get_correo(); ?>','<?php echo $u->get_nombre_usuario(); ?>','<?php echo $u->get_tipo_usuario(); ?>')" class="fa fa-eye iconEye" ></em>
                                                <em onclick="updateUser('<?php echo $u->get_cedula_usuario(); ?>')" class="fa fa-edit iconEdit" ></em>
                                               <em onclick="deleteUser('<?php echo $u->get_cedula_usuario(); ?>')" class="fa fa-trash iconTrash"></em>
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
<script src="vista/js/users.js"></script>


</body>

</html>