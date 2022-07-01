<?php
require_once "vista/header/header.php";
?>


<title>Market MP - Compras</title>

<body id="page-top">



    <div id="wrapper">


        <?php require_once("vista/header/sidebar.php") ?>


        <div id="content-wrapper" class="d-flex flex-column">


            <div id="content">

                <?php require_once("vista/header/navbar.php"); ?>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <table style='width:100%'>
                        <tr>
                            <td>
                                <h1 class="h3 mb-2 text-gray-800">Registrar compra de productos</h1>
                            </td>
                            <td>
                                <h4 class='mb-2' style='text-align:right'>Tasa del día: <?php echo $tasa_dolar; ?></h4>
                            </td>
                        </tr>
                    </table>


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">

                            <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="backToShopping"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Regresar</span>

                            <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="newSupplier" title="Crear nuevo proveedor">
                                <i class="fas fa-user-plus fa-sm text-white-50"></i>
                                Agregar nuevo proveedor
                            </span>
                            &nbsp;&nbsp;
                            <span class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" title="Crear nuevo producto" id="newProduct">
                                <i class="fas fa-shopping-cart fa-sm text-white-50"></i>
                                Agregar nuevo producto
                            </span>
                        </div>
                        <div class="card-body">


                            <form method="POST" action="index.php?c=shopping&a=agregar" id="formAddShopping">
                                <input type='hidden' id='tasa_dolar' value='<?php echo $tasa_dolar; ?>'>
                                <select class="form-control" name='selectProveedores' id='selectProveedores'>
                                    <option value="0">-Seleccione un proveedor-</option>
                                    <?php foreach ($proveedores as $p) { ?>
                                        <option value="<?php echo $p->get_dni(); ?>"><?php echo $p->get_nombre(); ?></option>
                                    <?php } ?>
                                </select>
                                <br>
                                <table width="100%">

                                    <tr>
                                        <td>Producto
                                            <select class="form-control" name='selectProductos' id='selectProductos'>
                                                <option value="0">-Seleccione un producto-</option>
                                                <?php foreach ($inventario as $i) { ?>
                                                    <option value="<?php echo $i->get_codigo(); ?>"><?php echo $i->get_tipo_producto() . " " . $i->get_marca_producto(); ?></option>

                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td>Cantidad
                                            <input type="number" class="form-control form-control-user" id="cantidadProducto" name="cantidadProducto" placeholder="Cantidad">
                                        </td>
                                        <td>Fecha vencimiento
                                            <input type="date" class="form-control form-control-user" id="fVencimiento" name="fVencimiento">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Costo
                                            <input type="number" class="form-control form-control-user" id="costo" name="costo" placeholder="Costo">

                                        </td>
                                        <td>Tipo de pago
                                            <select class="form-control" name='divisa' id='divisa'>
                                                <option value="1">Bolívares</option>
                                                <option value="2">Dólares</option>

                                            </select>
                                        </td>

                                        <td><br>
                                            <input type="button" class="btn btn-info" name="botonAgregar" id="botonAgregar" value="Agregar">
                                        </td>

                                    </tr>
                                </table>
                                <div id="productosAgregados">
                                </div>
                                <br>
                                <div style="width:90%;text-align:right;font-weight: bolder;font-size:22px;" id="total"></div>
                                <br>
                                <textarea id="observaciones" name="observaciones" class="form-control form-control-user" placeholder="Observaciones, detalles de compra..."></textarea>
                                <textarea id='informacion' name='informacion' style='display:none'></textarea>
                                <br>
                                <center><input type="button" class="btn btn-successs" style="background:green;color:white" name="guardar" id="guardar" value="Guardar"></center>
                            </form>


                        </div>
                    </div>

                </div>


            </div>

            <?php require_once("vista/footer/footer.php"); ?>
            <script src="vista/js/shopping.js"></script>

</body>

</html>