
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
      <main class="app-content">
       
       
       <div class="row">
           
  
    

     
<div class="col-md-12">
      
      <div class="tile">
       <h3 class="tile-title">Editar Datos Usuario</h3>
                 <form method="post" onsubmit="return validarActualizarDatos();">
                  <div class="row mb-4">
                    <div class="col-md-4">
                      <label for="Nombre">Nombre Completo</label>
                      <input id="Nombre" name="Nombre" class="form-control" type="text" value="<?php echo $datosVista["nombre"]; ?>"
                    
                        maxlength="100" pattern=".{7,}" title="7 o mas caracteres para nombre real" required >
                    </div>
                    <div class="col-md-4">
                      <label for="Telefono">Teléfono</label>
                      <input id="Telefono" name="Telefono" class="form-control" type="text" value="<?php echo $datosVista["telefono"]; ?>" required>
                    </div>
                     <div class="col-md-4">
                      <label>Email</label>
                      <input id="Email" name="Email" class="form-control" type="email" required value="<?php echo $datosVista["email"]; ?>" autocomplete="off">
                    </div>
                  </div>
                  <div class="row">
                   
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                      <label>Dirección</label>
                      <input id="Direccion" name="Direccion" class="form-control" type="text" value="<?php echo $datosVista["direccion"]; ?>" required>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-4">
                      <label>Nombre de Usuario</label>
                      <input id="Username" name="Username" class="form-control" type="text" value="<?php echo $datosVista["username"]; ?>" required>
                    </div>
                    
                    
                    <div class="col-md-4">
                      <label>Contraseña</label>
                      <input id="Pass" name="Pass" class="form-control" type="password" value="<?php echo $datosVista["password"]; ?>" placeholder="Escriba la nueva contraseña" required>
                    </div>
                  </div>
                 <input id="id" name="id" type="hidden" value="<?php echo $datosVista["idpersonal"]; ?>" >
                   <div class="form-group">

              <label for="status">Estado</label>
                <select class="form-control" name="status">
                  <?php 
                  if ($datosVista["status"]== 1) {
                    # code...
                   
                    echo '<option value="1">activo</option>';
                    echo '<option  value="0"> Inactivo</option>';

                  }
                  else{
                 

                   echo '<option  value="0"> Inactivo</option>';
                    echo '<option value="1">activo</option>';
}
                   ?>
                  
                </select>
            </div> <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn close" data-dismiss="modal"></button>
        <h4 class="modal-title">Modificar Username</h4>
      </div>
      <div class="modal-body">
        <p>Username anterior. </p>
        
         <div class="form-group">
                  <label class="control-label">Usuario</label>
                  <input class="form-control" type="text" placeholder="Nombre de usuario nuevo">
                </div>
      </div>
      <div class="modal-footer">

       <button class="btn btn-primary" type="button" onclick="return alerta();"><i class="fa fa-arrow-alt-circle-down"></i>Actualizar</button>

       <button class="btn btn-primary" type="button" onclick="return alerta();"><i class="far fa-arrow-alt-circle-down"></i>Actualizar</button>

        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar y retroceder</button>
      </div>
    </div>

  </div>
</div>
     
      
      <!-- modal para modificar los datos de los usuarios  solo los hice de prueba por si los necesitaba-->
       
       <div class="modal" id="modalValidar">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Inahabilitar</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div class="row">
                 <div> 
                 <img src="../images/pregunta.png" alt="">
                 </div>
                 
              <label for="nombreU" style="font-size:16px;">¿Desea Inahabilitar a :  </label>
                <b><p id="nombreU" style="font-size:16px;"></p></b>
          
    
                 <input id="idDelete" name="idDelete" type="hidden" >
                </div>
       
         
            
              
          </div>
          
          
          
     
      <!-- Modal footer -->
      <div class="modal-footer">

      <button id="btnEliminar" name="btnEliminar" class="btn btn-info"><i class="fa fa-arrow-alt-circle-down"></i> Inahabilitar</button>

     

        |
        <button type="button" class="btn btn-danger" data-dismiss="modal">
        <i class="fa fa-undo"></i> Cancelar</button>
      </div>

    </div>
  </div>
</div>
       
        <!-- fin modal datos de los usuarios -->
          
      
      <!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    
    <script src="../js/jquery.quicksearch2.2.1.js" ></script>
    <script src="../js/jquery.maskedinput.min.js"></script>
    <script src="../js/datatables.min.js"></script>
     
                 
                  <!-- Modal footer -->
      <div class="tile-footer">
        <button type="submit" onClick="llamarPagina()" id="btnGuardarNuevo" name="btnGuardarNuevo" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i> Actualizar</button>
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