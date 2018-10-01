<?php
require_once"../Controladores/ControladorRegistrarVehiculo.php";
?>
<html lang="es">
<head>

    <title>Registrar autos</title>
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
 
 
   <script src="../Vistas/js/validarVehiculos.js"></script>
   
   <script src="js/validarVehiculos.js"></script>
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
          <h1><i class="fa fa-credit-card"></i> Registrar auto</h1>
          
        </div>
        
      </div>
       
       <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Registrar</h3>
            <div class="tile-body">
             
              <form method="post" enctype="multipart/form-data"     onsubmit="return validarVehiculo();">
              <div class="form-row">
    <div class="form-group col-md-3">
      <label for="nplaca">Número de placa</label>
      <input type="text" class="form-control" id="nplaca" name="nplaca" placeholder="Numero de placa" autocomplete="off" autofocus
      pattern=".{5,}" title="Digite correctamente el numero de placa"
        required>
    </div>
    <div class="form-group col-md-3">
      <label for="marca">Marca y Modelo</label>
      <input type="tel" class="form-control" id="marca" name="marca" placeholder="Marca, Modelo" autocomplete="off" pattern=".{8,}" title="8 o mas caracteres para marca real y modelo" onkeypress="return check(event)" required>
    </div>
     <div class="form-group col-md-3">
      <label for="ano">Año</label>
      <input type="text" class="form-control" id="ano" name="ano" placeholder="Digite año del vehiculo" autocomplete="off"
      pattern=".{4,}" title="4 numeros para año" required>
    </div>
 
    
    <!--tipo de carro y color-->
     <div class="form-group col-md-3">
      <label for="tipo">Tipo</label>
      <select name="tipo" id="tipo" class="form-control" required>
          <option value="sedan">sedan</option>
          <option value="pick up">pick up</option>
          <option value="camioneta">camioneta</option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="color">Color</label>
      <input type="text" class="form-control" id="color" name="color" placeholder="color" autocomplete="off" pattern=".{4.}" title="4 caracters para color correcto" onkeypress="return check2(event)" required>
    </div>
    
    
    <div class="form-group col-md-3">
      <label for="numero_motor">Número de motor</label>
      <input id="numero_motor" name="numero_motor" type="text" class="form-control" placeholder="Numero de motor" autocomplete="off" required>
    </div>
    <div class="form-group col-md-3">
      <label for="color">Número de chasis</label>
      <input type="text" class="form-control" id="chasis" name="chasis" placeholder="numero de chasis" autocomplete="off" pattern=".{17}" title="17 numeros para chasis" required>
    </div>
    
    
    <div class="form-group col-md-3">
      <label for="tcombustible">Tipo de combustible</label>
      <select name="tcombustible" id="tcombustible" class="form-control">
          <option value="Especial">Especial</option>
          <option value="Regular">Regular</option>
          <option value="Diesel">Diesel</option>
      </select>
      
    </div>
   
     
     <!--Para imagenes-->
     <div class="form-group col-md-3">
         <label for="imagen">Seleccione imagen 1</label>
 <input type="file" class="form-control" placeholder="imagen" id="imagen" name="imagen" accept=".jpg, .jpeg, .png" required>
         
     </div>
     <div class="form-group col-md-3">
         <label for="imagen">Seleccione imagen 2</label>
 <input type="file" class="form-control" placeholder="imagen" id="imagen2" name="imagen2"
        accept=".jpg, .jpeg, .png" required>
         
     </div>
     <div class="form-group col-md-3">
         <label for="imagen">Seleccione imagen 3</label>
 <input type="file" class="form-control" placeholder="imagen" id="imagen3" name="imagen3" 
        accept=".jpg, .jpeg, .png" required>
         
     </div>
      <div class="form-group col-md-3">
         <label for="imagen">Seleccione imagen 4</label>
 <input type="file" class="form-control" placeholder="imagen" id="imagen4" name="imagen4"
        accept=".jpg, .jpeg, .png" required>
         
     </div>
     
     
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
                  $registrar->registrarVController();
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
        $("#nplaca").mask("P999-999");
            $("#chasis").mask("99999999999999999");
          $("#numero_motor").mask("99999999999999999");
        });
          
        
    </script>
    
   
    
    <script>
    // para lista seleccionable
        $(function () {
    $('.list-group.checked-list-box .list-group-item').each(function () {
        
        // Settings
        var $widget = $(this),
            $checkbox = $('<input type="checkbox" class="hidden" />'),
            color = ($widget.data('color') ? $widget.data('color') : "primary"),
            style = ($widget.data('style') == "button" ? "btn-" : "list-group-item-"),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };
            
        $widget.css('cursor', 'pointer')
        $widget.append($checkbox);

        // Event Handlers
        $widget.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });
          

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $widget.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $widget.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$widget.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $widget.addClass(style + color + ' active');
            } else {
                $widget.removeClass(style + color + ' active');
            }
        }

        // Initialization
        function init() {
            
            if ($widget.data('checked') == true) {
                $checkbox.prop('checked', !$checkbox.is(':checked'));
            }
            
            updateDisplay();

            // Inject the icon if applicable
            if ($widget.find('.state-icon').length == 0) {
                $widget.prepend('<span class="state-icon ' + settings[$widget.data('state')].icon + '"></span>');
            }
        }
        init();
    });
    
    $('#get-checked-data').on('click', function(event) {
        event.preventDefault(); 
        var checkedItems = {}, counter = 0;
        $("#check-list-box li.active").each(function(idx, li) {
            checkedItems[counter] = $(li).text();
            counter++;
        });
        $('#display-json').html(JSON.stringify(checkedItems, null, '\t'));
    });
});
        
       
    </script>
    
     <script>
          
         
    $(document).ready(function () {
$("#ano").datepicker({
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