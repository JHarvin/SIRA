<!-- Navbar-->
    <header class="app-header" style="background-color:#7f8be8;"><a class="app-header__logo" href="inicio.php" style="background-color:#E84D13;">rentalSys</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        
        <!--Para cambiar al modulo de ventas-->
        
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-shopping-cart fa-lg">Venta de Baterias</i></a>
         
         <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="bateriaInicio.php"><i class="fa fa-cart-plus fa-lg"></i> Ir a ventas</a></li>
            
          </ul>
         
          </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg">Seguridad</i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            
            
             <li><a class="dropdown-item" href="bitacora.php"><i class="fa fa-edit fa-lg"></i>Bitacora</a></li>
            <li><a class="dropdown-item" href="../index.php"><i class="fa fa-sign-out fa-lg"></i> Salir</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="inicio.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Inicio</span></a></li>

<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users">
          
        </i><span class="app-menu__label">Usarios</span>
        <i class="treeview-indicator fa fa-angle-right"></i></a>
         
          <ul class="treeview-menu">

            <li><a class="treeview-item" href="registrarUsuario.php"><i class="icon fa fa-circle-o"></i> Registrar usuarios</a></li>
           
            
            <li><a class="treeview-item" href="usuarios.php"><i class="icon fa fa-circle-o"></i> Usuarios registrados</a></li>
          </ul>
        </li>



        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-address-card-o">
          
        </i><span class="app-menu__label">Clientes</span>
        <i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="Registrarclientes.php"><i class="icon fa fa-circle-o"></i> Registrar Clientes</a></li>
           
            
            <li><a class="treeview-item" href="clientes.php"><i class="icon fa fa-circle-o"></i> Clientes registrados</a></li>
          </ul>
        </li>
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-car"></i><span class="app-menu__label">Autos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="registrar_auto.php"><i class="icon fa fa-circle-o"></i> Registrar auto</a></li>
           
            
            <li><a class="treeview-item" href="listado_auto.php"><i class="icon fa fa-circle-o"></i> Autos registrados</a></li>
          </ul>
        </li>
        
        
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text-o"></i><span class="app-menu__label">Reportes</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="form-components.html"><i class="icon fa fa-circle-o"></i> Vehiculos</a></li>
            <li><a class="treeview-item" href="form-custom.html"><i class="icon fa fa-circle-o"></i> Alquileres</a></li>
            <li><a class="treeview-item" href="form-samples.html"><i class="icon fa fa-circle-o"></i> Clientes</a></li>
            <li><a class="treeview-item" href="form-notifications.html"><i class="icon fa fa-circle-o"></i> Ficha de contacto</a></li>
          </ul>
        </li>
        
        
      </ul>
    </aside>