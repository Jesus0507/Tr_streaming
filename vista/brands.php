<?php
require_once "vista/header/header.php";
?>


<title>Market MP - Marcas</title>

<body id="page-top">



    <div id="wrapper">


<?php require_once("vista/header/sidebar.php") ?>
       

        <div id="content-wrapper" class="d-flex flex-column">

          
            <div id="content">

   <?php require_once("vista/header/navbar.php"); ?>
                               <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Marcas</h1>
                  

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="addBrand"><i 
                                class="fas fa-plus-circle fa-sm text-white-50" ></i> Agregar nueva marca</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="background:#E5E5E5;text-align:center">
                                            <th>Nombre de marca</th>
                                            <th style="text-align: center">Acción</th>
                                        </tr>
                                    </thead>
                       
                                    <tbody>
                                        <?php foreach($marcas as $m){ ?>
                                        <tr>
                                            <td style='text-align:center'><?php echo $m->get_nombre(); ?></td>
                                            <td style="text-align:center">
                                               <em onclick="updateBrand('<?php echo $m->get_nombre(); ?>')" class="fa fa-edit iconEdit" ></em>
                                               <em onclick="deleteBrand('<?php echo $m->get_nombre(); ?>')" class="fa fa-trash iconTrash"></em>
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
<script src="vista/js/brands.js"></script>

</body>

</html>