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
                    <h1 class="h3 mb-2 text-gray-800">Agregar nuevo usuario</h1>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="backToUsers"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Regresar</span>
                        </div>
                        <div class="card-body">
                            <form class="user" id='formularioUsuario' method='POST' action='index.php?c=users&a=new_user'>
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" id="cedula" name="cedula" placeholder="Cédula del usuario">
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="nombre" name="nombre" placeholder="Nombre del usuario">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="apellido" name="apellido" placeholder="Apellido del usuario">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user" id="telefono" name="telefono" placeholder="Nro de teléfono del usuario">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control form-control-user" id="correo" name="correo" placeholder="Correo del usuario">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" id="clave" name="clave" placeholder="Clave del usuario">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" id="claveConfirm" name="claveConfirm" placeholder="Confirmar clave del usuario">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="cargo" name="cargo" placeholder="Cargo del usuario">
                                    </div>
                                    <div class="col-sm-6">
                                        <select style="border-radius:130px; height:50px;" id='tipoUsuario' name='tipoUsuario' class='form-control'>
                                            <option value='0'>-Seleccione-</option>
                                            <option value='1'>Super usuario</option>
                                            <option value='2'>Administrador</option>
                                            <option value='3'>Usuario</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-6 mb-sm-3">
                                        <input type="text" class="form-control form-control-user" id="userName" name="userName" placeholder="Nombre de usuario">
                                    </div>

                                </div>


                                <button style="background:green" type='button' id='boton' class="btn btn-primary btn-user btn-block">
                                    Guardar
                                </button>

                            </form>
                        </div>
                    </div>

                </div>


            </div>

            <?php require_once("vista/footer/footer.php"); ?>
            <script src="vista/js/users.js"></script>

</body>

</html>