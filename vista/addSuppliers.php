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
                    <h1 class="h3 mb-2 text-gray-800">Agregar proveedor</h1>
                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="backToSuppliers"><i 
                                class="fas fa-arrow-left fa-sm text-white-50" ></i> Regresar</span>
                        </div>
                        <div class="card-body">

                            <form  method='POST' id="formAddSupplier" action='index.php?c=suppliers&a=new_supplier'>
        <table style='width:100%;text-align:center' class='table table-bordered'>
        <tr >
        <td colspan='2'>
            <div class="form-group row">
                                    <div class="col-sm-3 mb-3 mb-sm-0">
                                      <select class="form-control" id='tipoDocumento' name='tipoDocumento' id='tipoDocumento'>
                <option value="0">-Seleccione-</option>
                <option value="V">V</option>
                <option value="J">J</option>
                <option value="E">E</option>
            </select>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" maxlength='12' class="form-control form-control-user" id="dni" name="dni"
                                            placeholder="DNI del proveedor" >
                                    </div>
                                </div>
</td>
        </tr>
        <tr>
        <td>
         <input id='nombre' type='text' name='nombre' placeholder='Nombre del proveedor' class='form-control'>
     </td>
        <td>
            <input id='telefono' type='number' name='telefono' placeholder='Teléfono del proveedor' class='form-control'>
        </td>
        <tr>
        <td>
            <input id='email' type='email' name='correo' placeholder='Correo del proveedor' class='form-control'>
        </td>
        <td>
            <input id='contact' type='text' name='contacto' placeholder='Contacto del proveedor' class='form-control'>
        </td>
        </tr>
        <tr>
        <td colspan='2'>
            <input id='adress' type='text' name='direccion' placeholder='Dirección del proveedor' class='form-control'>
        </td>
        </tr>

      <tr>
          <td colspan='2'>
            <button id='submitButton' style="background:green;color:white" type="button" class="d-none d-sm-inline-block btn btn-sm  shadow-sm">Guardar</button></td>
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