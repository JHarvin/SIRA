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
      include"menuVentas.php";
      ?>
 <main class="app-content">
 <div class="app-title">
        <div>
          <h1><i class="fa fa-inbox"></i> Cajero : Administrador</h1>
          <p>Rent a car chacon</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          
          
        </ul>
      </div>
<div class="row">
       <div  class="col-md-12">
           <div class="card">
          
         <form>
  <div class="form-row">
    
    <div class="col">
      <input type="text" class="form-control" placeholder="Código">
    </div>
    <div class="col-7">
      <input type="text" class="form-control" placeholder="Descripcion del producto o nombre del producto">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Precio de Venta">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Cantidad">
    </div>
    
    
  </div>
  
   <div class="card-footer">
       <button class="btn btn-primary">Agregar Producto</button>
       <button class="btn btn-success">Nuevo Cliente</button>
   </div> 
  
</form>
               
           </div>
           
           <div class="card table table-responsive">
               
               <table class="table table-striped">
                   <thead>
                <tr>
                  <th>Código</th>
                  <th>Descripción</th>
                   <th>Precio Unitario</th>
                  <th>Cantidad</th>
                  <th>Importe</th>
                  <th></th>
                 
                </tr>
              </thead>
                   <tbody>
                <tr>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td>
                     <button class="btn btn-warning"><i class="fa fa-trash-o"></i></button>
                     
                 </td>
                </tr>
                   </tbody> 
               </table>
               
              <h3> <label>Total:</label></h3>
               <div class="card-footer">
                    <button class="btn btn-danger"><i class="fa fa-ban"></i>Cancelar</button>
                     <button class="btn btn-success"><i class="fa fa-check-circle"></i>Registrar Venta</button>
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
</body>
</html>
