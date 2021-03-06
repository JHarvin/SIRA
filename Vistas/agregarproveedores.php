
<?php 
require_once"../Controladores/ControladorRegistrarProveedor.php";
session_start();
if(!$_SESSION["validar"]){
    

    header("location:../index.php");
    exit();
}
?>


<html lang="es">
<head>

    <title>Agregar Proveedores</title>
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
<body onload='document.form1.text1.focus()' class="app sidebar-mini rtl">
     <?php 
    include"menuVentas.php";
    ?>
      <main class="app-content">

       <div class="app-title">
        <div >
          <h1><i class="app-menu__icon fa fa-file-text-o"  style="font-size:25px;color:orange"></i>  Agregar Proveedores</h1>
          <p>Rent a Car Chacón </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          
          
        </ul>
                       <div id="imagen">
       
         <img class="rounded-circle user-image" width="40" height="40" src="../images/ayuda.png"  href="#" onclick="window.open('../Files/agregarproveedores.pdf', '_blank', 'fullscreen=yes'); return false;">
</div>
 </div>
       
       <div class="row">
        <div class="col-md-12">
          <div class="tile">
          
            <div class="tile-body">
              <form id="formulario_registro" name="form1" method="post" onsubmit="return validarRegistro();" class="row">
                

                 <div class="form-group col-md-6">
                  <label class="control-label" for="nombre">Nombre</label>
                  <input id="nombre" name="nombre" class="form-control" type="text" placeholder="Escriba su nombre completo" 
                  maxlength="100"  pattern=".{4,}" title="4 o mas caracteres para nombre real" onkeypress="return soloLetras(event)" value="" required autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                  <label class="control-label">Teléfono</label>
                  <input id="telefono" name="telefono" class="form-control" type="tel" placeholder="Ingrese número de teléfono" maxlength="9" value="" onkeypress="return validaNumericos(event);"  required autocomplete="off">
                </div>
                <div class="form-group col-md-6">
                  <label for="email" class="control-label">E-mail</label>
                  <input type="email" class="form-control" placeholder="E-mail" id="email" name="email" value="" required autocomplete="off">
                </div>

        
                
                <div class="form-group col-md-6">
                  <label class="control-label">Dirección</label>
                  <textarea id="direccion" name="direccion" class="form-control" rows="" placeholder="Ingrese su dirección" value="" required></textarea>
                </div>
               
                <div class="tile-footer">
              <button id="btnRegistrar" name="btnRegistrar" class="btn btn-primary" 
              type="submit"  ><i class="fa fa-fw fa-lg fa-check-circle"></i> Registrar </button>&nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-secondary"><i class="fa fa-fw fa-lg fa-times-circle"></i> Cancelar </button>
            </div>

              
              
              </form>
               <?php 
                #--para guardar registros se llama a la clase y funcion
                $registro= new RegistrarProveedorController();
                $registro->registrarProveedor();
                
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

  <script>
   
          function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
} 
      
    </script>
    <script >

  function ValidateEmail(email) 
{ 
var mailformat = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
if(email.value.match(mailformat)) 
{ 
alert("Gracias, Direccion de Email valida"); 
document.form1.email.focus();

return true; 
} 
else 
{ 
alert("You have entered an invalid email address!"); 
document.form1.email.focus(); 
return false; 
} 
}

    </script>
      
    
   <script src="email-validation.js">


   </script>
    
    <script>
    alertify.set('notifier','position', 'top-right');
    </script>
    </body>
</html>