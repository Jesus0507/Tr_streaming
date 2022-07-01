        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="background:#3C1D16">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?c=main&a=index">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="sidebar-brand-text mx-3"><span style="color:green">Market</span> <span style="color:yellow">MP</span></div>
            </a>

      
            <hr class="sidebar-divider my-0">
             <div class="sidebar-heading">
                Entidades
            </div>

      <?php if($_GET['c']=='users'){ ?>

            <li class="nav-item active" style="height:30px;">
                <span class="nav-link" >
                    <i class="fas fa-fw fa-users-cog"></i>
                    <span>Usuarios</span></span>
            </li>

     <?php } else { ?>
         <li class="nav-item " style="height:30px;">
             <a class="nav-link" href="index.php?c=users&a=index">
                    <i class="fas fa-fw fa-users-cog"></i>
                    <span>Usuarios</span></a>
            </li>
         <?php } ?>
                
       


      <?php if($_GET['c']=='clients'){ ?>
            <li class="nav-item active" style="height:30px;">
                <span class="nav-link" >
                    <i class="fas fa-fw fa-users"></i>
                    <span>Clientes</span></span>
            </li>
     <?php } else { ?>
         <li class="nav-item " style="height:30px;">
              <a class="nav-link" href="index.php?c=clients&a=index">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Clientes</span></a>
            </li>
         <?php } ?>
              


     <?php if($_GET['c']=='suppliers'){ ?>
            <li class="nav-item active" style="height:30px;">
                <span class="nav-link" >
                    <i class="fas fa-fw fa-truck"></i>
                    <span>Proveedores</span></span>
            </li>
     <?php } else { ?>
         <li class="nav-item " style="height:30px;">
            <a class="nav-link" href="index.php?c=suppliers&a=index">
                    <i class="fas fa-fw fa-truck"></i>
                    <span>Proveedores</span></a>
            </li>
         <?php } ?>
                
<br>
        
            <hr class="sidebar-divider">

  
            <div class="sidebar-heading">
                Entrada de productos
            </div>


    <?php if($_GET['c']=='shopping'){ ?>
            <li class="nav-item active" style="height:30px;">
                <span class="nav-link" >
                    <i class="fas fa-fw fa-shopping-bag"></i>
                    <span>Compras</span></span>
            </li>
     <?php } else { ?>
         <li class="nav-item " style="height:30px;">
            <a class="nav-link" href="index.php?c=shopping&a=index">
                    <i class="fas fa-fw fa-shopping-bag"></i>
                    <span>Compras</span></a>
            </li>
         <?php } ?>
                

<br>
             <hr class="sidebar-divider">


            <div class="sidebar-heading">
                Salida de productos
            </div>

  
          <?php if($_GET['c']=='sales'){ ?>
            <li class="nav-item active" style="height:30px;">
                 <span class="nav-link" >
                    <i class="fas fa-fw fa-cash-register"></i>
                    <span>Ventas</span></span>
            </li>
     <?php } else { ?>
         <li class="nav-item " style="height:30px;">
             <a class="nav-link" href="index.php?c=sales&a=index">
                    <i class="fas fa-fw fa-cash-register"></i>
                    <span>Ventas</span></a>
            </li>
         <?php } ?>
               

              
<br>
               <hr class="sidebar-divider">


            <div class="sidebar-heading">
               Admin. de productos
            </div>

    
 <?php if($_GET['c']=='brands'){ ?>
            <li class="nav-item active" style="height:30px;">
                 <span class="nav-link">
                    <i class="fas fa-fw fa-registered"></i>
                    <span>Marcas</span></span>
            </li>
     <?php } else { ?>
         <li class="nav-item " style="height:30px;">
             <a class="nav-link" href="index.php?c=brands&a=index">
                    <i class="fas fa-fw fa-registered"></i>
                    <span>Marcas</span></a>
            </li>
         <?php } ?>

          <?php if($_GET['c']=='productsType'){ ?>
            <li class="nav-item active" style="height:30px;">
                 <span class="nav-link">
                    <i class="fas fa-fw fa-shopping-basket"></i>
                    <span>Productos</span></span>
            </li>
     <?php } else { ?>
         <li class="nav-item " style="height:30px;">
             <a class="nav-link" href="index.php?c=productsType&a=index">
                    <i class="fas fa-fw fa-shopping-basket"></i>
                    <span>Productos</span></a>
            </li>
         <?php } ?>
 


  <?php if($_GET['c']=='inventory'){ ?>
            <li class="nav-item active" style="height:30px;">
                 <span class="nav-link">
                    <i class="fas fa-fw fa-boxes"></i>
                    <span>Inventario</span></span>
            </li>
     <?php } else { ?>
         <li class="nav-item " style="height:30px;">
             <a class="nav-link" href="index.php?c=inventory&a=index">
                    <i class="fas fa-fw fa-boxes"></i>
                    <span>Inventario</span></a>
            </li>
         <?php } ?>
               


                
<br>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

  

        </ul>