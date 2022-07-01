<?php
require_once "vista/header/header.php";
?>


<title>Market MP - Inicio</title>

<body id="page-top">



    <div id="wrapper">


        <?php require_once("vista/header/sidebar.php") ?>


        <div id="content-wrapper" class="d-flex flex-column">


            <div id="content">

                <?php require_once("vista/header/navbar.php"); ?>
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tasa del dolar del día</h1>
                        <span class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="updateButton"><i id="buttonIcon" class="fas fa-edit fa-sm text-white-50"></i> Modificar</span>
                    </div>

                    <!-- Content Row -->
                    <div class="row">


                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-12 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Tasa en bolívares</div>
                                            <div id="vistaBs" class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo $tasa_dolar; ?>
                                            </div>
                                            <form id='form' action='index.php?c=main&a=changeTasa' method='POST'>
                                                <input id="inputBs" value='<?php echo $tasa_dolar; ?>' name='inputBs' class="form-control" style="width:80%;display:none">
                                            </form>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>



                </div>


            </div>

            <?php require_once("vista/footer/footer.php"); ?>
            <script src="vista/js/main.js"></script>

</body>

</html>