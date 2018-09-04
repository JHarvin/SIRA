<?php
require_once"../Controladores/ControladorClientes.php";
?>


<html lang="es">
<head>

    <title>Clientes</title>
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
    <script src="js/validarRegistro.js"></script>
</head>      
<body class="app sidebar-mini rtl">
     <?php 
    include"menuVentas.php";
    ?>
      <main class="app-content">
       
       
       <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Registrar Clientes</h3>
            <div class="tile-body">
              <form id="formulario_registro" method="post" onsubmit="return validarRegistro();" class="row">
			  <div class="form-row">
                <div class="form-group col-md-6">
                  <label class="control-label" for="nombre">Nombre de cliente</label>
                  <input id="nombre" name="nombre" class="form-control" type="text" placeholder="Nombre..." maxlength="100" style="text-transform:uppercase;" pattern=".{7,}" title="7 o mas caracteres para nombre real" value="" required>
                </div>
                <div class=" col-md-6">
                  <label class="control-label">Telefono</label>
                  <input id="telefono" name="telefono" class="form-control" type="telefono" placeholder="Ingrese numero de telefono" maxlength="9" value="" onkeypress="return validaNumericos(event);"  required>
                </div>
              <!--Dui y licencia de conducir-->
     <div class="form-group col-md-6">
      <label for="dui">Dui</label>
      <input type="text" class="form-control" id="dui" name="dui" placeholder="Dui">
    </div>
    <div class="form-group col-md-6">
      <label for="licencia">N° Licencia de conducir</label>
      <input type="text" class="form-control" id="licencia" name="licencia" placeholder="N° de licencia">
    </div>
                
	<div class="form-group col-md-6">
                  <label for="direccion" class="control-label">Direccion</label>
                  <input type="direccion" class="form-control" 
                  placeholder="Direccion" id="direccion" name="direccion"  required >
                </div>
  
              
                
                
                
              
               <div>
				<div class="form-group">
                  <label class="control-label">Genero</label>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" id="masculino" name="masculino">Masculino
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" id="femenino"
                     name="femenino">Femenino
                    </label>
                  </div>
                </div>
				</div>
				</div>
                <div class="tile-footer">
              <button type="submit" id="btnGuardarCliente" class="btn btn-primary"  ><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</button>
            </div>
             
             <?php
                  #AQUI SE INSTANCIA Y SE LLAMA A LA FUNCION EN EL CONTROLADOR
                  #PARA GUARDAR CLIENTE
                  $datos=new ClientesController();
                  $datos->registrarCliente();
                  
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
          
        
    </script>
    
    
    
    
   
    
    
    </body>
</html>