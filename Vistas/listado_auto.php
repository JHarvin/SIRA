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
 <link rel="stylesheet" href="../css/datatables.min.css">
  

 

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
            
            	 
            
            
            
             
             	    
       
            <div class="table table-responsive">
            <table id="tabla"  class="table table-striped " style="font-size:14px;">
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
                 <th hidden></th>
                 <th hidden></th>
                 <th hidden></th>
                 <th hidden></th>
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
    <script src="../js/datatables.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/toastr.js"></script>
    <script src="../js/jquery.quicksearch2.2.1.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.js"></script>
    
     
    
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
 
    <!--escript para buscar en la tabla ya no se usa-->
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
     
    
     
    
    </body>
</html>