<!-- Navbar-->
    <header class="app-header" style="background-color:#7f8be8;"><a class="app-header__logo" href="inicio.php" style="background-color:#E84D13;">RentalSys</a>
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
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg">Sesión</i></a>
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
 <li class="treeview"><a class="app-menu__item" href="" data-toggle="treeview"><i class="app-menu__icon fa fa-folder-open"></i><span class="app-menu__label">Catálogo baterias</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="bateriaInicio.php"><i class="icon fa fa-circle-o"></i> Baterias Disponibles</a></li>
            <li><a class="treeview-item" href="mostrarventas.php"><i class="icon fa fa-circle-o"></i> Baterias Vendidas</a></li>
              <li><a class="treeview-item" href="mostrardevoluciones.php"><i class="icon fa fa-circle-o"></i> Baterias Devueltas</a></li>
              
          
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-shopping-cart"></i><span class="app-menu__label">Ventas</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="generarVentas.php"><i class="icon fa fa-circle-o"></i> Generar Ventas</a></li>
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
            <li><a class="treeview-item" href="mostrarProveedores.php"><i class="icon fa fa-circle-o"></i>Proveedores Habilitados</a></li>
            <li><a class="treeview-item" href="proveedoresInhabilitados.php"><i class="icon fa fa-circle-o"></i> Proveedores Inhabilitados</a></li>
            
          </ul>
        </li>
        
         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text-o"></i><span class="app-menu__label">Reportes</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
           
           
            
         
            <li><a class="treeview-item" href="#" onclick="window.open('../reportes/reporteproveedores.php', '_blank', 'fullscreen=yes'); return false;"><i class="icon fa fa-circle-o"></i>Proveedores</a><li>
            <li><a class="treeview-item" href="#" onclick="window.open('../reportes/reporteproductos.php', '_blank', 'fullscreen=yes'); return false;"><i class="icon fa fa-circle-o"></i>Baterias disponibles</a><li>
            <li><a class="treeview-item" href="#" onclick="window.open('../reportes/reportebateriasvendidas.php', '_blank', 'fullscreen=yes'); return false;"><i class="icon fa fa-circle-o"></i>Baterias vendidas</a><li>
            <li><a class="treeview-item" href="#" onclick="window.open('../reportes/reportebaterias_devueltas_clientes.php', '_blank', 'fullscreen=yes'); return false;"><i class="icon fa fa-circle-o"></i>Baterias devueltas (del cliente)</a><li>
            <li><a class="treeview-item" href="#" onclick="window.open('../reportes/reportebaterias_devueltas_proveedor.php', '_blank', 'fullscreen=yes'); return false;"><i class="icon fa fa-circle-o"></i>Baterias devueltas (al proveedor)</a><li>
          </ul>
        </li>
        
        
      </ul>
    </aside>