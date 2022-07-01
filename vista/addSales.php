<?php
require_once "vista/header/header.php";
?>


<title>Market MP - Ventas</title>

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
                                <h1 class="h3 mb-2 text-gray-800">Registrar venta de productos</h1>
                            </td>
                            <td>
                                <h4 class='mb-2' style='text-align:right'>Tasa del día: <?php echo $tasa_dolar; ?></h4>
                            </td>
                        </tr>
                    </table>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="backToSales"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Regresar</span>
                            <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="newClient" title="Crear nuevo cliente">
                                <i class="fas fa-user-plus fa-sm text-white-50"></i>
                                Agregar nuevo cliente
                            </span>
                            &nbsp;&nbsp;
                            <span class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" title="Crear nuevo producto" id="newProduct">
                                <i class="fas fa-shopping-cart fa-sm text-white-50"></i>
                                Agregar nuevo producto
                            </span>
                        </div>
                        <div class="card-body">

                            <form method="POST" action="index.php?c=sales&a=agregar" id="formAddSales">
                                <input type='hidden' id='tasa_dolar' value='<?php echo $tasa_dolar; ?>'>
                                <table width="100%">
                                    <tr>
                                        <td colspan="3">Cliente
                                            <input class="form-control form-control-user" placeholder="Buscar cliente" id="datalistClients" name="datalistClients" list="clientes">
                                            <hr>
                                            <datalist id="clientes">
                                                <?php foreach ($clientes as $c) { ?>
                                                    <option value="<?php echo $c->get_cedula_Cliente(); ?>"><?php echo $c->get_nombre_cliente() . " " . $c->get_apellido_cliente(); ?></option>

                                                <?php } ?>
                                            </datalist>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Producto
                                            <select class="form-control" name='selectProductos' id='selectProductos'>
                                                <option value="0">-Seleccione un producto-</option>
                                                <?php foreach ($inventario as $i) {
                                                    if (intval($i->get_cant_neto() > 0)) { ?>
                                                        <option value="<?php echo $i->get_codigo(); ?>"><?php echo $i->get_tipo_producto() . " " . $i->get_marca_producto() . " | cant: " . $i->get_cant_neto(); ?></option>

                                                    <?php } else { ?>
                                                        <option disabled='disabled' style='background:#FBD1D1'><?php echo $i->get_tipo_producto() . " " . $i->get_marca_producto(); ?>(Agotado)</option>
                                                <?php }
                                                } ?>
                                            </select>
                                        </td>
                                        <td>Cantidad
                                            <input type="number" class="form-control form-control-user" id="cantidadProducto" name="cantidadProducto" placeholder="Cantidad">
                                        </td>
                                        <td><br>
                                            <button type="button" class="btn btn-info" name="botonAgregar" id="botonAgregar"><em class="fa fa-shopping-cart"></em> Agregar al carrito</button>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>Precio por unidad
                                            <input type="number" class="form-control form-control-user" id="precioUnidad" name="precioUnidad" placeholder="Precio por unidad">

                                        </td>
                                        <td>Tipo de pago
                                            <select class="form-control" name='divisa' id='divisa'>
                                                <option value="1">Bolívares</option>
                                                <option value="2">Dólares</option>

                                            </select>
                                        </td>



                                    </tr>
                                </table>
                                <div id="productosAgregados">
                                </div>
                                <br>
                                <div id="total" name="total" style="width: 90%;font-size: 22px;font-weight: bold;text-align:right;">
                                </div>
                                <br>
                                <textarea id="observaciones" name="observaciones" class="form-control form-control-user" placeholder="Observaciones, detalles de venta..."></textarea>
                                <textarea id='informacion' name='informacion' style='display:none'></textarea>
                                <br>
                                <center><input type="button" class="btn " style="background:green;color:white" name="guardar" id="guardar" value="Listo"></center>
                            </form>


                        </div>
                    </div>

                </div>


            </div>

            <?php require_once("vista/footer/footer.php"); ?>
            <script src="vista/js/sales.js"></script>

</body>

</html>