 <!DOCTYPE html>
 <?php 
require_once"../Controladores/ControladorRegistrarBaterias.php";
require_once"../Controladores/ControladorRegistrarProveedor.php";
?>

<html lang="es">
 <head>
 <title>Registro  Baterias</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
     <!-- libreria para notificaciones toast-->
    <link rel="stylesheet" href="../css/toastr.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/buscarInput.css">

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
    <script src="js/validarRegistro.js"></script>


  </head>
  <body class="app sidebar-mini rtl">
  <?php
      include"menuVentas.php";
      ?>
 <main class="app-content">

 <div class="app-title">
        <div>
          <h1><i class="fa fa-inbox"></i> Administrador : Registro de baterias</h1>
          <p>Rent a Car Chacón </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          
          
        </ul>
 </div>


<div class="row">
       <div  class="col-md-12">
            <div class="tile">
            <h3 class="tile-title"></h3>
            <div class="tile-body">
          
         <form id="formulario_registro" method="post" onsubmit="return validarRegistro();" class="row">
 

     <div class="form-group col-md-4">
         <label class="control-label">Proveedor </label>
                  <select class="form-control" name="idproveedor" id="idproveedor">
                     
                      <?php 
                      $combo=new RegistrarProveedorController();
                      $combo->mostrarCombo();
                      
                      ?>
                      
                  </select>
                </div>

                           
    <div class="form-group col-md-4">
     <label class="control-label">Código</label>
      <input id="codigo" name="codigo" type="codigo" class="form-control" placeholder="Código"
      type="text" autocomplete="off" maxlength="5" value=""  required>
    </div>

   
     <div class="form-group col-md-4">
      <label for="tipo">Tipo</label>
      <select name="tipo" id="tipo" class="form-control" required>
          <option value="moto">Moto</option>
          <option value="auto">Auto</option>
      </select>
    </div>

    <div class="form-group col-md-4">
     <label class="control-label">Precio Unitario ($) </label>
      <input id="precio_unitario" name="precio_unitario" type="precio_unitario" 
      type="text" autocomplete="off" class="form-control" placeholder="Precio de compra"  value="" required>
    </div>
    
    <div class="form-group col-md-4">
     <label class="control-label">Precio Venta ($) </label>
      <input id="precio_venta" name="precio_venta" type="text" type="precio_venta" 
      class="form-control" autocomplete="off" placeholder="Precio venta" value="" required>
    </div>


   
    <div class="form-group col-md-4">
    <label class="control-label">Fecha</label>
 <?php   $fecha_venta=date('Y-m-d')?>
      <input id="fecha_venta" name="fecha_venta" value="<?php echo $fecha_venta; ?>"
      type="date" min="<?php echo $fecha_venta; ?>" class="form-control" disabled>
    
    </div> 

  
    
    <br>
    
  </div>
  <br>
 
      
 <div class="tile-footer">
              <button id="btnRegistrar" name="btnRegistrar" class="btn btn-primary" 
              type="submit"  ><i class="fa fa-fw fa-lg fa-check-circle"></i> Registrar </button>&nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-secondary"><i class="fa fa-fw fa-lg fa-times-circle"></i> Cancelar </button>
            </div>
   


    <?php 
                #--para guardar registros se llama a la clase y funcion
              $registro= new RegistrarBateriasController();
              $registro->registrarBaterias();
              
                
                ?>
</form>
               
           </div>
            </div>
           
          </div>
        </div>
        
           
           
           
           
       </div>
       
       
       
        
        
        
      </div>
      
      
      
      
</main>

<!--para modal de repaciones-->
     <script>
   
          function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
} 
      
    </script>



<!--para modal de autos disponibles lista-->
 


<!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../js/plugins/pace.min.js"></script>
    <script src="../js/jquery.quicksearch2.2.1.js" ></script>
    <!--escript para buscar en la tabla-->
    <script>
      $(function () {
  $('#search').quicksearch('table tbody tr');               
});
    </script>
</body>
</html>