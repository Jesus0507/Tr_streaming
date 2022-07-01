<?php
require_once "vista/header/header.php";
?>


<title>Market MP - Prodcutos</title>

<body id="page-top">



  <div id="wrapper">


    <?php require_once("vista/header/sidebar.php") ?>


    <div id="content-wrapper" class="d-flex flex-column">


      <div id="content">

        <?php require_once("vista/header/navbar.php"); ?>
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Editar producto: <?php echo $_GET['id']; ?></h1>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="backToProducts"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Regresar</span>
            </div>
            <div class="card-body">

              <form method='POST' id="formEditProducts" action='index.php?c=inventory&a=update'>
                <table style='width:100%;text-align:center' class='table table-bordered'>
                  <tr>
                    <td style="width: 50%">Código de barra:<br>
                      <input type="text" readOnly='readOnly' name="codigo_barra" value="<?php echo $_GET['id'] ?>" id="codigo_barra" placeholder="Código de barra" class="form-control">
                    </td>
                    <td style="width: 50%">Excento de IVA: <br>
                      <select class="form-control" name='excento' id='excento'>
                        <?php if ($producto->get_iva() == '1') { ?>
                          <option value='1'>NO</option>
                          <option value='2'>SI</option>
                        <?php } else { ?>
                          <option value='2'>SI</option>
                          <option value='1'>NO</option>
                        <?php } ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td>Tipo de producto: <br>
                      <div class="form-group row">
                        <div class="col-sm-9 mb-3 mb-sm-0">
                          <select class="form-control" name='tipoProductoSelect' id='tipoProductoSelect'>
                            <option value='<?php echo $producto->get_tipo_producto(); ?>'><?php echo $producto->get_tipo_producto(); ?></option>
                            <?php foreach ($tiposP as $tp) {
                              if ($tp->get_nombre() != $producto->get_tipo_producto()) { ?>
                                <option value='<?php echo $tp->get_nombre(); ?>'><?php echo $tp->get_nombre(); ?></option>
                            <?php }
                            } ?>
                          </select>
                          <input type="text" style="display:none" class="form-control form-control-user" id="tipoProductoInput" name="tipoProductoInput" placeholder="Tipo de producto">
                        </div>

                        <div class="col-sm-3">
                          <em id="btnNewProductType" class="fa fa-plus-circle iconEye" title="Agregar nuevo tipo de producto" style="font-size:35px"></em>
                        </div>
                      </div>

                    </td>

                    <td>Marca de producto: <br>
                      <div class="form-group row">
                        <div class="col-sm-9 mb-3 mb-sm-0">
                          <select class="form-control" name='marcaProductoSelect' id='marcaProductoSelect'>
                            <option value='<?php echo $producto->get_marca_producto(); ?>'><?php echo $producto->get_marca_producto(); ?></option>
                            <?php foreach ($marcas as $m) {
                              if ($m->get_nombre() != $producto->get_marca_producto()) { ?>
                                <option value='<?php echo $m->get_nombre(); ?>'><?php echo $m->get_nombre(); ?></option>
                            <?php }
                            } ?>
                          </select>
                          <input type="text" style="display:none" class="form-control form-control-user" id="marcaProductoInput" name="marcaProductoInput" placeholder="Marca de producto">
                        </div>

                        <div class="col-sm-3">
                          <em id="btnNewProductBrand" class="fa fa-plus-circle iconEye" title="Agregar nueva marca de producto" style="font-size:35px"></em>
                        </div>
                      </div>

                    </td>
                  </tr>
                  <tr>
                    <td style='display:none'>
                      <div class="form-group row">
                        <div class="col-sm-9 mb-3 mb-sm-0">
                          <select style="display:none" class="form-control" name='almacenProductoSelect' id='almacenProductoSelect'>
                            <option value="1">Almacén #1</option>
                            <option value="2">Almacén #2</option>
                            <option value="3">Almacén #3</option>
                          </select>
                          <input type="text" class="form-control form-control-user" id="almacenProductoInput" name="almacenProductoInput" placeholder="Almacén del producto">
                        </div>

                        <div class="col-sm-3" style="display:none">
                          <em id="btnNewProductWarehouse" class="fa fa-plus-circle iconEye" title="Agregar nuevo almacén" style="font-size:35px"></em>
                        </div>
                      </div>

                    </td>
                    <td colspan='2'>Ubicación:<br>
                      <input type="text" class="form-control form-control-user" value='<?php echo $producto->get_ubicacion(); ?>' id="ubicacionProducto" name="ubicacionProducto" placeholder="Ubicación del producto">
                    </td>
                  </tr>
                  <tr>
                    <td>Stock Mínimo: <br>
                      <input type="number" class="form-control form-control-user" value='<?php echo $producto->get_stock_minimo(); ?>' id="stock_minimo" name="stockMinimo" placeholder="Stock mínimo del producto">
                    </td>
                    <td>Stock Máximo <br>
                      <input type="numberMaximo" class="form-control form-control-user" id="stock_maximo" value='<?php echo $producto->get_stock_maximo(); ?>' name="stockMaximo" placeholder="Stock máximo del producto">
                    </td>
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
      <script src="vista/js/inventory.js"></script>


</body>

</html>