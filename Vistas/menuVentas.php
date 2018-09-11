<!-- Navbar-->
    <header class="app-header" style="background-color:#7f8be8;"><a class="app-header__logo" href="inicio.php" style="background-color:#E84D13;">rentalSys(Baterias)</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        
        <!--para cambiar al modulo de renta de vehiculos-->
         <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-car fa-lg"> Cambiar a modulo </i></a>
         
         <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="inicio.php"><i class="fa fa-road fa-lg"></i> Ir a modulo rentas </a></li>
            
          </ul>
         
          </li>
        
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg">Seguridad</i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="registrarUsuario.php"><i class="fa fa-user-plus fa-lg"></i> Registrar Usuario</a></li>
            <li><a class="dropdown-item" href="usuarios.php"><i class="fa fa-user fa-lg"></i>Usuarios</a></li>
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
        <li><a class="app-menu__item active" href="bateriaInicio.php"><i class="app-menu__icon fa fa-folder-open"></i><span class="app-menu__label">Catalogo</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-shopping-cart"></i><span class="app-menu__label">Ventas</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="generarVentas.php"><i class="icon fa fa-circle-o"></i> Generar Ventas</a></li>
           
            
            <li><a class="treeview-item" href="consultarVentas.php"><i class="icon fa fa-circle-o"></i> Consultar Ventas</a></li>
          </ul>
        </li>
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-battery-half"></i><span class="app-menu__label">Baterias</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="agregarProducto.php"><i class="icon fa fa-circle-o"></i> Agregar Baterias</a></li>
           
            
        
          </ul>
        </li>
        
        
        
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text-o"></i><span class="app-menu__label">Proveedores</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
           
           
            
            <li><a class="treeview-item" href="agregarproveedores.php"><i class="icon fa fa-circle-o"></i> Agregar Proveedores</a></li>
            <li><a class="treeview-item" href="mostrarProveedores.php"><i class="icon fa fa-circle-o"></i> Mostrar Proveedores</a></li>
            
          </ul>
        </li>
        
         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text-o"></i><span class="app-menu__label">Reportes</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
           
           
            
            <li><a class="treeview-item" href="form-notifications.html"><i class="icon fa fa-circle-o"></i> Ficha de contacto</a></li>
          </ul>
        </li>
        
        
      </ul>
    </aside>