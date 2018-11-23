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
    
<link rel="stylesheet" href="../css/alertify.rtl.css">
<link rel="stylesheet" href="../css/themes/default.rtl.css">

<!-- include alertify script -->
<script src="../js/alertify.js"></script>
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
<div class="row" >
      
       <div  class="col-md-12">
           <div class="card col-md-3" style="float:right;">
               <div class="card-tittle" style="background-color:#E84D13;">
                   <h2  style="font-size:25px;color:white">Datos de factura:</h2>
               </div>
                


               Fecha de emison
               <input type="date" id="fecha" name="fecha"class="form-control">
               <br>
               <input type="text" class="form-control" placeholder="Nombre del cliente"
               id="cliente" name="cliente" >
               <br>
               <input type="text" id="direccion" name="direccion"class="form-control" placeholder="Direccion">
               <br>
               <input type="text" id="garantia" name="garantia" class="form-control" placeholder="Garantía (Meses)">
               <br>
              
               <button class="btn btn-info" id="factura"><i class="far fa-file-alt"></i>Imprimir factura</button>
               <br>
           </div>
           <div class="card col-md-9">
          <div class="card-title">
              <h3>Baterias</h3>
          </div>
        
  <div class="form-row">
    
    <div class="col">

    <label>Código</label>
      <input class="form-control" id="codigo" name="codigo" type="text" 
       value="<?php echo $datos["codigo"]; ?>" >
    </div>

   <div class="col">
    <label>Tipo</label>
      <input type="text" class="form-control" id="tipo" name="tipo"
       value="<?php echo $datos["tipo"]; ?>" >
    </div>
    <div class="col">
    <label>Proveedor</label>
      <input type="text" class="form-control" id="proveedor" name="proveedor"
      value="<?php echo $datos["idproveedor"]; ?>" >
    </div>
    <div class="col">
    <label>Precio($)</label>
      <input type="text" class="form-control" id="precio_venta" name="precio_venta"
      value="<?php echo $datos["precio_venta"]; ?>" >
    </div>
  
    
    
  </div>

  
   <div class="card-footer">
       <button type="button" name="btnguardarb" id="btnguardarb" class="btn btn-primary" onclick="agregarT()">
       <i class="fa fa-plus-circle"></i>Agregar a compra</button>
       <a href="bateriaInicio.php"  class="btn btn-danger" data-dismiss="modal">
        <i class="fa fa-undo"></i> Baterias disponibles</a>

   </div> 
  

               
           </div>
           
            
           
           <div class="card col-md-9 ">
               
               <table class="table table-striped" name="tabla" id="tabla" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                   <thead>
                <tr>
                  <th>Código</th>
                  <th>Tipo</th>
                   <th>Proveedor</th>
                  <th>Precio($)</th>
                 
                 
                 
                </tr>
              </thead>
                   <tbody class="tabla_ajax">
                
               <tr>
                  <?php 
                  
                  ?>
                 
                </tr>
                   </tbody> 
               </table>
               
              <h3> <label>Total:</label></h3>
               <div class="card-footer">
                    
                     <button class="btn btn-success" type="submit" name="btnguardar" id="btnguardar"><i class="fa fa-check-circle"></i>Registrar Venta
                    <button class="btn btn-danger"><i class="fa fa-ban"></i>Cancelar</button>
                     </button>
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
    <script src="js/ventas.js"></script>
    <!--escript para buscar en la tabla-->
  
  
   

    <script>
     function agregarT()
     {
      alert('aaaaaa');
      var codigo = $('#codigo').val();
      var tipo = $('#tipo').val();
      var precio = $('#precio_venta').val();
      var proveedor = $('#proveedor').val();
      var tabla = $('#tabla');

      var datos = "<tr>"+
      "<td>"+codigo+"</td>"+
      "<td>"+tipo+"</td>"+
      "<td>"+proveedor+"</td>"+
      "<td>"+precio+"</td>"+
      "</tr>";

      tabla.append(datos);
     }

    </script>

    

    </body>
</html>