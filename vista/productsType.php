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
                    <h1 class="h3 mb-2 text-gray-800">Tipos de productos</h1>
                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="addProductType"><i 
                                class="fas fa-plus-circle fa-sm text-white-50" ></i> Agregar nuevo tipo de  producto</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="background:#E5E5E5">
                                            <th>Nombre del tipo de producto</th>
                                            <th style="text-align: center">Acción</th>
                                        </tr>
                                    </thead>
                       
                                    <tbody>
                                        <?php foreach($productos as $p){ ?>
                                        <tr>
                                            <td><?php echo $p->get_nombre(); ?></td>
                                            <td style="text-align:center">
                                               <em onclick="updateProductType('<?php echo $p->get_nombre(); ?>')" class="fa fa-edit iconEdit" ></em>
                                               <em onclick="deleteProductType('<?php echo $p->get_nombre(); ?>')" class="fa fa-trash iconTrash"></em>
                                            </td>
                                        </tr>
                            <?php } ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>


            </div>

<?php require_once("vista/footer/footer.php"); ?>
<script src="vista/js/productsType.js"></script>

</body>

</html>