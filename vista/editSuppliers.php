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
                    <h1 class="h3 mb-2 text-gray-800">Editar Proveedor: <?php echo $_GET['id']; ?></h1>
                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="backToSuppliers"><i 
                                class="fas fa-arrow-left fa-sm text-white-50" ></i> Regresar</span>
                        </div>
                        <div class="card-body">

                            <form  method='POST' id="formEditSupplier" action='index.php?c=suppliers&a=update'>
        <table style='width:100%;text-align:center' class='table table-bordered'>
        <tr style='display:none'>
        <td colspan='2'>
            <div class="form-group row">
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                      <select class="form-control" name='updateTipoDocumento' id='updateTipoDocumento'>
                <option value="V">V</option>
                <option value="J">J</option>
                <option value="E">E</option>
            </select>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-user" id="updateDni" name="dni"
                                            placeholder="DNI del proveedor" value='<?php echo $_GET["id"]; ?>'>
                                    </div>
                                </div>
</td>
        </tr>
        <tr>
        <td>Nombre: <br>
         <input id='updateNombre' type='text' name='nombre' value='<?php echo $proveedor->get_nombre(); ?>' placeholder='Nombre del proveedor' class='form-control'>
     </td>
        <td>Teléfono:<br>
            <input id='updateTlf' type='number' name='telefono' value='<?php echo $proveedor->get_telefono(); ?>' placeholder='Teléfono del proveedor' class='form-control'>
        </td>
        <tr>
        <td>Correo:<br>
            <input id='updateEmail' type='email' name='correo' value='<?php echo $proveedor->get_correo(); ?>' placeholder='Correo del proveedor' class='form-control'>
        </td>
        <td>Contacto:<br>
            <input id='updateContact' type='text' name='contacto' value='<?php echo $proveedor->get_contacto(); ?>' placeholder='Contacto del proveedor' class='form-control'>
        </td>
        </tr>
        <tr>
        <td colspan='2'>Dirección:<br>
            <input id='updateAdress' name='direccion' value='<?php echo $proveedor->get_direccion(); ?>' type='text' placeholder='Dirección del proveedor' class='form-control'>
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
<script src="vista/js/suppliers.js"></script>


</body>

</html>