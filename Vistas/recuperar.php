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
     
      <div class="lock-box"><img class="rounded-circle user-image" src="images/candado.png">
        <h4 class="text-center user-name">Nombre de Usuario</h4>
        <p class="text-center text-muted">Desbloquear cuenta</p>
        <form class="unlock-form" action="inicio.php">
          <div class="form-group">
            <label class="control-label">Digite nueva contraseña</label>
            <input class="form-control" type="password" placeholder="contraseña" autofocus>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-unlock fa-lg"></i>DESBLOQUEAR </button>
          </div>
        </form>
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