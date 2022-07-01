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
                    <h1 class="h3 mb-2 text-gray-800">Agregar nuevo producto</h1>
                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="backToProducts"><i 
                                class="fas fa-arrow-left fa-sm text-white-50" ></i> Regresar</span>
                        </div>
                        <div class="card-body">

                            <form  method='POST' id="formAddProducts" action='index.php?c=inventory&a=new_product'>
        <table style='width:100%;text-align:center' class='table table-bordered'>
          <tr>
            <td style="width: 50%">
              <input type="text" name="codigo_barra" onkeyup='this.value=this.value.toUpperCase();' id="codigo_barra" placeholder="Código de barra" class="form-control">
            </td>
            <td style="width: 50%">
              <select class="form-control" name='excento' id='excento'>
                <option value="0">Excento  IVA</option>
                <option value="2">Si</option>
                <option value="1">No</option>
            </select>
            </td>
          </tr>
        <tr >
        <td>
                                <div class="form-group row">
                                    <div class="col-sm-9 mb-3 mb-sm-0">
                                      <select class="form-control" name='tipoProductoSelect' id='tipoProductoSelect'>
                <option value="0">-Tipo de producto-</option>
                <?php foreach($tiposProducto as $tp) { ?>
                <option value="<?php echo $tp->get_nombre();?>"><?php echo $tp->get_nombre();?></option>
                <?php } ?>
            </select>
              <input type="text" style="display:none" class="form-control form-control-user" id="tipoProductoInput" name="tipoProductoInput"
                                            placeholder="Tipo de producto">
                                    </div>

                                    <div class="col-sm-3">
                                       <em id="btnNewProductType" class="fa fa-plus-circle iconEye" title="Agregar nuevo tipo de producto" style="font-size:35px"></em>
                                    </div>
                                </div>
                         
</td>

        <td>
                                <div class="form-group row">
                                    <div class="col-sm-9 mb-3 mb-sm-0">
                                      <select class="form-control" name='marcaProductoSelect' id='marcaProductoSelect'>
                <option value="0">-Marca de producto-</option>
                <?php foreach($marcas as $m){ ?>
                <option value="<?php echo $m->get_nombre();?>"><?php echo $m->get_nombre();?></option>
                <?php } ?>
            </select>
              <input type="text" style="display:none" class="form-control form-control-user" id="marcaProductoInput" name="marcaProductoInput"
                                            placeholder="Marca de producto">
                                    </div>

                                    <div class="col-sm-3">
                                       <em id="btnNewProductBrand" class="fa fa-plus-circle iconEye" title="Agregar nueva marca de producto" style="font-size:35px"></em>
                                    </div>
                                </div>
                         
</td>
</tr>
<tr>

<td colspan="2">
     <input type="text"  class="form-control form-control-user" id="ubicacionProducto" name="ubicacionProducto" placeholder="Ubicación del producto">
</td>
        </tr>
        <tr>
            <td>
     <input type="number"  class="form-control form-control-user" id="stock_minimo" name="stockMinimo" placeholder="Stock mínimo del producto">
</td><td>
     <input type="numberMaximo"  class="form-control form-control-user" id="stock_maximo" name="stockMaximo" placeholder="Stock máximo del producto">
</td>
        </tr>
        </tr>

      <tr>
          <td colspan='2'>
            <button style="background:green;color:white"  id='submitButton' type="button" class="d-none d-sm-inline-block btn btn-sm  shadow-sm">Guardar</button></td>
      </tr>
    </table>
        </form>
             
                    </div>

</div>
                </div>


            </div>

<?php require_once("vista/footer/footer.php"); ?>
<script src="vista/js/inventory.js"></script>


</body>

</html>