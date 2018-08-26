!DOCTYPE html>
<html lang="es">
<head>

    <title>Clientes registrados</title>
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
            
            <h3 class="tile-title">Listado de autos registrados</h3>
             <div class="col-md-5">
                <form class="form-inline md-form form-sm" >
    <i class="fa fa-search" aria-hidden="true"></i>
    <input id="search" class="form-control form-control ml-3 w-75" type="text" placeholder="Buscar" >
</form>
                
            </div>
            <table id="table"  class="table table-striped">
              <thead>
                <tr>
                  <th>Modelo</th>
                  <th>Numero de placa</th>
                   <th>Marca</th>
                  <th>Tipo</th>
                  <th>Color</th>
                  <th>Numero de motor</th>
                  <th>Tipo de combustible</th>
                  <th>Costo de alquiler por dia</th>
                 <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>H</td>
                  <td>75644
                  <button class="btn btn-primary" type="button" ><i class="fa fa-fw fa-lg fa fa-pencil-square-o"></i></button>
                  </td>
                  <td>Seador
                  <button class="btn btn-primary" type="button" ><i class="fa fa-fw fa-lg fa fa-pencil-square-o"></i></button>
                  </td>
                  <td>05049807-4
                  <button class="btn btn-primary" type="button" ><i class="fa fa-fw fa-lg fa fa-pencil-square-o"></i></button>
                  </td>
                  <td>09004033 
                  <button class="btn btn-primary" type="button" ><i class="fa fa-fw fa-lg fa fa-pencil-square-o"></i></button>
                  </td>
                  <td>M
                  <button class="btn btn-primary" type="button" ><i class="fa fa-fw fa-lg fa fa-pencil-square-o"></i></button>
                  </td>
                  <td>M
                  <button class="btn btn-primary" type="button" ><i class="fa fa-fw fa-lg fa fa-pencil-square-o"></i></button>
                  </td>
                  <td>M
                  <button class="btn btn-primary" type="button" ><i class="fa fa-fw fa-lg fa fa-pencil-square-o"></i></button>
                  </td>
                  <td>
                    <div>
                    <button class="btn btn-warning" type="button" ><i class="fa fa-fw fa-lg fa fa-wrench"></i></button>
                     
                      
                      
                       <button class="btn btn-info" type="button" ><i class="fa fa-fw fa-lg fa fa-trash-o"></i></button>
                       </div>
                  </td>
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