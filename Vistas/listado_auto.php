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
   <!--Libreria fancybox para mostrar imagens-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.css" />
 <!--para datatables-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/datatables.min.js"></script>

 

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
    <input id="search" class="form-control form-control ml-3 w-75" type="search" placeholder="Buscar" >
</form>
        
            </div>
       
            <div class="table table-responsive">
            <table id="table"  class="table table-striped ">
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
            <br>
            <div id="idpg" class="col-md-12 text-center">
<ul class="pagination pagination-lg pager" id="developer_page">
    
</ul>
</div>
            </div>
          </div>
        </div>
        
        
        
      </div>
      </main>
      
      <!-- Modales -->
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
      
      
      <!-- Modal  PARA PONER IMAGEN DEL CARRO-->
 <div class="modal" id="modalDetalle">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Imagenes del vehiculo </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
     
              <div id="img" name="img">
                <!--Imagenes-->
                 <!--Para imagen 1-->
                  <a id="imagen1" data-fancybox="gallery" href=""> <img id="imagenDC"  src="" width="250" height="150"></a>
                  <!--Para imagen 2-->
                  <a id="imagen2" data-fancybox="gallery" href=""> <img id="imagenDC2"  src="" width="250" height="150"></a>
                  <!--Para imagen 3-->
                  <a id="imagen3" data-fancybox="gallery" href=""> <img id="imagenDC3"  src="" width="250" height="150"></a>
                  <!--Para imagen 4-->
        <a id="imagen4" data-fancybox="gallery" href=""> <img id="imagenDC4"  src="" width="250" height="150"></a>
           
              <!--Fin imagenes-->
          </div>
          
      <!-- Modal footer -->
      <div class="modal-footer">
     
        
        <button type="button" class="btn btn-info" data-dismiss="modal">
        <i class="fa fa-undo"></i>Atras</button>
      </div>

    </div>
  </div>
</div>
    </div>    
      
      <!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/toastr.js"></script>
    <script src="../js/jquery.quicksearch2.2.1.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.js"></script>
   <script src="../js/paginacion.js"></script>
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
    //----obteniendo las imagenes de la tabla (td hidden) en caso seleccione ver-
          // -imagenes
          //--imagenes
        var  imagen=$(this).find("td:eq(10)").text();
          var imagen2=$(this).find("td:eq(11)").text();
          var imagen3=$(this).find("td:eq(12)").text();
          var imagen4=$(this).find("td:eq(13)").text();
          //---------------------------------------
          //---poniendo los datos en los inputs del modal de eliminar en caso seleccione eliminar
          
         
        
         $("#numeroPl").text(placa);
        $("#nombrePl").text(nombre);
          
          //---poniendo imagen en el modal detalles (es el boton con el icono de admiracion)
         
          
          //--imagen 1
          $("#imagen1").attr("href",""+imagen);
          $("#imagenDC").attr("src",""+imagen);
          //--imagen 2
          $("#imagen2").attr("href",""+imagen2);
          $("#imagenDC2").attr("src",""+imagen2);
          //---imagen 3
          $("#imagen3").attr("href",""+imagen3);
          $("#imagenDC3").attr("src",""+imagen3);
          //---imagen 4
          $("#imagen4").attr("href",""+imagen4);
          $("#imagenDC4").attr("src",""+imagen4);
          
          
          
            
      });
        
    </script>
     
     <script type="text/javascript">
 var m=4;
         
   $(document).ready(function(){
        $("#table").paginationTdA({
            elemPerPage: m
        });
    });
    </script>
      
     
    
    </body>
</html>