!DOCTYPE html>
<html lang="es">
<head>

    <title>Consultar Ventas</title>
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
    include"menuVentas.php";
    ?>
      <main class="app-content">
        <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Consulta de ventas</h1>
          <p>Baterias</p>
        </div>
       
      </div>
       
       
       
       <div class="row">
      <div class="col-md-12">
          <div class="tile">
            
            <h3 class="tile-title">Consulta de ventas</h3>
             <div class="box input-group" style="margin-left:25px;">
  <div class="container-2">
      <span class="icon"><i class="fa fa-search"></i></span>
        <input  type="search" id="search" />
           </div>
           
               
            
              <div class="col-3"> 
              Desde:
              <input type="date" class="form-control"></div>
              
               <div class="col-3">
                  Hasta:
                   <input type="date" class="form-control">
               </div>
             
           
           
           <button class="btn btn-warning">Imprimir</button>
        </div>
           
            <table id="table"  class="table table-striped">
              <thead>
                <tr>
                  <th>Cliente</th>
                  <th>Bateria</th>
                   <th>Código</th>
                  <th>Fecha de venta</th>
                  <th>Acciones</th>
                 
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Harvin Jeffeth Ramos Alfaro</td>
                  <td>7566844
                 
                  </td>
                  <td>Sexta decima San salvador</td>
                  <td>Si</td>
                  <td>
                       <button class="btn btn-info" data-toggle="modal" data-target="#myModal">Ver detalle</button>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Larry</td>
                  <td>the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        
        
        
      </div>
      </main>
      
      <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn close" data-dismiss="modal"></button>
        <h4 class="modal-title">Modificar Username</h4>
      </div>
      <div class="modal-body">
        <p>Username anterior. </p>
        
         <div class="form-group">
                  <label class="control-label">Usuario</label>
                  <input class="form-control" type="text" placeholder="Nombre de usuario nuevo">
                </div>
      </div>
      <div class="modal-footer">
       <button class="btn btn-primary" type="button" onclick="return alerta();"><i class="fa fa-fw fa-lg fa-check-circle"></i>Actualizar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar y retroceder</button>
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
    </body>
</html>