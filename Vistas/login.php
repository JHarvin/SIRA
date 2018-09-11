<?php

#--se ejecuta cuando se sale del programa destruye la sesion para que no puede ingresar nadie mas
session_start();
session_destroy();

?>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <title>Inicio de sesion</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover" style="background-color:#7f8be8;"></div>
    </section>
    <section class="login-content">
      <div class="logo" style="font:400 16px/1.8 sans-serif;
        color: white;
       ">
        <h1
        >Rent a Car Chacon</h1>
      </div>
      <div class="login-box">
        <form class="login-form" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Incio de sesion</h3>
          <div class="form-group">
            <label class="control-label">Nombre de usuario</label>
            <input id="usuarioLog" name="usuarioLog" class="form-control" type="text" placeholder="Nombre de usuario" autofocus required>
          </div>
          <div class="form-group">
            <label class="control-label">Contraseña</label>
            <input id="usuarioPass" name="usuarioPass" class="form-control" type="password" placeholder="Contraseña" required>
          </div>
          <div class="form-group">
            <div class="utility">
             
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">¿Olvido la contraseña ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button type="submit" class="btn btn-primary btn-block" style="background-color: #FF8E31;"><i class="fa fa-sign-in fa-lg fa-fw"></i>Iniciar</button>
          </div>
        </form>
        <?php 
          
          $ingreso=new MvcController();
          $ingreso->inicioSesionController();
          
          ?>
        
        <form class="forget-form" action="index.html">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>¿Olvido la contraseña?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESTAURAR</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Regresar</a></p>
          </div>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control para la vuelta de olvido de password
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>