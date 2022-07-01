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
                    <h1 class="h3 mb-2 text-gray-800">Editar venta de productos: Factura#<?php echo $_GET['id']; ?></h1>
                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                           <div class="card-header py-3">
                            <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="newClient" title="Crear nuevo cliente">
                                <i  class="fas fa-user-plus fa-sm text-white-50" ></i>
                                 Agregar nuevo cliente
                             </span> 
                             &nbsp;&nbsp; 
                             <span class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" title="Crear nuevo producto" id="newProduct">
                                <i class="fas fa-shopping-cart fa-sm text-white-50" ></i> 
                            Agregar nuevo producto
                        </span>
                        </div>
                        <div class="card-body">


<form method="POST" action="index.php?c=sales&a=index" id="formAddSales">
                 <table  width="100%" >
                    <tr>
                        <td colspan="3">Cliente
                            <input class="form-control form-control-user" placeholder="Buscar cliente" id="datalistClients" name="datalistClients" list="clientes">
                            <hr>
                            <datalist id="clientes">
                                <option value="Cliente #1"></option>
                                <option value="Cliente #2"></option>
                                <option value="Cliente #3"></option>
                            </datalist>
                        </td>
                    </tr>

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
                <td><br>
                                    <button type="button" class="btn btn-info" name="botonAgregar" id="botonAgregar"><em class="fa fa-shopping-cart"></em> Agregar al carrito</button>
                                </td>
              
                            </tr>
                            <tr>
                                <td>Precio por unidad
                                    <input type="number"  class="form-control form-control-user" id="precioUnidad" name="precioUnidad" placeholder="Precio por unidad" 
                                        >
                                    
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

<br><center><input type="button" class="btn " style="background:green;color:white" name="guardar" id="guardar" value="Listo"></center>
                            </form>
                 

                        </div>
                    </div>

                </div>


            </div>

<?php require_once("vista/footer/footer.php"); ?>
<script src="vista/js/sales.js"></script>

</body>

</html>