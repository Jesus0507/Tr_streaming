<?php
require_once "vista/header/header.php";
?>
<link href="vista/js/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">

<title>Tr-Streaming - Login</title>

<body class="bg-gradient-primary" style="background:url('vista/images/food.jpg');background-size:cover; background-repeat: no-repeat">

    <div class="container" >

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block " >
                                <br><br>
                                <center><img style="border-radius: 50px; width:80%;" src="vista/images/tr_streaming.jpg"></center>
                                <br><br>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido</h1>
                                    </div>
                                    <form class="user" id='formularioLogin' method='POST' action="index.php?c=main&a=index&init=1">
                                        <div class="form-group">
                                            <span id="valid_usuario"></span>
                                            <input type="text" class="form-control form-control-user"
                                                id="cedulaUsuario" 
                                                placeholder="Ingrese su usuario" name='usuario'>
                                                
                                                <br>
                                                <span id="valid_clave"></span>
                                                <input type="password" class="form-control form-control-user"
                                                id="claveUsuario" 
                                                placeholder="Ingrese su clave" name='clave'>
                                        </div>
                                    
                                        <button type='button'  id='botonIngresar' class="btn btn-danger btn-user btn-block">
                                          Ingresar
                                        </button>
                           
                                      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vista/vendor/jquery/jquery.min.js"></script>
    <script src="vista/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vista/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
     <script src="vista/js/sweetalert/sweetalert.min.js"></script>
    <script src="vista/js/sb-admin-2.min.js"></script>
    <script src="vista/js/login.js"></script>

</body>

</html>