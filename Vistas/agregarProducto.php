
 <?php 
require_once"../Controladores/ControladorRegistrarBaterias.php";
require_once"../Controladores/ControladorRegistrarProveedor.php";

if(isset($_GET["ok"]) && !empty($_GET["ok"])){
    
    echo'
    <script>
    alertify.success("Registro Actualizado ");
    </script>
    ';
    
}
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
    <script src="../js/toastr.js"></script>
    <!-- efectos del input buscar-->
    <link rel="stylesheet" href="../css/buscarInput.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/alertify.min.css">
    <link rel="stylesheet" href="../css/datatables.min.css">
    <script src="../js/alertify.min.js"></script>
<script src="../Vistas/js/validarRegistro.js"></script>

<script type="text/javascript">
alertify.defaults.transition = "slide";
alertify.defaults.theme.ok = "btn btn-primary";
alertify.defaults.theme.cancel = "btn btn-danger";
alertify.defaults.theme.input = "form-control";
</script>

<script>
  //----------funcion ajax
    function eliminar(idE){
        var datos=new FormData();
    datos.append("idb",idE);
        
        
         $.ajax({
        
        type: "POST",
        url: "../Controladores/ControladorAjaxEliminar.php",
        data: datos,
        cache:false,
        contentType:false,
        processData:false,
        
        success:function(r){
         

        if(r==1){
        
           // $(".table").load("../Vistas/usuarios.php");
            toastr.success("Eliminado");
    }
          else if(r!=1){
           
              alert("diferente "+r);
              
          }
            else{
              //  $("#table").load();
                
                alert("Error -> "+r  );}
        
    }
        
        
    });
        
    }
     
    
    </script>
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
            <!-- Search form -->
            <div class="tile-body">
          
<form id="formulario_registro" method="post" onsubmit="return validarRegistro();" class="row">
 

     <div class="form-group col-md-4">
      <label class="control-label">Proveedor</label>
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
      <label for="tipo">Tipo de bateria</label>
      <select name="tipo" id="tipo" class="form-control" required>
          <option value="Moto">Moto</option>
          <option value="Auto">Auto</option>
      </select>
    </div>

   <div class="form-group col-md-4">
     <label class="control-label">Precio Unitario ($) </label>
      <input id="precio_unitario" name="precio_unitario" type="precio_unitario" 
      type="text" onkeypress="return validaNumericos(event)"class="form-control" autocomplete="off" placeholder=" $ Precio unitario de compra"  value="" required>
    </div>
     <br>
   <div class="form-group col-md-4">
     <label class="control-label">Precio Venta ($) </label>
      <input id="precio_venta" name="precio_venta"  type="precio_venta" 
      type="text" onkeypress="return validaNumericos(event)" class="form-control" autocomplete="off" placeholder=" $ Precio  de venta" value="" required>
    </div>

   
    <div class="form-group col-md-4">
    <label class="control-label">Fecha</label>
      <input id="fecha_venta" name="fecha_venta" type="date" class="form-control">
     <?php   $fecha_venta=date('Y-m-d')?>
    </div> 
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

</main>

 <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    
    <script src="../js/jquery.quicksearch2.2.1.js" ></script>
    <script src="../js/jquery.maskedinput.min.js"></script>
    <script src="../js/datatables.min.js"></script>
     
    
     
     
   

    <script>
     function alerta(){
        toastr.success("Usuario Guardado");

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  
  "hideMethod": "fadeOut"
}
          

          
      }
        
        
    </script>

    <script>
   
          function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
} 
      
    </script>
    
    <!--escript para buscar en la tabla-->
   <!--escript para buscar en la tabla-->
    <script>
      $(function () {

  $('#search').quicksearch('table tbody tr');               
});
    </script>
    
    <script>
    //---Funcion para detectar el clic y obtener los datos
      $("table tbody tr").click(function() {
          //---se obtiene el indice de la tabla
 var nombre=$(this).find("td:eq(0)").text();
  var id=$(this).find("td:eq(6)").text(); 
           
          
          //---poniendo los datos en los inputs del modal
          
         
        
          $("#nombreU").text(nombre+"?");
          $("#idDelete").text(id);
  
});
    </script>
    
    
    
    <script>
    
        $(document).ready(function(){
            
            $("#btnEliminar").click(function(){
                
                var idEliminar=$("#idDelete").text();
            eliminar(idEliminar);
                
            });
            
        });
        
    </script>
   
    
</body>
</html>
