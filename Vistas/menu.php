<!-- Navbar-->
   <?php
session_start();
if(!empty($_SESSION["usuario"])){

$usuario=$_SESSION["usuario"];


$idpersonalBit=$_SESSION["id"];


$idpersonalBit=$_SESSION["id"];

}

?>
    <header class="app-header" style="background-color:#0F6099;">
    <a class="app-header__logo" href="inicio.php" style="background-color:#788499;">RentalSys</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar" style="background-color:#788499; color:white;"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">

        <!--Para cambiar al modulo de ventas-->

        
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"><?php echo " ".$usuario; ?></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">

               <li><a class="dropdown-item" href="../recuparar/actualizarpassword.php?fp_code=<?php echo $idpersonalBit?>&regresar=re"><i class="fa fa-key fa-lg"></i>Mod. Contraseña</a></li>
             <li><a class="dropdown-item" href="bitacora.php"><i class="fa fa-edit fa-lg"></i>   Bitacora</a></li>
            <li><a class="dropdown-item" href="../index.php"><i class="fa fa-sign-out fa-lg"></i>Salir</a></li>





          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu---->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">

      <ul class="app-menu">
        <li><a class="app-menu__item active" href="inicio.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Inicio</span></a></li>
        <li><a class="app-menu__item" href="precios.php"><i class="fa fa-money"></i><span class="app-menu__label">Precios alquiler</span></a></li>

         <li><a class="app-menu__item" href="mantenimientos.php"><i class="fa fa-wrench"></i><span class="app-menu__label">Mantenimiento</span></a></li>

         <li><a class="app-menu__item" href="alquilados.php"><i class="fa fa-road"></i><span class="app-menu__label">Autos alquilados</span></a></li>
<?php
if($_SESSION["seguridad"]=="A"){?>
<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users">

        </i><span class="app-menu__label">Usuarios</span>
        <i class="treeview-indicator fa fa-angle-right"></i></a>

          <ul class="treeview-menu">

            <li><a class="treeview-item" href="registrarUsuario.php"><i class="icon fa fa-circle-o"></i> Registrar usuarios</a></li>




            <li><a class="treeview-item" href="usuarios.php"><i class="icon fa fa-circle-o"></i> Usuarios habilitados</a></li>

             <li><a class="treeview-item" href="usuariosina.php"><i class="icon fa fa-circle-o"></i> Usuarios inhabilitados</a></li>






          </ul>
        </li>
<?php }?>


        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-address-card-o">

        </i><span class="app-menu__label">Clientes</span>
        <i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="Registrarclientes.php"><i class="icon fa fa-circle-o"></i> Registrar Clientes</a></li>




            <li><a class="treeview-item" href="clientes.php"><i class="icon fa fa-circle-o"></i> Clientes habilitados</a></li>
            <li><a class="treeview-item" href="ClientesDeBaja.php"><i class="icon fa fa-circle-o"></i> Clientes inhabilitados</a></li>




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
          <li><a class="treeview-item" href="#" onclick="window.open('../reportes/reportecliente.php', '_blank', 'fullscreen=yes'); return false;"><i class="icon fa fa-circle-o"></i>Clientes</a><li>
          <li><a class="treeview-item" href="#" onclick="window.open('../reportes/reporteusuario.php', '_blank', 'fullscreen=yes'); return false;"><i class="icon fa fa-circle-o"></i>Usuarios</a><li>
          <li><a class="treeview-item" href="#" onclick="window.open('../reportes/reporteautos.php', '_blank', 'fullscreen=yes'); return false;"><i class="icon fa fa-circle-o"></i>Autos</a><li>





        </li>



        </li>


      </ul>
        <li><a class="app-menu__item" href="BackupRestore.php"><i class="fa fa-database"></i><span class="app-menu__label">Respaldar/restaurar</span></a></li>
    </aside>

<div class="modal modal-info fade in" id="cambiarPassword">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">

                <h4 class="modal-title">Cambiar contraseña. Usuario <?php echo $usuario;?></h4>
            </div>

            <div class="modal-body">
                <!-- form start -->
                <form class="form-horizontal">
                    <div id="mcp" class="box-body">

                        <div class="row" >


                            <div align="center" class="col-md-12">
                                <input class="form-control" type="text" name="pass1" id="pass1" placeholder="Escriba nueva contraseña"><br>
                                <input class="form-control" type="text" name="pass2" id="pass2" placeholder="Escriba otra vez la contraseña">

                            </div><!--fin columna-->


                        </div><!--fin row-->

                    </div>
<input type="hidden" name="idmcp" id="idmcp" value="<?php $idpersonalBit?>">
                </form>

            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Atras </button>
                <button type="button" id="upPass" name="upPass"  class="btn btn-primary">Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
