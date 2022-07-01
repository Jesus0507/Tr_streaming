<?php
require_once "vista/header/header.php";
?>


<title>Market MP - Productos</title>

<body id="page-top">



    <div id="wrapper">


<?php require_once("vista/header/sidebar.php") ?>
       

        <div id="content-wrapper" class="d-flex flex-column">

          
            <div id="content">

   <?php require_once("vista/header/navbar.php"); ?>
                               <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Agregar nuevo tipo de producto</h1>
                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="backToProductsType"><i 
                                class="fas fa-arrow-left fa-sm text-white-50" ></i> Regresar</span>
                        </div>
                        <div class="card-body">

                            <form  method='POST' id="formAddProductsType" action='index.php?c=productsType&a=new_product'>
        <table style='width:100%;text-align:center' class='table table-bordered'>
        <tr >
        <td >
         

                                        <input type="text" class="form-control form-control-user" id="nombre" name="nombre"
                                            placeholder="Nombre del tipo de producto">
                         
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
<script src="vista/js/productsType.js"></script>


</body>

</html>