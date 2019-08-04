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
      <div class="cover" style="background-color:#0F6099;"></div>
    </section>

    <section class="login-content" >

      <div class="logo" style="font:60019px;
        color: white;
       ">
        <h1  >RentalSys </h1>


      </div>
      <div class="login-box">
        <form class="login-form" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user" style="font-size:40px;color:#0F6099;
"></i>Incio de sesión</h3>
          <div class="form-group">
            <label class="control-label">Nombre de usuario</label>
            <input id="usuarioLog" name="usuarioLog" class="form-control" type="text" placeholder="Nombre de usuario" autofocus required autocomplete="off">
          </div>
          <div class="form-group">
            <label class="control-label">Contraseña</label>
            <input id="usuarioPass" name="usuarioPass" class="form-control" type="password" placeholder="Contraseña" required >
          </div>
          <div class="form-group">
            <div class="utility">
             
              <p class="semibold-text mb-2"><a href="recuparar/EnviarPassword.php">¿Olvidó la contraseña ?</a></p>
            </div>

          </div>

          <div class="container">    
           <button type="submit" class="btn btn-primary " style="background-color: #0F6099;
;">       
           <i class="fa fa-sign-in fa-lg fa-fw"></i><span>Iniciar</span>       
 <div class="dot"></div>    </div>  

          
        </form>
        <?php 
          
          $ingreso=new MvcController();
          $ingreso->inicioSesionController();
          
          ?>
        
       
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

<style >
:root {    --bg: #3C465C;
    --primary: #78FFCD;  
      --solid: #fff;   
       --btn-w: 12em;   
        --dot-w: calc(var(--btn-w)*.3);    
        --tr-X: calc(var(--btn-w) - var(--dot-w));}*
         {box-sizing: border-box;}*:before, *:after {box-sizing: border-box;}


         body {    height: 100vh;    display: flex;    justify-content: center;    align-items: center;    flex-flow: wrap;    background: var(--bg);    font-size: 15px;    font-family: 'Titillium Web', sans-serif;}h1 {    color: var(--solid);    font-size: 2rem;    margin-top: 2rem;   }
         .btn {    position: center;    margin: 0 auto;    width: var(--btn-w);    color: var(--primary);    border: .15em solid var(--primary);    text-align: center;    font-size: 1.3em;    line-height: 1em;    cursor: pointer;    }
         .dot {    content: '';    position: absolute;    top: 0;    width: var(--dot-w);    height: 100%;    border-radius: 100%;    transition: all 500ms ease;    display: none;}.dot:after {    content: '';    position: absolute;    left: calc(90% - .4em);    top: -.4em;    height: .8em;    width: .8em;    background: var(--primary);    border-radius: 1em;    border: .25em solid var(--solid);    box-shadow: 0 0 .7em var(--solid),                0 0 2em var(--primary);}.btn:hover .dot,.btn:focus .dot {    animation: atom 2s infinite linear;    display: block;}@keyframes atom {    0% {transform: translateX(0) rotate(0);}    30%{transform: translateX(var(--tr-X)) rotate(0);}    50% {transform: translateX(var(--tr-X)) rotate(180deg);}    80% {transform: translateX(0) rotate(180deg);}    100% {transform: translateX(0) rotate(360deg);}}

                          </style>