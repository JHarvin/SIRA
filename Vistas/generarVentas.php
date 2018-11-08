<?php
require_once"../Controladores/ControladorRegistrarBaterias.php";

$lista= new RegistrarBateriasController();
$datos=$lista->Baterias();

?>

<html lang="es">
 <head>
 <title>Generar Venta</title>
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
          <h1><i  class="fa fa-cart-plus" style="font-size:25px;color:orange"></i>  Generar Ventas</h1>
          <p>Rent a Car Chacón </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          
          
        </ul>
 </div>
<div class="row">
       <div  class="col-md-12">
           <div class="card col-md-3" style="float:right;">
               <div class="card-tittle" style="background-color:#E84D13;">
                   <h2  style="font-size:25px;color:white">Datos de factura:</h2>
               </div>
               Fecha de emison
               <input type="date" class="form-control">
               <br>
               <input type="text" class="form-control" placeholder="Nombre del cliente">
               <br>
               <input type="text" class="form-control" placeholder="Direccion">
               <br>
              
               <button class="btn btn-info" id="factura">Imprimir factura</button>
           </div>
           <div class="card col-md-9">
          <div class="card-title">
              <h3>Bateria</h3>
          </div>
         <form>
  <div class="form-row">
    
    <div class="col">

    <label>Código</label>
      <input class="form-control" id="nombre" name="codigo" type="text" 
       value="<?php echo $datos["codigo"]; ?>"  >
    </div>

   <div class="col">
    <label>Tipo</label>
      <input type="text" class="form-control" 
       value="<?php echo $datos["tipo"]; ?>" >
    </div>
    <div class="col">
    <label>Proveedor</label>
      <input type="text" class="form-control" >
    </div>
    <div class="col">
    <label>Precio</label>
      <input type="text" class="form-control" >
    </div>
  
    
    
  </div>
  
   <div class="card-footer">
       <button class="btn btn-primary">Agregar a compra</button>
       <a href="bateriaInicio.php"  class="btn btn-danger" data-dismiss="modal">
        <i class="fa fa-undo"></i> Baterias disponibles</a>
   </div> 
  
</form>
               
           </div>
           
            
           
           <div class="card col-md-9 ">
               
               <table class="table table-striped">
                   <thead>
                <tr>
                  <th>Código</th>
                  <th>Tipo</th>
                   <th>Proveedor</th>
                  <th>Precio</th>
                
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
    <script type="text/javascript" src="../js/plugins/select2.min.js"></script>
    <script src="../js/jquery.quicksearch2.2.1.js" ></script>
    <!--escript para buscar en la tabla-->
    <script>
      $(function () {

  $('#search').quicksearch('table tbody tr');
          
           $('#demoSelect').select2();
});
    </script>
</body>

    <script>
    //---Funcion para detectar el clic y obtener los datos
      $("table tbody tr").click(function() {
          //---se obtiene el indice de la tabla
 var nombre=$(this).find("td:eq(0)").text();
  var id=$(this).find("td:eq(7)").text(); 
           
          
          //---poniendo los datos en los inputs del modal
          
         
        
          $("#nombre").text(nombre+"?");
          
  
});
    </script>
</html>
