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
 

     <div class="form-group col-md-6">
                  <select class="form-control" name="idproveedor" id="idproveedor">
                     
                      <?php 
                      $combo=new RegistrarProveedorController();
                      $combo->mostrarCombo();
                      
                      ?>
                      
                  </select>
                </div>

                           
    <div class="col">
     <label class="control-label">Código</label>
      <input id="codigo" name="codigo" type="codigo" class="form-control" placeholder="Código"
      type="text" maxlength="5" value=""  required>
    </div>

   
     <div class="col-7">
      <label for="tipo">Tipo</label>
      <select name="tipo" id="tipo" class="form-control" required>
          <option value="moto">Moto</option>
          <option value="auto">Auto</option>
      </select>
    </div>

    <div class="col">
     <label class="control-label">Precio Unitario ($) </label>
      <input id="precio_unitario" name="precio_unitario" type="precio_unitario" 
      type="text" class="form-control" placeholder="Precio de compra"  value="" required>
    </div>
    
    <div class="col">
     <label class="control-label">Precio Venta ($) </label>
      <input id="precio_venta" name="precio_venta" type="text" type="precio_venta" 
      class="form-control" placeholder="Precio venta" value="" required>
    </div>

    <div class="col">
     <label class="control-label">Cantidad</label>
      <input id="en_existencias" name="en_existencias" type="en_existencias" type="text" 
      class="form-control" placeholder="Cantidad" value="" required>
    </div>
    <br>
    
  </div>
  <br>
  <div class="form-row">
    
    <label class="control-label">Fecha</label>
    <div class="col-4">
      <input id="fecha_venta" name="fecha_venta" type="date" class="form-control" value="<?php  date("d/m/Y"); ?>"
      
      >
    </div>
    
    
  </div>
  
   <div class="card-footer">
       <button class="btn btn-primary">Agregar producto</button>
       <br>
       
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
        
        
        
    
           <div class="table table-responsive">
               
               <table id="tabla" class="table table-striped">
                   <thead>
                <tr>
                <th>Tipo</th>
                  <th>Código</th>
                  <th>Existencias</th>
                   <th>Precio unitario</th>
                  <th>Proveedor</th>
                  <th>Precio venta</th>
                  <th>Fecha venta</th>
                   <th hidden></th>

                 
                </tr>
              </thead>
                   <tbody>
                 <?php 
                   
                  $proveedor=new RegistrarBateriasController();
                  $proveedor->mostrarBaterias();
                  
                  ?>
                   
                   </tbody> 
               </table>
               
              <h3> <label>Total($):</label></h3>
          
               <div class="tile-footer">
              <button id="btnRegistrar" name="btnRegistrar" class="btn btn-primary" 
              type="submit"  ><i class="fa fa-fw fa-lg fa-check-circle"></i> Guardar compra </button>&nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-danger"><i class="fa fa-fw fa-lg fa-times-circle"></i> Cancelar </button>
            </div>
           </div>
           
           
           
           
           
           
           
           
       </div>
       
       
       
        
        
        
      </div>
      
      
      
      
</main>

<!--para modal de repaciones-->
 


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

     <script>
  
      $(document).ready(function() {
          //---para data tables codigo
    $('#tabla').DataTable( {
        
        
        "lengthMenu": [[4, 10, 50, -1], [4, 10, 50, "All"]],
           "language": {
            "lengthMenu": "Mostrar _MENU_",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando _PAGE_ de _PAGES_ paginas",
            "infoEmpty": "Busqueda no encontrada",
            "infoFiltered": "(Total de registrados _MAX_ )",
            "sSearch":"Buscar",   
            "paginate": {
            "previous": "Anterior",
                "next": "Siguente"
    }
        }
        
    } );
} );
    
    </script>

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
 //var nombre=$(this).find("td:eq(0)").text();
 // var id=$(this).find("td:eq(6)").text(); 
           
          
          //---poniendo los datos en los inputs del modal
          
         
        
         // $("#nombreU").text(nombre+"?");
          //$("#idDelete").text(id);
  
});
    </script>
    
    
    
   
    
</body>
</html>
