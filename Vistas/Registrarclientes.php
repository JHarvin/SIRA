<?php
require_once"../Controladores/ControladorClientes.php";
?>


<html lang="es">
<head>

    <title>Registrar clientes</title>
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
function soloLetras(e) {
        key = e.keyCode || e.which;
        teclado = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales = "8-37-38-46-164";
        teclado_especial = false;
        for (var i in especiales) {
            if (key == especiales[i]) {
                teclado_especial = true;
                break;
            }
        }
        if (letras.indexOf(teclado) == -1 && !teclado_especial) {
            return false;
        }
    }
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
        <div>
        <h1><i class="fa fa-user-plus"></i> Registrar cliente</h1>  
           </div> 
           </div>
           <div class="row">
           <div class="col-md-12">
           <div class="tile">
           <h3 class="tile-title">Digite datos del cliente:</h3> 
           <div class="tile-body">
           <form id="formulario_registro" method="post" onsubmit="return validarRegistro();" class="row">
           <div class="form-group col-md-3">  
           <label class="control-label" for="nombre">Nombre:</label>
           <input id="nombre" name="nombre" class="form-control" type="text" autocomplete="off" autofocus placeholder="Nombre..." maxlength="50" style="text" onkeypress="return soloLetras(event)" onpaste="return false"  pattern=".{7,}" title="7 o mas caracteres para nombre real" value="" required>
           </div>
           <div class="form-group col-md-2">
           <label class="control-label">Género:</label>
           <div class="form-check">
           <label class="form-check-label" >
           <input class="form-check-input" type="radio" id="masculino" name="sexo" value="Masculino">  Masculino </label>
          
           <label class="form-check-label" style="Margin-left: 20px;">
           <input class="form-check-input"    type="radio" id="femenino" name="sexo" value="Femenino">Femenino</label>
           
           </div>
           </div>  
           <div class="form-group col-md-3">
           <label class="label label">Teléfono:</label>
           <input type="text" name="telefono" id="telefono" class="form-control mask-telefono" autocomplete="off" autofocus placeholder="Telefono..." pattern=".{9,}" title="8 o mas caracteres para telefono real" value="" required>
           </div>
           <!--Dui y licencia de conducir-->
           <div class="form-group col-md-3"> 
           <label class="label label-success">DUI:</label>
           <input type="text" name="dui" id="dui" class="form-control mask-dui" autocomplete="off" autofocus placeholder="Dui..." required>
           </div>
           <div class="form-group col-md-3">
           <label class="label label-success">N° Licenia de conducir</label>
           <input type="text" name="licencia" id="licencia" class="form-control mask-licencia" autocomplete="off" autofocus placeholder="licencia..." required>
           </div>
           <div class="form-group col-md-5">
           <label for="direccion" class="control-label">Dirección</label>
           <input type="text" class="form-control" placeholder="Direccion..." id="direccion" name="direccion" autocomplete="off" maxlength="100" style="text;" pattern=".{15,}" title="15 o mas caracteres para dirección real" value=""  required >
           </div>
  
              
                
                
                
              
               <div>
               
               
				
				</div>
				</div>
                <div class="tile-footer">
              <button type="submit" id="btnGuardarCliente" class="btn btn-primary"  ><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</button>
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
    <script src="../js/dataTables.bootstrap4.min.js"></script>
      <script type="text/javascript">
      
 jQuery(function($){
            // Definimos las mascaras para cada input
            
            $("#telefono").mask("9999-9999");
            $('#dui').mask('99999999-9');
            $('#licencia').mask('9999-999999-999-9');
          
            

            
        });
          
        
    </script>
    </script>
    
   
    
    
    <script type="text/javascript">
  $('.mask-telefono').mask('999-9999');
   $('.mask-dui').mask('99999999-9');
   $('.mask-licencia').mask('9999-999999-999-9');
    </script>
    
    
   
    <script>
    alertify.set('notifier','position', 'top-right');
    </script>
    
    </body>
    
</html>
