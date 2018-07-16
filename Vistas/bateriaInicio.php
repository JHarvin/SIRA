 <!DOCTYPE html>
<html lang="es">
 <head>
 <title>Inicio</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/buscarInput.css">
  </head>
  <body class="app sidebar-mini rtl">
  <?php
      include"menu.php";
      ?>
 <main class="app-content">
 <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Inicio</h1>
          <p>Rent a car chacon</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Incio</a></li>
        </ul>
      </div>
<div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-wrench fa-3x"></i>
            <div class="info">
              <h4>
                  <a href="#" data-toggle="modal" data-target="#listaReparacion">Generar venta</a>
              </h4>
              <p><b>Venta</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-road fa-3x"></i>
            <div class="info">
              <h4>
                  <a href="#" data-toggle="modal" data-target="#listaDisponible">En stock</a>
                  
              </h4>
              <p><b>25</b></p>
            </div>
          </div>
        </div>
       
       
        
        <div id="baterias">
        <h3>Catalogo</h3>
          <table id="table"  class="table table-striped">
              <thead>
                <tr>
                  <th>Modelo</th>
                  <th>tipo</th>
                   <th>Precio por unidad</th>
                  <th>Descripcion</th>
                  <th>Fecha </th>
                  
                 <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>H</td>
                  <td>75644
                  
                  </td>
                  <td>Seador
                  
                  </td>
                  <td>05049807-4
                  
                  </td>
                  <td>09004033 
                  
                  </td>
                  
                 
                  
                  <td>
                    
                    <button class="btn btn-warning" type="button" ><i class="fa fa-fw fa-lg fa fa-wrench"></i></button>
                     
                      
                      
                       
                       
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
      
      
      
      
</main>

<!--para modal de repaciones-->
 <div class="modal" id="listaReparacion">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Autos en mantenimiento</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      
     
        <div class="row">
      <div class="col-md-12">
          <div class="tile">
            
            
             <div class="box input-group" style="margin-left:25px;">
  <div class="container-2">
      <span class="icon"><i class="fa fa-search"></i></span>
        <input  type="search" id="search" />
           </div>
        </div>
            <table id="table"  class="table table-striped">
              <thead>
                <tr>
                  <th>Modelo</th>
                  <th>Numero de placa</th>
                   <th>Fecha de entrada</th>
                  <th>Descripcion</th>
                  <th>Fecha de salida</th>
                  
                 <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>H</td>
                  <td>75644
                  
                  </td>
                  <td>Seador
                  
                  </td>
                  <td>05049807-4
                  
                  </td>
                  <td>09004033 
                  
                  </td>
                  
                 
                  
                  <td>
                    
                    <button class="btn btn-warning" type="button" ><i class="fa fa-fw fa-lg fa fa-wrench"></i></button>
                     
                      
                      
                       
                       
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
         
            
              
          </div>
          
          
          
    
     
      

     
     
     
     
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Aceptar</button>
      </div>

    </div>
  </div>
</div>


<!--para modal de autos disponibles lista-->
 <div class="modal" id="listaDisponible">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Autos Disponibles</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      
     
       <div class="row">
      <div class="col-md-12">
          <div class="tile">
            
            
             <div class="box input-group" style="margin-left:25px;">
  <div class="container-2">
      <span class="icon"><i class="fa fa-search"></i></span>
        <input  type="search" id="search" />
           </div>
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
                   
                  </td>
                  <td>Seador
                   
                  </td>
                  <td>05049807-4
                   
                  </td>
                  <td>09004033 
                   
                  </td>
                  <td>M
                   
                  </td>
                  <td>M
                   
                  </td>
                  <td>M
                   
                  </td>
                  <td>
                    <div>
                    
                    <button class="btn btn-success" type="button" ><i class="fa fa-fw fa-lg fa fa-wrench"></i></button>
                     
                      
                      
                      
                       </div>
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
         
            
              
          </div>
          
          
          
    
     
      

     
     
     
     
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Aceptar</button>
      </div>

    </div>
  </div>
</div>


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
</body>
</html>
