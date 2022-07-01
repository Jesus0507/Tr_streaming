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
                    <h1 class="h3 mb-2 text-gray-800">Agregar nuevo cliente</h1>
                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="backToClients"><i 
                                class="fas fa-arrow-left fa-sm text-white-50" ></i> Regresar</span>
                        </div>
                        <div class="card-body">
                                                   <form class="user" id='formularioClients' method='POST' action='index.php?c=clients&a=new_client'>
                                                     <div class="form-group">
                                    <input type="number" class="form-control form-control-user" id="cedula" name="cedula"
                                        placeholder="Cédula del cliente">
                                </div>
                                <div class="form-group row">
                                    
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="nombre" name="nombre"
                                            placeholder="Nombre del cliente">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="apellido" name="apellido"
                                            placeholder="Apellido del cliente">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user" id="telefono" name="telefono"
                                            placeholder="Nro de teléfono del cliente">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email" class="form-control form-control-user" id="correo" name="correo"
                                            placeholder="Correo del cliente">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="adress" name="adress"
                                            placeholder="Dirección del cliente">
                                    </div>
                                    <div class="col-sm-6" style='text-align:center'>
                                      <center> Cliente jurídico: <input style='height: 20px;width:20px'  type="checkbox" class="form-control form-control-user" id="juridico" name="juridico"
                                           ></center>
                                    </div>
                                </div>
                              
                            
                
                                <button id='boton' type='button' style="background:green"  class="btn btn-primary btn-user btn-block">
                                   Guardar
                                </button>
                              
                            </form>
                        </div>
                    </div>

                </div>


            </div>

<?php require_once("vista/footer/footer.php"); ?>
<script src="vista/js/clients.js"></script>

</body>

</html>