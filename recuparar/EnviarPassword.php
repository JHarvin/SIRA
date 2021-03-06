<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['estado']['msg'])){
    $statusMsg = $sessData['estado']['msg'];
    $statusMsgType = $sessData['estado']['type'];
    unset($_SESSION['sessData']['estado']);
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
    <title>Recuperar Contraseña</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover" style="background: linear-gradient(130deg, #7f8be8 30%, gray 100%);"></div>
    </section>
    <section class="lockscreen-content">
     
      <div class="lock-box"><img class="rounded-circle user-image" src="../images/candado.png">
        <h4 class="text-center user-name">Digite su email</h4>
        <p class="text-center text-muted">Digite email con el cual se registro en el sistema para desbloquear</p>
          <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
		<div class="regisFrm">
			<form class="unlock-form" action="MiCuenta.php" method="post">
			
				<input type="email" name="email" class="form-control" placeholder="EMAIL" required="">
				<br>
				<div class="send-button">
				
                    <button type="submit" name="forgotSubmit" class="btn btn-info btn-block" value="Enviar">
                        <li class="fa fa-send"></li>
                        Enviar
                    </button>
				</div>
			</form>
		</div>
        
        <p><a href="../index.php">Iniciar sesión.</a></p>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../js/plugins/pace.min.js"></script>
  </body>
</html>