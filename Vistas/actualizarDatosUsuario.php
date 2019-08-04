
<?php 
session_start();
if(!$_SESSION["validar"]){
    

    header("location:../index.php");
    exit();
}

#--------------------Made by Harvin Ramos---------------
require_once"../Controladores/ControladorActualizarDatos.php";
#-------------------------------------------------------------
#-se instancia y se llama a la funcion en el controlador que se encarga de llamar al modelo que ejecuta la consulta devolviendo un array para luego poner los datos del usuario seleccionado
#---------------------------------------------------------------
$editarUsuario=new ActualizarDatosController();
$datosVista=$editarUsuario->editarUsuarioController();

    

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
    
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    
    <!-- include the RTL css files-->

<link rel="stylesheet" href="../css/alertify.rtl.css">
<link rel="stylesheet" href="../css/themes/default.rtl.css">

<script src="../Vistas/js/validarRegistro.js"></script>
     <script src="../Vistas/js/alertaGuardar.js"></script>
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
    <script src="js/validarRegistro.js"></script>
</head>      
<body class="app sidebar-mini rtl">
     <?php 
    include"menu.php";
    ?>
      <main class="app-content" style="background-color:#788499
;">
        <div class="app-title">
        <div>
          <h1><i class="app-menu__icon fa fa-users"  style="font-size:25px;color:#788499
;"></i>  Modificar registo de usuario</h1>
          <p>RentalSys </p>
        </div>
        
 </div>
       
       
       
      
      <div class="tile">
      
      
                 <form method="post" onsubmit="return validarActualizarDatos();">
                  <div class="row mb-4">
                    <div class="col-md-4">
                      <label for="Nombre">Nombre Completo</label>
                      <input id="Nombre" name="Nombre" class="form-control" type="text" value="<?php echo $datosVista["nombre"]; ?>"
                    
                        maxlength="100" pattern=".{7,}" title="7 o mas caracteres para nombre real" required autocomplete="off">
                    </div>
                    <div class="col-md-4">
                      <label for="Telefono">Teléfono</label>
                      <input id="Telefono" name="Telefono" class="form-control" type="text" value="<?php echo $datosVista["telefono"]; ?>" required autocomplete="off">
                    </div>
                     <div class="col-md-4">
                      <label>Email</label>
                      <input id="email" name="email" class="form-control" type="email" required value="<?php echo $datosVista["email"]; ?>" autocomplete="off">
                    </div>
                      
                  </div>
                  
                 
                  <div class="row">
                   
                   <div class="col-md-4">
                      <label>Nombre de Usuario</label>
                      <input id="Username" name="Username" class="form-control" type="text" value="<?php echo $datosVista["username"]; ?>" required autocomplete="off">
                    </div>
                    <div class="col-md-8">
                      <label>Dirección</label>
                      <input id="Direccion" name="Direccion" class="form-control" type="text" value="<?php echo $datosVista["direccion"]; ?>" required autocomplete="off">
                    </div>
                   
                    
                    
                   
                  </div>
                 <input id="id" name="id" type="hidden" value="<?php echo $datosVista["idpersonal"]; ?>" >
                 
                 
                  <!-- Modal footer -->
      <div class="tile-footer">
        <button type="submit" id="btnGuardarNuevo" name="btnGuardarNuevo" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle" ></i> Actualizar</button>
        |
        <a href="usuarios.php"  class="btn btn-info" data-dismiss="modal">
        <i class="fa fa-undo"></i> Atras</a>
      </div>
          <?php
                     $editarUsuario->actualizarUsuarioController();
                     ?>
           </form>     
       </div>
         
            
              
          
           </div> 
          
          
     
     

    
  

        
        
        
      </div>
      </main>
      
      
      <!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/toastr.js"></script>
    <script src="../js/notify.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/jquery.maskedinput.min.js"></script>
    
      <script type="text/javascript">
      
 jQuery(function($){
            // Definimos las mascaras para cada input
            
            $("#Telefono").mask("9999-9999");
            
        });
          
        
    </script>
    
    
    <script>
   
         //funcionpara valida solo numero en el campo de telefono
          function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
} 
        
    </script>
    
   
    
    
    </body>
</html>