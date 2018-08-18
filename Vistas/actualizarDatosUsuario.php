
<?php 
require_once"../Modelos/Conexion.php";
#-------Variables para poner los datos en los input text luego de haber seleccionado el usuario
#---------------------------------------------------------------------

//----consulta por el id para mostrarlos en los input text
class SeleccionarUsuario extends Conexion{
  public  $id;
    public function seleccionar(){
        $idpersonal=$this->id;
         $stmt =Conexion::conectar()->prepare("SELECT nombre,telefono,direccion,username,password FROM tpersonal WHERE idpersonal= :id");
        echo '<script>alert('.$idpersonal.');</script>';
        $stmt->bindParam(":id",$idpersonal,PDO::PARAM_STR);
       // $stmt->bindParam(":usuarioPass",$datosModelLogin["usuarioPass"],PDO::PARAM_STR);
        
        $stmt->execute();
            
        return $stmt->fetch();
        
       
        
    }
    
}


    
    
    
   $seleccinar=new SeleccionarUsuario();
    $seleccinar->id=$_POST["id"];
   $respuesta= $seleccinar->seleccionar();
    

//echo '<script>alert(""+$respuesta);</script>';
    $nombreS= $nombre=$respuesta["nombre"];
        $telefono=$respuesta["telefono"];
        $direccion=$respuesta["direccion"];
        $user=$respuesta["username"];
        $pass=$respuesta["password"];
    

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
                      <input id="Nombre" name="Nombre" class="form-control" type="text" value="<?php $respuesta["nombre"]; ?>"
                    
                        maxlength="100" pattern=".{7,}" title="7 o mas caracteres para nombre real" required >
                    </div>
                    <div class="col-md-4">
                      <label for="Telefono">Telefono</label>
                      <input id="Telefono" name="Telefono" class="form-control" type="text" required>
                    </div>
                     <div class="col-md-4">
                      <label>Email</label>
                      <input id="Email" name="Email" class="form-control" type="email" required>
                    </div>
                  </div>
                  <div class="row">
                   
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                      <label>Dirección</label>
                      <input id="Direccion" name="Direccion" class="form-control" type="text" required>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-4">
                      <label>Nombre de Usuario</label>
                      <input id="Username" name="Username" class="form-control" type="text" required>
                    </div>
                    
                    
                    <div class="col-md-4">
                      <label>Contraseña</label>
                      <input id="Pass" name="Pass" class="form-control" type="password" placeholder="Escriba la nueva contraseña" required>
                    </div>
                  </div>
                 <input id="id" name="id" type="hidden" >
                 
                  <!-- Modal footer -->
      <div class="tile-footer">
        <button type="submit" id="btnGuardarNuevo" name="btnGuardarNuevo" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i> Actualizar</button>
        |
        <a href="usuarios.php"  class="btn btn-info" data-dismiss="modal">
        <i class="fa fa-undo"></i> Atras</a>
      </div>
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