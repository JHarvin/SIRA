
<?php 


require_once"../Controladores/ControladorActualizarProveedor.php";

$editarProveedor=new ActualizarProveedorController();
$datosVista=$editarProveedor->editarProveedorController();

?>

<html lang="es">
<head>

    <title>Editar Proveedor</title>
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
        <div class="app-title">
        <div >
          <h1><i class="app-menu__icon fa fa-file-text-o" style="font-size:25px;color:orange"></i>  Editar Proveedor</h1>
          <p>Rent a Car Chacón </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          
          
        </ul>
 </div>
       
     
       <div class="row">
        <div class="col-md-12">
          <div class="tile">

          <div class="tile-body">
                 <form method="post" onsubmit="return validarActualizarDatos();">
                 
         

                    <div class="form-group col-md-6">
                  <label class="control-label" for="Nombre">Nombre</label>
                  <input id="Nombre" name="Nombre" class="form-control" type="text" placeholder="Escriba su nombre completo" maxlength="100"  pattern=".{4,}" title="4 o mas caracteres para nombre real" value="<?php echo $datosVista["nombre"]; ?>" onkeypress="return soloLetras(event)"  required autocomplete="off">
                </div>


                    <div class="form-group col-md-6">
                      <label class="control-label" for="Telefono">Teléfono</label>
                      <input id="Telefono" name="Telefono" class="form-control" type="text" value="<?php echo $datosVista["telefono"]; ?>" autocomplete="off" required>
                    </div>
                   
                     <div class="form-group col-md-6">
                      <label class="control-label" >Email</label>
                      <input id="Email" name="Email" class="form-control" placeholder="E-mail" type="email" required value="<?php echo $datosVista["email"]; ?>" autocomplete="off">
                    </div>

                    <div class="form-group col-md-6">
                      <label>Dirección</label>
                      <input id="Direccion" name="Direccion" value="<?php echo $datosVista["direccion"]; ?>"class="form-control" type="text"  autocomplete="off" required>
                    </div>

                   
                 <input id="id" name="id" type="hidden" value="<?php echo $datosVista["idproveedor"]; ?>" >
                 
                  <!-- Modal footer -->
      <div class="tile-footer">
        <button type="submit" id="btnGuardarNuevo" name="btnGuardarNuevo" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i> Actualizar</button>
        |
        <a href="mostrarProveedores.php"  class="btn btn-info" data-dismiss="modal">
        <i class="fa fa-undo"></i> Atras</a>
      </div>
      <?php
                     $editarProveedor->actualizarProveedorController();
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