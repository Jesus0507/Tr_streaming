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
                    <h1 class="h3 mb-2 text-gray-800">Editar Usuario : <?php echo $usuario->get_cedula_usuario(); ?></h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="backToUsers"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Regresar</span>
                        </div>
                        <div class="card-body">

                            <form method='POST' id="formEditUser" action='index.php?c=users&a=update_user'>
                                <table style='width:100%;text-align:center' class='table table-bordered'>
                                    <tr>
                                        <td colspan='2'>
                                            <input id='updateCedula' readOnly='readOnly' value='<?php echo $usuario->get_cedula_usuario(); ?>' type='number' placeholder='Cédula del usuario' class='form-control' name='cedula'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input id='updateNombre' value='<?php echo $usuario->get_nombre(); ?>' name='nombre' type='text' placeholder='Nombre del usuario' class='form-control'>
                                        </td>
                                        <td>
                                            <input id='updateApellido' value='<?php echo $usuario->get_apellido(); ?>' name='apellido' type='text' placeholder='Apellido del usuario' class='form-control'>
                                        </td>
                                    <tr>
                                        <td>
                                            <input id='updateTlf' value='<?php echo $usuario->get_telefono(); ?>' name='telefono' type='number' placeholder='Nro de teléfono del usuario' class='form-control'>
                                        </td>
                                        <td>
                                            <input id='updateEmail' value='<?php echo $usuario->get_correo(); ?>' name='correo' type='email' placeholder='Correo del usuario' class='form-control'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan='2'>
                                            <input id='updateClave' type='password' name='contrasenia' placeholder='Clave del usuario' value='<?php echo $usuario->get_contrasenia(); ?>' class='form-control'>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input id='updateCargo' value='<?php echo $usuario->get_cargo(); ?>' name='cargo' type='text' placeholder='Cargo del usuario' class='form-control'>
                                        </td>
                                        <td>
                                            <select id='tipoUsuario' name='tipoUsuario' class='form-control'>

                                                <?php switch (intval($usuario->get_tipo_usuario())) {
                                                    case 1:
                                                ?>

                                                        <option value='1'>Super usuario</option>
                                                        <option value='2'>Administrador</option>
                                                        <option value='3'>Usuario</option>

                                                    <?php
                                                        break;
                                                    case 2:

                                                    ?>
                                                        <option value='2'>Administrador</option>
                                                        <option value='3'>Usuario</option>
                                                        <option value='1'>Super usuario</option>
                                                    <?php
                                                        break;
                                                    default:
                                                    ?>

                                                        <option value='3'>Usuario</option>
                                                        <option value='1'>Super usuario</option>
                                                        <option value='2'>Administrador</option>
                                                <?php
                                                        break;
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan='2'> <input type="text" class="form-control form-control-user" id="userName" value='<?php echo $usuario->get_nombre_usuario(); ?>' name="userName" placeholder="Nombre de usuario"></td>
                                    </tr>
                                    <tr>
                                        <td colspan='2'>
                                            <button id='submitButton' type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Modificar</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>

                        </div>

                    </div>
                </div>


            </div>

            <?php require_once("vista/footer/footer.php"); ?>
            <script src="vista/js/users.js"></script>


</body>

</html>