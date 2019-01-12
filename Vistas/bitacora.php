<?php
require_once"../Controladores/ControladorBitacora.php";
require_once"../Modelos/ModeloBitacora.php";
session_start();
if(!$_SESSION["validar"]){


    header("location:../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Bitacora</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">

     <?php
      include"menu.php";
      ?>

      <main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="app-menu__icon fa fa-folder-open"  style="font-size:25px;color:orange"></i> Bitacora</h1>
            <p>Rent a Car Chacón </p>
          </div>

   </div>
      <div class="row user">

        <div class="col-md-3">
          <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
              <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Bitacora</a></li>
<p>Nombre: <?php $datos=new BitacoraController();
$mostrar=$datos->obtenerNombreController($idpersonalBit);
echo "".$mostrar["nombre"];
 ?></p>
 <p>Usuario: <?php
echo $usuario;
 ?></p>
 <h4>Historial por meses</h4>
 <li class="btn btn-info btn-block fa fa-calendar">
   ver 01/2019
 </li>
            </ul>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane active" id="user-timeline">
              <?php
              $mostrarBitacora=new BitacoraController();
              $mostrarBitacora->mostrarBitacoraController($idpersonalBit);
               ?>

            </div>

          </div>
        </div>
      </div>
    </main>

      <!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../js/plugins/pace.min.js"></script>
  </body>
</html>
