 <!DOCTYPE html>
<html lang="es">
 <head>
 <title>Registro Baterias</title>
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
          <h1><i class="fa fa-inbox"></i> Administrador : Registrar baterias</h1>
          <p>Rent a Car Chacón </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          
          
        </ul>
      </div>
<div class="row">
       <div  class="col-md-12">
           <div class="card">
          
         <form>
  <div class="form-row">
         <div class="form-group col-md-6">
      <label for="idproveedor"></label>
      <select name="idproveedor" id="idproveedor" class="form-control" required>
          <option  value="american">American</option>
         
      </select>
    </div>
 
                           
    <div class="col">
      <input id="codigo" name="codigo" type="codigo" class="form-control" placeholder="Código"
      type="codigo" maxlength="5" value=""  required>
    </div>
    <div class="col-7">
      <input id="tipo" name="tipo" type="tipo" class="form-control" placeholder="Tipo de bateria"
       type="tipo"  value="" required>
    </div>
    <div class="col">
      <input id="precio_unitario" name="precio_unitario" type="precio_unitario" 
      type="text" class="form-control" placeholder="Precio de compra"  value="" required>
    </div>
    <div class="col">
      <input id="en_existencias" name="en_existencias" type="en_existencias" type="en_existencias" 
      class="form-control" placeholder="Cantidad" value="" required>
    </div>
    <div class="col">
      <input id="precio_venta" name="precio_venta" type="precio_venta" type="precio_venta" 
      class="form-control" placeholder="Precio venta" value="" required>
    </div>
    <br>
     
    
  </div>
  <br>
  <div class="form-row">
    
    <div class="col-2">
      <input  id="fehcha_venta" name="fecha_venta" type="fecha_venta" 
      type="text" class="form-control" placeholder="Precio de venta">
    </div>
   
   
    <div class="col-4">
      <input type="date" class="form-control">
    </div>
    
    
  </div>
  
   <div class="card-footer">
       <button class="btn btn-primary">Agregar producto</button>
       
   </div> 
    <?php 
                #--para guardar registros se llama a la clase y funcion
                $registro= new RegistrarBateriasController();
                $registro->registrarBaterias();
                
                ?>
              
  
</form>
               
           </div>
           
           <div class="card table table-responsive">
               
               <table class="table table-striped">
                   <thead>
                <tr>
                  <th>Código</th>
                  <th>Descripción</th>
                   <th>Precio unitario</th>
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
                     <button class="btn btn-success"><i class="fa fa-check-circle"></i>Registrar compra</button>
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
