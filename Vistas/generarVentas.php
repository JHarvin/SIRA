<?php
session_start();
if(!$_SESSION["validar"]){
    

    header("location:../index.php");
    exit();
}
<<<<<<< HEAD
=======
?>
>>>>>>> 2baf7d5b4b3317a9349c448f69b088e6798f155c
  <!DOCTYPE html>
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
          <h1><i class="fa fa-inbox"></i> Cajero : Administrador</h1>
          <p>Venta de baterias</p>
        </div>
        
         
      </div>
<div class="row">
       <div  class="col-md-12">
           <div class="card col-md-3" style="float:right;">
               <div class="card-tittle" style="background-color:orange; ">
                   <h2>Datos de factura:</h2>
               </div>
               Fecha de emison
               <input type="date" class="form-control">
               <br>
               <input type="text" class="form-control" placeholder="Cliente">
               <br>
               <input type="text" class="form-control" placeholder="Importe cliente">
               <br>
               <input type="text" class="form-control" placeholder="Vuelto">
               <br>
               <button class="btn btn-info" id="factura">Imprimir factura</button>
           </div>
           <div class="card col-md-9">
          <div class="card-title">
              <h3>Productos</h3>
          </div>
         <form>
  <div class="form-row">
    
    <div class="col">
      <input type="text" class="form-control" placeholder="Código">
    </div>
    <div class="col-7">
      
         <select class="form-control" id="demoSelect" multiple="">
                <optgroup label="Select Cities">
                  <option>Ahmedabad</option>
                  <option>Surat</option>
                  <option>Vadodara</option>
                  <option>Rajkot</option>
                  <option>Bhavnagar</option>
                  <option>Jamnagar</option>
                  <option>Gandhinagar</option>
                  <option>Nadiad</option>
                  <option>Morvi</option>
                  <option>Surendranagar</option>
                  <option>Junagadh</option>
                  <option>Gandhidham</option>
                  <option>Veraval</option>
                  <option>Ghatlodiya</option>
                  <option>Bharuch</option>
                  <option>Anand</option>
                  <option>Porbandar</option>
                  <option>Godhra</option>
                  <option>Navsari</option>
                  <option>Dahod</option>
                  <option>Botad</option>
                  <option>Kapadwanj</option>
                </optgroup>
              </select>
           
      
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
           
            
           
           <div class="card col-md-9 ">
               
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
</html>
