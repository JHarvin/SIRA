
<?php 

require_once "../Controladores/ControladorActualizarBaterias.php";
require_once "../Controladores/ControladorRegistrarBaterias.php";
require_once "../Modelos/ModeloActualizarBaterias.php";

session_start();
if(!$_SESSION["validar"]){
    

    header("location:../index.php");
    exit();
}


$EditarBaterias=new editarBateriasController();
$verdatos=$EditarBaterias->EditarBateriasController();


?>

<html lang="es">
<head>

    <title>Editar Bateria</title>
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
       <h3 class="tile-title">Editar Datos Bateria</h3>
                 <form method="post" onsubmit="return validarActualizarDatos();">
                  <div class="row mb-4">
                            
                     <div class="form-group col-md-4">
      <label class="control-label">Proveedor</label>
                  <select class="form-control" name="idproveedor" id="idproveedor">
                     
                     
                  </select>
       </div>

                           
    <div class="form-group col-md-4">
     <label class="control-label">Código</label>
      <input id="codigo" name="codigo" type="codigo" class="form-control" placeholder="Código"
      type="text" value="<?php echo $verdatos["codigo"]; ?>" autocomplete="off" maxlength="5" value=""  required>
    </div>

   
     <div class="form-group col-md-4">
      <label for="tipo">Tipo de bateria</label>
      <select name="tipo" id="tipo" value="<?php echo $verdatos["tipo"]; ?>"class="form-control" required>
          <option value="Moto">Moto</option>
          <option value="Auto">Auto</option>
      </select>
    </div>

   <div class="form-group col-md-4">
     <label class="control-label">Precio Unitario ($) </label>
      <input id="precio_unitario" name="precio_unitario" type="precio_unitario" 
      type="text" onkeypress="return validaNumericos(event)"class="form-control" autocomplete="off" value="<?php echo $verdatos["precio_unitario"]; ?>" required>
    </div>
     <br>
   <div class="form-group col-md-4">
     <label class="control-label">Precio Venta ($) </label>
      <input id="precio_venta" name="precio_venta"  type="precio_venta" 
      type="text" onkeypress="return validaNumericos(event)" class="form-control" autocomplete="off"  value="<?php echo $verdatos["precio_venta"]; ?>"required>
    </div>

   
    <div class="form-group col-md-4">
    <label class="control-label">Fecha</label>
      <input id="fecha_venta" name="fecha_venta" type="date" class="form-control">
     <?php   $fecha_venta=date('Y-m-d')?>
    </div> 
     </div>
                 
                  <!-- Modal footer -->
      <div class="tile-footer">
        <button type="submit" id="btnGuardarNuevo" name="btnGuardarNuevo" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i> Actualizar</button>
        |
        <a href="bateriaInicio.php"  class="btn btn-info" data-dismiss="modal">
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