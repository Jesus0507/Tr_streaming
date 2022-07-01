<?php
require_once "vista/header/header.php";
?>


<title>Market MP - Salida de productos</title>

<body id="page-top">



    <div id="wrapper">


<?php require_once("vista/header/sidebar.php") ?>
       

        <div id="content-wrapper" class="d-flex flex-column">

          
            <div id="content">

   <?php require_once("vista/header/navbar.php"); ?>
                               <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Registrar salida de productos</h1>
                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-body">


<form method="POST" action="index.php?c=main&a=index" id="formAddOther">
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
                <td><br>
                                    <button type="button" class="btn btn-danger" name="botonAgregar" id="botonAgregar"><em class="fa fa-dumpster"></em> Agregar a lista de salida</button>
                                </td>
              
                            </tr>
                            <tr>
                                <td>Precio por unidad
                                    <input type="number"  class="form-control form-control-user" id="precioUnidad" name="precioUnidad" placeholder="Precio por unidad" 
                                        >
                                    
                                </td>
                                <td>Formato de precio
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
                        <textarea id="observaciones" name="observaciones" class="form-control form-control-user" placeholder="Observaciones, motivo de salida,..."></textarea>

<br><center><input type="button" class="btn btn-danger"  name="guardar" id="guardar" value="Listo"></center>
                            </form>
                 

                        </div>
                    </div>

                </div>


            </div>

<?php require_once("vista/footer/footer.php"); ?>
<script src="vista/js/other.js"></script>

</body>

</html>