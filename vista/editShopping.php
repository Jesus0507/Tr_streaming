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
                    <h1 class="h3 mb-2 text-gray-800">Editar venta de productos: Factura #<?php echo $_GET['id']; ?></h1>
                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                           <div class="card-header py-3">
                            <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="newSupplier" title="Crear nuevo proveedor">
                                <i  class="fas fa-user-plus fa-sm text-white-50" ></i>
                                 Agregar nuevo proveedor
                             </span> 
                             &nbsp;&nbsp; 
                             <span class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" title="Crear nuevo producto" id="newProduct">
                                <i class="fas fa-shopping-cart fa-sm text-white-50" ></i> 
                            Agregar nuevo producto
                        </span>
                        </div>
                        <div class="card-body">


<form method="POST" action="index.php?c=shopping&a=index" id="formAddShopping">
                 <table  width="100%" >

                            <tr>
                                <td>Producto
                                    <select class="form-control" name='selectProductos' id='selectProductos'>
                <option value="0">-Seleccione un producto-</option>
                <option value="1">Salsa de tomate Heinz</option>
                <option value="2">Harina PAN</option>
                <option value="3">Mayonesa Kraft</option>
            </select>
                                </td>
                                <td>Cantidad
                                         <input type="number"  class="form-control form-control-user" id="cantidadProducto" name="cantidadProducto"
                                            placeholder="Cantidad">
                                </td>
                                <td>Fecha vencimiento
                                    <input type="date"  class="form-control form-control-user" id="fVencimiento" name="fVencimiento"
                                        >
                                </td>
                                <td>Proveedor
                                     <select class="form-control" name='selectProveedores' id='selectProveedores'>
                <option value="0">-Seleccione un proveedor-</option>
                <option value="1">Proveedor #1</option>
                <option value="2">Proveedor #2</option>
                <option value="3">Proveedor #3</option>
            </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Costo
                                    <input type="number"  class="form-control form-control-user" id="costo" name="costo" placeholder="Costo" 
                                        >
                                    
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

<br><center><input type="button" class="btn " style="background:green;color:white" name="guardar" id="guardar" value="Guardar"></center>
                            </form>
                 

                        </div>
                    </div>

                </div>


            </div>

<?php require_once("vista/footer/footer.php"); ?>
<script src="vista/js/shopping.js"></script>

</body>

</html>