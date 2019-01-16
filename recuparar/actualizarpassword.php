<?php
require_once"ModeloRecuperar.php";
if(isset($_GET["fp_code"]) && !empty($_GET["fp_code"])){
    $id=$_GET["fp_code"];
}
if(isset($_GET["regresar"]) && !empty($_GET["regresar"])){
  $regresar="re";
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../recuparar/jsAjax/recuperarAjax.js"></script>
    <title>Recuperar Contraseña</title>
  </head>
  <body>

    <section class="lockscreen-content">

      <div class="lock-box"><img class="rounded-circle user-image" src="../images/candado.png">
        <h4 class="text-center user-name">Digite la nueva contraseña</h4>
        <p class="text-center text-muted">Digite la nueva contraseña para iniciar sesion con la nueva contraseña</p>

		<div class="unlock-form" id="regisFrm">
			<input type="hidden" id="id" name="id" value="<?php echo $id;?>">
				<input type="password" name="password1" id="password1" class="form-control" placeholder="Escriba la nueva contraseña" required="">
				<br>

				<input type="password" name="password2" id="password2" class="form-control" placeholder="Escriab de nuevo la nueva contraseña" required="">
				<br>
        <?php if($regresar="re"){?>
        <input type="hidden" name="inic" id="inic" value="<?php echo $regresar; ?>">
      <?php }?>
      <?php if($regresar!="re"){?>
      <input type="hidden" name="inic" id="inic" value="1">
    <?php }?>

				<div class="send-button">

                    <button name="recuperar" id="recuperar" class="btn btn-info">
                    <li class="fa fa-key"></li>
                    Cambiar</button>
				</div>
        <a type="button" href="../Vistas/inicio.php" class="btn btn-info" name="button">
          <li class="fa fa-undo"></li>
          Atras
        </a>

		</div>


      </div>
    </section>
    <!-- Essential javascripts for application to work-->

    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../js/plugins/pace.min.js"></script>

  </body>
</html>
