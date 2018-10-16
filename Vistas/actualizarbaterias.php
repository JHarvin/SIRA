
<?php 

#--------------------Made by Harvin Ramos---------------
require_once"../Controladores/ControladorActualizarBaterias.php";
require_once"../Controladores/ControladorRegistrarProveedor.php";
#-------------------------------------------------------------
#-se instancia y se llama a la funcion en el controlador que se encarga de llamar al modelo que ejecuta la consulta devolviendo un array para luego poner los datos del usuario seleccionado
#---------------------------------------------------------------
$editarBateria=new ActualizarBateriasController();
$datosVista=$editarBateria->editarBateriasController();

?>

<html lang="es">
<head>

    <title>Editar Baterias</title>
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
    include"menuVentas.php";
    ?>
      <main class="app-content">
       
       <div class="app-title">
        <div >
          <h1><i class="fa fa-inbox"   style="font-size:25px;color:orange"></i>  Editar Baterias</h1>
          <p>Rent a Car Chacón </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          
          
        </ul>
 </div>
       
       <div class="row">
           
  
    

     
<div class="col-md-12">
      
      <div class="tile">
       

                 <form method="post" onsubmit="return validarActualizarDatos();">
                  <div class="row mb-4">

                <div class="col-md-4">
                  <label for="idproveedor">Proveedor</label>
                  <select class="form-control" name="idproveedor" id="idproveedor" type="text" value="<?php echo $datosVista["idproveedor"]; ?>" >
                     
                      <?php 
                      $combo=new RegistrarProveedorController();
                      $combo->mostrarCombo();
                      
                      ?>
                      
                  </select>
                </div>


                    <div class="col-md-4">
                      <label for="codigo">Código</label>
                      <input id="codigo" name="codigo" class="form-control" type="text" value="<?php echo $datosVista["codigo"]; ?>"      
                        maxlength="5" pattern=".{5,}" title="5 caracteres para un código real" required >
                    </div>  

                    <div class="col-md-4">
                      <label for="tipo">Tipo</label>
                       <select name="tipo" id="tipo" class="form-control" value="<?php echo $datosVista["tipo"]; ?>" required>
                       <option value="MOTO">MOTO</option>
                       <option value="AUTO">AUTO</option>
                       </select>
                     </div>

                      <div class="col-md-4">
                      <label for="precio_unitario">Precio Unitario ($)</label>
                      <input id="precio_unitario" name="precio_unitario" class="form-control" type="text" value="<?php echo $datosVista["precio_unitario"]; ?>"      
                         required >
                    </div>  

                    <div class="col-md-4">
                      <label for="precio_venta">Precio Venta ($)</label>
                      <input id="precio_venta" name="precio_venta" class="form-control" type="text" value="<?php echo $datosVista["precio_venta"]; ?>"      
                         required >
                    </div>  

                    <div class="col-md-4">

    <label class="control-label">Fecha</label>
    <?php   $fecha_venta=date('Y-m-d')?>
  
      <input id="fecha_venta"  min="<?php echo $fecha_venta; ?>" 
      name="fecha_venta" type="date" value="<?php echo $fecha_venta; ?>"
      class="form-control"  max="<?php echo $fecha_venta; ?>" >
   
    </div>


              
                 <input id="id" name="id" type="hidden" value="<?php echo $datosVista["idproducto"]; ?>" >
                  
                  <!-- Modal footer -->
      <div class="tile-footer">
        <button type="submit" id="btnGuardarNuevo" name="btnGuardarNuevo" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i> Actualizar</button>
        |
        <a href="bateriaInicio.php"  class="btn btn-info" data-dismiss="modal">
        <i class="fa fa-undo"></i> Atras</a>
      </div>
          <?php
                     $editarBateria->actualizarBateriasController();
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
    <script src="../js/plugins/jquery.mask.min.js"></script>
    
      <script type="text/javascript">
      
 jQuery(function($){
            // Definimos las mascaras para cada input
            $('#precio_venta').mask('000.000.000.000.000,00', {reverse: true});
            $("#precio_unitario").mask('000.000.000.000.000,00', {reverse: true});
            
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