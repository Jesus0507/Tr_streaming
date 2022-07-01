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
                    <h1 class="h3 mb-2 text-gray-800">Editar Cliente : <?php echo $cliente->get_cedula_cliente(); ?></h1>
                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="backToClients"><i 
                                class="fas fa-arrow-left fa-sm text-white-50" ></i> Regresar</span>
                        </div>
                        <div class="card-body">

                            <form  method='POST' id="formEditClient" action='index.php?c=clients&a=update'>
        <table style='width:100%;text-align:center' class='table table-bordered'>
        <tr>
        <td colspan='2'>Cédula:<br>
            <input id='updateCedula' readOnly='readOnly' name='cedula' value='<?php echo $cliente->get_cedula_cliente(); ?>' type='number' placeholder='Cédula del cliente' class='form-control'></td>
        </tr>
        <tr>
        <td>Nombre: <br>
         <input id='updateNombre' type='text' value='<?php echo $cliente->get_nombre_cliente(); ?>' name='nombre' placeholder='Nombre del cliente' class='form-control'>
     </td>
        <td>Apellido: <br>
            <input id='updateApellido' value='<?php echo $cliente->get_apellido_cliente(); ?>' name='apellido' type='text' placeholder='Apellido del cliente' class='form-control'>
        </td>
        <tr>
        <td>Teléfono: <br>
            <input id='updateTlf' value='<?php echo $cliente->get_telefono_cliente(); ?>' name='telefono' type='number' placeholder='Nro de teléfono del cliente' class='form-control'>
        </td>
        <td>Correo: <br>
            <input id='updateEmail' type='email' value='<?php echo $cliente->get_correo_cliente(); ?>' name='correo' placeholder='Correo del cliente' class='form-control'>
        </td>
        </tr>
        <tr>
        <td >Dirección:<br>
            <input id='updateAdress' type='text' value='<?php echo $cliente->get_direccion_cliente(); ?>' name='direccion'  placeholder='Dirección del cliente' class='form-control'>
        </td>
        <td>
       <?php if($cliente->get_juridico()==0){ ?>    
          <center> Cliente jurídico: <input id='updateJuricio' name='juridico'  type='checkbox' style='width:20px;height:20px' class='form-control'></center>
        <?php } else{ ?>
          <center> Cliente jurídico: <input id='updateJuricio' name='juridico' checked type='checkbox' style='width:20px;height:20px' class='form-control'></center>
        <?php } ?>
        </td>
        </tr>
      <tr>
          <td colspan='2'>
            <button id='submitButton' type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Modificar</button></td>
      </tr>
    </table>
        </form>
             
                    </div>

</div>
                </div>


            </div>

<?php require_once("vista/footer/footer.php"); ?>
<script src="vista/js/clients.js"></script>


</body>

</html>