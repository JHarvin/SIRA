
<?php 
require_once"../Controladores/ControladorRegistroUsuarios.php";
?>

!DOCTYPE html>
<html lang="es">
<head>

    <title>Registrar usuarios</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- libreria para notificaciones toast-->
    <link rel="stylesheet" href="../css/toastr.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
<!--Archivo de validacion-->
    <script src="js/validarRegistro.js"></script>
</head>      
<body class="app sidebar-mini rtl">
     <?php 
    include"menu.php";
    ?>
      <main class="app-content">
       
       
       <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Registrar Usuario</h3>
            <div class="tile-body">
              <form method="post" onsubmit="return validarRegistro();" class="row">
                <div class="form-group col-md-4">
                  <label class="control-label" for="nombre">Nombre</label>
                  <input id="nombre" name="nombre" class="form-control" type="text" placeholder="Escriba su nombre completo" maxlength="100" style="text-transform:uppercase;" pattern=".{7,}" title="7 o mas caracteres para nombre real">
                </div>
                <div class=" col-md-4">
                  <label class="control-label">Telefono</label>
                  <input id="telefono" name="telefono" class="form-control" type="tel" placeholder="Ingrese numero de telefono" maxlength="9">
                </div>
                <div class="form-group col-md-4">
                  <label for="email" class="control-label">E-mail</label>
                  <input type="email" class="form-control" placeholder="email" id="email" name="email" required>
                </div>
                
                <div class="form-group col-md-4">
                  <label class="control-label">Digite un nombre de usuario</label>
                  <input type="text" class="form-control" placeholder="nombre de usuario" id="username" name="username">
                </div>
                
                <div class="form-group col-md-4">
                  <label class="control-label" for="password">Digite contraseña</label>
                  <input type="password" pattern=".{4,}" title="4 o mas caracteres" class="form-control" placeholder="Contraseña" id="password" name="password">
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Vuelva a escribir la contraseña</label>
                  <input type="password" class="form-control" placeholder="Otra vez" id="rPassword">
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label">Dirección</label>
                  <textarea id="direccion" name="direccion" class="form-control" rows="2" placeholder="Ingrese su dirección"></textarea>
                </div>
                <div class="form-group col-md-12">
                  <label class="control-label">Genero</label>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input id="masculino" class="form-check-input" type="radio" name="gender">Masculino
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input id="femenino" class="form-check-input" type="radio" name="gender">Femenino
                    </label>
                  </div>
                </div>
               
                <div class="tile-footer">
              <button id="btnRegistrar" name="btnRegistrar" class="btn btn-primary" type="submit" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-secondary"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</button>
            </div>
               
              </form>
              
              <?php 
                #--para guardar registros se llama a la clase y funcion
                $registro= new RegistrarUsuarioController();
                $registro->registrarController();
                
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
    <script src="../js/toastr.js"></script>
    
    
    <script>
     function alerta(){
        toastr.success("Usuario Guardado");

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  
  "hideMethod": "fadeOut"
}
          

          
      }
        
        
    </script>
    </body>
</html>