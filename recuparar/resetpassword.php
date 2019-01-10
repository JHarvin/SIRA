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
      <div class="cover"></div>
    </section>
    <section class="lockscreen-content">
     
      <div class="lock-box"><img class="rounded-circle user-image" src="../images/candado.png">
        <h4 class="text-center user-name">Nombre de Usuario</h4>
        <p class="text-center text-muted">Desbloquear cuenta</p>
         
		<div class="regisFrm">
			<form class="unlock-form" action="MiCuenta.php" method="post">
				<input type="password" name="password1" class="form-control" placeholder="Escriba la nueva contraseña" required="">
				<input type="password" name="password2" class="form-control" placeholder="Escriab de nuevo la nueva contraseña" required="">
				<div class="send-button">
					<input type="submit" name="forgotSubmit" class="btn btn-info" value="CONTINUAR">
				</div>
			</form>
		</div>
        
        <p><a href="login.php">¿No eres tu ? Ingresa aqui.</a></p>
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