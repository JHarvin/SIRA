
<?php 
require_once"../Controladores/ControladorRegistroUsuarios.php";
?>


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
    <script src="../js/toastr.js"></script>
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    
    <!-- include the RTL css files-->

<link rel="stylesheet" href="../css/alertify.rtl.css">
<link rel="stylesheet" href="../css/themes/default.rtl.css">

<!-- include alertify script -->
<script src="../js/alertify.js"></script>

<!-- then override glossary values -->
<script type="text/javascript">
alertify.defaults.glossary.title = 'أليرتفاي جي اس';
alertify.defaults.glossary.ok = 'موافق';
alertify.defaults.glossary.cancel = 'إلغاء';
    
    
   

    

</script>

    
    <!-- include alertify.css -->
<link rel="stylesheet" href="../css/alertify.css">

<!-- include semantic ui theme  -->
<link rel="stylesheet" href="../css/themes/semantic.css">

<!-- include alertify script -->
<script src="../js/alertify.js"></script>

<script type="text/javascript">        
//override defaults
alertify.defaults.transition = "zoom";
alertify.defaults.theme.ok = "ui positive button";
alertify.defaults.theme.cancel = "ui black button";
    
    
</script>
    
    
    

<!-- include boostrap theme  -->
<link rel="stylesheet" href="../css/themes/bootstrap.css">

<!-- include alertify script -->


<script type="text/javascript">
//override defaults
alertify.defaults.transition = "slide";
alertify.defaults.theme.ok = "btn btn-primary";
alertify.defaults.theme.cancel = "btn btn-danger";
alertify.defaults.theme.input = "form-control";
</script>
    
<!--Archivo de validacion-->
    <script>
    function validarRegistro(){
  var password = document.querySelector("#password").value;
    var password2 = document.querySelector("#rPassword").value;
         if(password!=" "){
        var caracteresPassword=password.length;
        var expresion=/^[a-zA-Z0-9]*$/;
        if(caracteresPassword<4){
            document.querySelector("label[for='password']").innerHTML += "<br> La contraseña debe contener minimo 4 caracters y maximo 16";
            
            
            return false;
        }
        
        if(password2!=password){
           
           document.querySelector("label[for='rPassword']").innerHTML += "<br> La contraseña no coincide";
            return false;
            
            
        }
             
        
        
    }
        
        return true;
    }
    </script>
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
              <form id="formulario_registro" method="post" onsubmit="return validarRegistro();" class="row">
                <div class="form-group col-md-4">
                  <label class="control-label" for="nombre">Nombre</label>
                  <input id="nombre" name="nombre" class="form-control" type="text" placeholder="Escriba su nombre completo" maxlength="100"  pattern=".{7,}" title="7 o mas caracteres para nombre real" onkeypress="return soloLetras(event)" value="" required autocomplete="off">
                </div>
                <div class="form-group col-md-4">
                  <label class="control-label">Telefono</label>
                  <input id="telefono" name="telefono" class="form-control" type="tel" placeholder="Ingrese numero de telefono" maxlength="9" value="" onkeypress="return validaNumericos(event);"  required autocomplete="off">
                </div>
                <div class="form-group col-md-4">
                  <label for="email" class="control-label">E-mail</label>
                  <input type="email" class="form-control" placeholder="email" id="email" name="email" value="" required autocomplete="off">
                </div>
                
                <div class="form-group col-md-4">
                  <label class="control-label">Digite un nombre de usuario</label>
                  <input type="text" class="form-control" placeholder="nombre de usuario" id="username" name="username" value="" required autocomplete="off">
                </div>
                
                <div class="form-group col-md-4">
                  <label class="control-label" for="password">Digite contraseña</label>
                  <input type="password" pattern=".{4,}" title="4 o mas caracteres" class="form-control" placeholder="Contraseña" id="password" name="password" value="" required>
                </div>
                <div class="form-group col-md-4">
                  <label for="rPassword" class="control-label">Vuelva a escribir la contraseña</label>
                  <input type="password" class="form-control" placeholder="Otra vez" id="rPassword" name="rPassword" value="" required>
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label">Dirección</label>
                  <textarea id="direccion" name="direccion" class="form-control" rows="" placeholder="Ingrese su dirección" value="" required></textarea>
                </div>
                <div class="form-group col-md-5 form-check-inline">
                  <label class="control-label">Genero</label>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input id="masculino" class="form-check-input" type="radio" name="masculino">Masculino
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input id="femenino" class="form-check-input" type="radio" name="femenino">Femenino
                    </label>
                  </div>
                </div>
               
                <div class="tile-footer">
              <button id="btnRegistrar" name="btnRegistrar" class="btn btn-primary" type="submit"  ><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-secondary"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</button>
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
    <script src="../js/notify.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/jquery.maskedinput.min.js"></script>
    
      <script type="text/javascript">
      
 jQuery(function($){
            // Definimos las mascaras para cada input
            
            $("#telefono").mask("9999-9999");
            
        });
           function soloLetras(e){
        key=e.keyCode || e.which;
        teclado=String.fromCharCode(key).toLowerCase();
        letras=" áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales="8-37-38-46-164";
        teclado_especial=false;
        for(var i in especiales){
            if(key==especiales[i]){
                teclado_especial=true;break;
            }
        }
        if(letras.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
        }
        
    </script>
    
    
    
    
   
    
    
    </body>

</html>
