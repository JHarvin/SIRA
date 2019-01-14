<?php
require_once"../Controladores/ControladorRegistrarVehiculo.php";
$auto=new RegistrarVehiculoController();
$datos=$auto->editarVehiculoController();
?>
<html lang="es">
<head>

    <title>Actualizar datos auto</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- libreria para notificaciones alertify-->
    <link rel="stylesheet" href="../css/alertify.rtl.min.css">
    <link rel="stylesheet" href="../css/themes/bootstrap.rtl.min.css">
     
    <script src="../js/alertify.min.js"></script>
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
 
 
  
   
  
    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
     
   
</head>      
<body class="app sidebar-mini rtl">
     <?php 
    include"menu.php";
    //----para alertas bootstrap abajo
    ?>
     
      <main class="app-content">
       <div class="app-title">
        <div>
          <h1><i class="app-menu__icon fa fa-car"   style="font-size:25px;color:orange"></i>  Modificar autos</h1>
          <p>Rent a Car Chacón </p>
        </div>

        <div id="imagen">
       
         <img class="rounded-circle user-image" width="40" height="40" src="../images/ayuda.png"  href="#" onclick="window.open('../Files/modificarautos.pdf', '_blank', 'fullscreen=yes'); return false;">
</div>
        
 </div>
       
       <div class="row">
        <div class="col-md-12">
          <div class="tile">
            
            <div class="tile-body">
             
              <form method="post" enctype="multipart/form-data">
              <div class="form-row">
    <div class="form-group col-md-3">
      <label for="n_dplaca">Número de placa</label>
      <input type="text" class="form-control" id="n_dplaca" name="n_dplaca" placeholder="Numero de placa" autocomplete="off" autofocus
      pattern=".{5,}" title="Digite correctamente el numero de placa"
        required value="<?php echo $datos["numero_de_placa"]; ?>">
    </div>
    <div class="form-group col-md-3">
      <label for="marcac">Marca y Modelo</label>
      <input type="tel" class="form-control" id="marcac" name="marcac" placeholder="Marca, Modelo" autocomplete="off" pattern=".{8,}" title="8 o mas caracteres para marca real y modelo" onkeypress="return check(event)" required value="<?php echo $datos["marca"]; ?>">
    </div>
     <div class="form-group col-md-3">
      <label for="year">Año</label>
      <input type="text" class="form-control" id="year" name="year" placeholder="Digite año del vehiculo" autocomplete="off"
      pattern=".{4,}" title="4 numeros para año" required value="<?php echo $datos["year"]; ?>">
    </div>
 
    
    <!--tipo de carro y color-->
     <div class="form-group col-md-3">
      <label for="tipoc">Tipo</label>
      <select name="tipoc" id="tipoc" class="form-control" required>
          <option value="sedan">sedan</option>
          <option value="pick up">pick up</option>
          <option value="camioneta">camioneta</option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="colorc">Color</label>
      <input type="text" class="form-control" id="colorc" name="colorc" placeholder="color" autocomplete="off" pattern=".{4,}" title="4 caracters para color correcto" onkeypress="return check2(event)" required value="<?php echo $datos["color"]; ?>">
    </div>
    
    
    <div class="form-group col-md-3">
      <label for="nmotor">Número de motor</label>
      <input id="nmotor" name="nmotor" type="text" class="form-control" placeholder="Numero de motor" autocomplete="off" value="<?php echo $datos["numeromotor"]; ?>" required>
    </div>
    <div class="form-group col-md-3">
      <label for="chasisn">Número de chasis</label>
      <input type="text" class="form-control" id="chasisn" name="chasisn" placeholder="numero de chasis" autocomplete="off"  title="17 numeros para chasis" value="<?php echo $datos["numerochasis"]; ?>" required>
    </div>
    
    
    <div class="form-group col-md-3">
      <label for="tcombustiblec">Tipo de combustible</label>
      <select name="tcombustiblec" id="tcombustiblec" class="form-control">
          <option value="Especial">Especial</option>
          <option value="Regular">Regular</option>
          <option value="Diesel">Diesel</option>
      </select>
      
    </div>
   
     
     <!--Para imagenes-->
    
    
     
     
     
     
  </div>
   
  
  
  
          <div class="tile-footer">
              <button class="btn btn-primary" type="submit" ><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-secondary" ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</button>
            </div>

               <?php 
                  #------------------------------------------------
                  #Funcion para guardar esta esta en el controlador
                  #Se guarda en el modelo en el controlador se valida
                  #------------------------------------------------------
                  $registrar=new RegistrarVehiculoController();
                  $registrar->actualizarVehiculoController();
                  ?>
               
              </form>
            </div>
          
          </div>
        </div>
        
        
       
      </div>
      </main>
      
      
      
      <!-- Modal -->
 


<!-- para confirmar si al finalizar registro desea alquilar de una vez-->
     
     
             
      
      <!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
   <script src="../js/jquery.maskedinput.js"></script>
   <script src="../js/bootstrap-datepicker.js"></script>
   
 <script>
      
 jQuery(function($){
            // Definimos las mascaras para cada input
            
           // $("#ano").mask("9999");
        $("#n_dplaca").mask("P999-999");
            $("#chasisn").mask("9999999999999999");
          $("#nmotor").mask("9999999999999999");
        });
          
        
    </script>
    
   
    
  
    
     <script>
          
         
    $(document).ready(function () {
$("#year").datepicker({
format: " yyyy",
viewMode: "years", 
minViewMode: "years",
   
});  
});
    </script>
    <script>
    //solo letras validacion color
        function check2(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8 || tecla==32) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
    </script>
    <script>
     function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8 || tecla==32) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
    </script>
    <script>
    alertify.set('notifier','position', 'top-right');
    </script>
    </body>
</html>