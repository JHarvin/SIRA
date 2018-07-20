!DOCTYPE html>
<html lang="es">
<head>

    <title>Alquiler</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- libreria para notificaciones toast-->
    <link rel="stylesheet" href="../css/toastr.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
 <!--para canvas-->
    <link rel="stylesheet" type="text/css" href="../css/material-gauge.css">
   
    <style>
    .funkyradio div {
  clear: both;
  overflow: hidden;
}

.funkyradio label {
  width: 100%;
  border-radius: 3px;
  border: 1px solid #D1D3D4;
  font-weight: normal;
}

.funkyradio input[type="radio"]:empty,
.funkyradio input[type="checkbox"]:empty {
  display: none;
}

.funkyradio input[type="radio"]:empty ~ label,
.funkyradio input[type="checkbox"]:empty ~ label {
  position: relative;
  line-height: 2.5em;
  text-indent: 3.25em;
  margin-top: 2em;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

.funkyradio input[type="radio"]:empty ~ label:before,
.funkyradio input[type="checkbox"]:empty ~ label:before {
  position: absolute;
  display: block;
  top: 0;
  bottom: 0;
  left: 0;
  content: '';
  width: 2.5em;
  background: #D1D3D4;
  border-radius: 3px 0 0 3px;
}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
  color: #888;
}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label:before,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #C2C2C2;
}

.funkyradio input[type="radio"]:checked ~ label,
.funkyradio input[type="checkbox"]:checked ~ label {
  color: #777;
}

.funkyradio input[type="radio"]:checked ~ label:before,
.funkyradio input[type="checkbox"]:checked ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #333;
  background-color: #ccc;
}

.funkyradio input[type="radio"]:focus ~ label:before,
.funkyradio input[type="checkbox"]:focus ~ label:before {
  box-shadow: 0 0 0 3px #999;
}

.funkyradio-default input[type="radio"]:checked ~ label:before,
.funkyradio-default input[type="checkbox"]:checked ~ label:before {
  color: #333;
  background-color: #ccc;
}

.funkyradio-primary input[type="radio"]:checked ~ label:before,
.funkyradio-primary input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #337ab7;
}

.funkyradio-success input[type="radio"]:checked ~ label:before,
.funkyradio-success input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5cb85c;
}

.funkyradio-danger input[type="radio"]:checked ~ label:before,
.funkyradio-danger input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #d9534f;
}

.funkyradio-warning input[type="radio"]:checked ~ label:before,
.funkyradio-warning input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #f0ad4e;
}

.funkyradio-info input[type="radio"]:checked ~ label:before,
.funkyradio-info input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5bc0de;
}
    </style> 
   
</head>      
<body class="app sidebar-mini rtl">
     <?php 
    include"menu.php";
    ?>
      <main class="app-content">
       
       
       <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Registro de Autos</h3>
            <div class="tile-body">
              <form>
              <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Numero de placa</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="Numero de placa">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Marca</label>
      <input type="tel" class="form-control" id="inputPassword4" placeholder="Marca">
    </div>
    
    <!--tipo de carro y color-->
     <div class="form-group col-md-6">
      <label for="tipo">Tipo</label>
      <select name="tipo" id="tipo" class="form-control">
          <option value="sedan">sedan</option>
          <option value="pick up">pick up</option>
          <option value="camioneta">camioneta</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="color">Color</label>
      <input type="text" class="form-control" id="color" placeholder="color">
    </div>
    
    
    <div class="form-group col-md-6">
      <label for="numero_motor">Numero de motor</label>
      <input id="numero_motor" name="numero_motor" type="text" class="form-control" placeholder="Numero de motor">
    </div>
    <div class="form-group col-md-6">
      <label for="color">Numero de chasis</label>
      <input type="text" class="form-control" id="color" placeholder="numero de chasis">
    </div>
    
    
    <div class="form-group col-md-6">
      <label for="numero_motor">Tipo de combustible</label>
      <input id="numero_motor" name="numero_motor" type="text" class="form-control" placeholder="Tipo de combustible">
    </div>
    <div class="form-group col-md-6">
      <label for="color">costosssss por dia de alquiler</label>
      <input type="text" class="form-control" id="color" placeholder="costo por dia de alquiler">
    </div>
     
     
     <div class="form-group col-md-6">
         <label for="imagen">Seleccione imagen</label>
 <input type="file" class="form-control" placeholder="imagen" id="imagen" name="imagen">
         
     </div>
     
     
  </div>
   
  
  
  
  

               
               
              </form>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="button" onclick="return alerta();" data-toggle="modal" data-target="#mAlquilar"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
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
    <script src="../js/toastr.js"></script>
    
    <!--para canvas-->
    
 <script src="/js/material-gauge.js"></script>
 <script src="/js/material-gauge.js"></script>
		<script>

			var gauge = new Gauge(document.getElementById("gauge"));

            
            
			gauge.value(0.15);
            

		</script>
    <script type="text/javascript">
$(document).ready(function()
	{
	$('#gasbtn').click(function () {
	//saco el valor accediendo a un input de tipo text y name = nombre2 y lo asigno a uno con name = nombre3 
        
	var gas=document.getElementById("gas").value;
        var gauge = new Gauge(document.getElementById("gauge"));
        gauge.value(gas);
        
        
	});		
});
</script>
    <!--fin canvas-->
    <script>
     function alerta(){
        toastr.success("Usuario Guardado");

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-full-width",
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
    
    </body>
</html>