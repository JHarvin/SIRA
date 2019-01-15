<?php
require_once"../Controladores/ControladorHistorial.php";
session_start();
$datos="";
$respuesta;
if(!$_SESSION["validar"]){
    

    header("location:../index.php");
    exit();
}
 
?>


<html lang="es">
<head>

    <title>Historial</title>
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
          <h1><i class="fa fa-wrench"   style="font-size:25px;color:orange"></i> Detalles</h1>
          <p>Rent a Car Chacón </p>
        </div>
        <div id="imagen">
       
         <img class="rounded-circle user-image" width="40" height="40" src="../images/ayuda.png"  href="#" onclick="window.open('../Files/detalles.pdf', '_blank', 'fullscreen=yes'); return false;">
</div>
 </div>
      <div class="row">
        <div class="col-md-3"><a class="mb-2 btn btn-primary btn-block" href="">Historial</a>
          <div class="tile p-0">
            <h4 class="tile-title folder-head">Fechas</h4>
            <div class="tile-body">
              <ul class="nav nav-pills flex-column mail-nav">
                <div class="table table-responsive">
                    <table id="tblhistorial">
                        <thead>
                           <th hidden></th>
                            <th>Entrada</th>
                            <th>Salida</th>
                            <th>Ver</th>
                        </thead>
                        <tbody>
                         <?php
                 if(isset($_GET["placa"]) && !empty($_GET["placa"])){
        $datos=new HistorialController();
     $respuesta=   $datos->verHistorial($_GET["placa"]);
    }
                                 ?>
                               
                                 
                        </tbody>
                    </table>
                </div>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tile">
            
           <!--se cargan los datos-->
           <form>
  <div id="rowM" class="form-row">


     <div class="form-group col-md-6">
    <label for="autoname">Auto</label>
    <input type="text" class="form-control" id="autoDetalle" disabled>
  </div>
  <div class="form-group col-md-6">
    <label for="placarente">Placas del auto</label>
    <input type="text" class="form-control" id="placaDetalle" disabled>
  </div>

               <div class="form-group col-md-6">
                  <label for="fechaInicio">Fecha de entrada:</label>
                   <input type="text" class="form-control" id="fechaInicio" name="fechaInicio"  autocomplete="off" data-format="dd/MM/yyyy" required>
                </div>
                 <div class="form-group col-md-6">
                  <label for="fechaInicio">Fecha de salida:</label>
                   <input type="text" class="form-control" id="fechaSalida" name="fechaSalida"  autocomplete="off" data-format="dd/MM/yyyy" required>
                </div>
               
                <div class="form-group col-md-6">
                  <label for="fechaInicio">Tipo de servicio</label>
                  <input type="text" class="form-control" id="tiposervicio" name="tiposervicio">
                </div>
                
                
                 <div class="form-group col-md-6">
                  <label for="fechaInicio">Encargado de servicio</label>
                  <input type="text" class="form-control" id="encargado" name="encargado">
                </div>
                
                 <div class="form-group col-md-12">
                  <label for="fechaInicio">Servicio</label>
                  <textarea name="servicio" id="servicio" cols="30" rows="7" class="form-control"></textarea>
                </div>
                
                
                
                



  </div>


   


</form>
           
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
     <script src="../Vistas/js/historial.js"></script>
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
