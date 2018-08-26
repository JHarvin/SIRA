<?php
#--------se cambiara para usar ajax-----------------
require_once"../Controladores/ControladorRegistrarVehiculo.php";
?>
<html lang="es">
<head>

    <title>Vehiculos</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- libreria para notificaciones toast-->
    <link rel="stylesheet" href="../css/toastr.css">
    <!-- efectos del input buscar-->
    <link rel="stylesheet" href="../css/buscarInput.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">

</head>      
<body class="app sidebar-mini rtl">
     <?php 
    include"menu.php";
    ?>
      <main class="app-content">
       
       
       <div class="row">
      <div class="col-md-12">
         
          <div class="tile">
            
            <h3 class="tile-title">Vehiculos</h3>
             <div class="col-md-5" style="float:right;">
                 <i class="fa fa-road"></i>
                    <label>Vehiculo alquilado</label>
                    
                <i class="fa fa-ban"></i>
                <label>Vehiculo en mantenimiento</label>
                 
             </div>
             <div class="col-md-5">
                <form class="form-inline md-form form-sm" >
    <i class="fa fa-search" aria-hidden="true"></i>
    <input id="search" class="form-control form-control ml-3 w-75" type="text" placeholder="Buscar" >
</form>
        
            </div>
       
            <div class="table table-responsive">
            <table id="table"  class="table table-striped">
              <thead>
                <tr>
                 <th></th>
                  <th>NUMERO DE PLACA</th>
                  <th>MARCA,MODELO,AÑO</th>
                   <th>TIPO</th>
                  <th>COLOR</th>
                  <th>NUMERO DE MOTOR</th>
                  <th>NUMERO DE CHASIS</th>
                  <th>COMBUSTIBLE</th>
                  <th>ESTADO</th>
                 <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $mostrar=new RegistrarVehiculoController();
                  $mostrar->mostrarVehiculosController();
                  
                  ?>
                 
                 
              </tbody>
            </table>
            </div>
          </div>
        </div>
        
        
        
      </div>
      </main>
      
      
       <!-- Modal para eliminar vehiculo -->
      <div class="modal" id="modalEliminar">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Eliminar </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     
              <div><img src="../images/pregunta.png" alt=""></div>
         <label>¿Desea Eliminar este vehiculo?</label> <b><p id="nombrePl"></p> Placas: <p id="numeroPl"></p> </b>
           
          
                 
                
                
       
         
            
              
          </div>
          
          
          
     
      <!-- Modal footer -->
      <div class="modal-footer">
      <button id="btnEliminar" name="btnEliminar" class="btn btn-info"><i class="fa fa-fw fa-lg fa-check-circle"></i> Eliminar</button>
        |
        <button type="button" class="btn btn-danger" data-dismiss="modal">
        <i class="fa fa-undo"></i> Cancelar</button>
      </div>

    </div>
  </div>
</div>
      
      
      <!-- Modal -->
 
     
       
      
      <!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/toastr.js"></script>
    <script src="../js/jquery.quicksearch2.2.1.js" ></script>
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
    //--------pone los datos en el modal
        
        //---Funcion para detectar el clic y obtener los datos
      $("table tbody tr").click(function() {
          //---se obtiene el indice de la tabla
 var placa=$(this).find("td:eq(1)").text();
  var nombre=$(this).find("td:eq(2)").text(); 
           
          
          //---poniendo los datos en los inputs del modal
          
         
        
         $("#numeroPl").text(placa);
        $("#nombrePl").text(nombre);
      });
        
    </script>
    
    </body>
</html>