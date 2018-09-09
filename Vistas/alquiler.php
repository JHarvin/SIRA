<?php
require_once"../Controladores/ControladorClientes.php";
?>
<html lang="es">
<head>

    <title>Registro de cliente</title>
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
   
   <link rel="stylesheet" href="../css/alertify.rtl.css">
<link rel="stylesheet" href="../css/themes/default.rtl.css">

<!-- include alertify script -->
<script src="../js/alertify.js"></script>
   
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
            <h3 class="tile-title">Registro de Cliente</h3>
            <div class="tile-body">
              <form method="post">
              <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre Completo">
    </div>
    <div class="form-group col-md-6">
      <label for="telefono">Telefono</label>
      <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono 7663-4444">
    </div>
    
    <!--Dui y licencia de conducir-->
     <div class="form-group col-md-6">
      <label for="dui">Dui</label>
      <input type="text" class="form-control" id="dui" name="dui" placeholder="Dui">
    </div>
    <div class="form-group col-md-6">
      <label for="licencia">N° Licencia de conducir</label>
      <input type="text" class="form-control" id="licencia" name="licencia" placeholder="N° de licencia">
    </div>
    
     
     
  </div>
  
 
  
  
  <div class="form-group">
    <label for="direccion">Direccion</label>
    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="1234 san salvador">
  </div>
  

               <div class="form-group">
                  <label class="control-label">Genero</label>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" id="masculino" name="sexo" value="Masculino">Masculino
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" id="femenino"
                     name="sexo" value="Femenino">Femenino
                    </label>
                  </div>
                </div>
                <div class="tile-footer">
              <button type="submit" id="btnGuardarCliente" class="btn btn-primary"  ><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>&nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</button>
            </div>
             
             <?php
                  #AQUI SE INSTANCIA Y SE LLAMA A LA FUNCION EN EL CONTROLADOR
                  #PARA GUARDAR CLIENTE
                  $datos=new ClientesController();
                  $datos->registrarCliente();
                  
                  ?>
             
              </form>
            </div>
           
          </div>
        </div>
        
        
        
      </div>
      </main>
      
      
      
      <!-- Modal -->

<!-- para confirmar si al finalizar registro desea alquilar de una vez-->
     
     
    <!-- The Modal -->
<div class="modal" id="mConfirmar">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Guardado</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <img class="rounded-circle user-image" src="images/ok.png">
    Registro Guardado !!
     
     
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Aceptar</button>
      </div>

    </div>
  </div>
</div>            
              
      
      <div class="modal" id="mAlquilar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Alquilar</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      Fecha:
      <?php 
        echo date("d/m/YYY");
          
          ?>
          <div class="row">
              
          
              <div class="col-md-12">
                  <div class="form-row">
                  <div class="table-responsive">
                      <table>
                      
                      
       <tr>
       
        <td>
            <input id="txtNombreFull" type="text" class="form-control" placeholder="Nombre Completo">
        </td>
        <td>
            <input id="txtDui" type="text" class="form-control" placeholder="DUI">
            
        </td>
        <td>
            <input id="txtTel" type="tel" class="form-control" placeholder="telefono">
        </td>
        
        <td>
            Cantidad de dias
            <select name="dias" id="dias" class="form-control">
               <?php 
                for($i=1;$i<61;$i++){
                ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
            </select>
            
        </td>
        <td>Valor por dia
        <input type="text" class="form-control">
        </td>
        </tr>
        
        <tr>
            <td colspan="3">
                <input id="direccion" type="textarea" class="form-control" placeholder="direccion">
            </td>
            <td>
                Total
                <input type="text" class="form-control">
                
            </td>
            <td>
                Ingrese abono
                <input type="text" class="form-control">
            </td>
            
        </tr>
        <tr>
            <td colspan="2">
               <select name="opciones" id="opciones" class="form-control">
                   <option value="Seleccione" selected>Seleccione</option>
                   <option value="Hiunday">Hiunday</option>
                   <option value="Toyota">Toyota hilux</option>
                   <option value="Chebrolet">chebrolet force</option>
                   
               </select>
                
            </td>
            <td>
                <select name="tipo" id="tipo" class="form-control">
                   <option value="selecione tipo" selected>seleccione tipo</option>
                    <option value="sedan">sedan</option>
                    <option value="pick up">pick up</option>
                    <option value="camioneta">camioneta</option>
                </select>
                
            </td>
        </tr>
    </table>
                  </div>
                
                 
                  
                  <div class="form-group col-md-6">
                       <div class="funkyradio">
        <div class="funkyradio-success">
            <input type="checkbox" name="checkbox" id="checkbox1" checked/>
            <label for="checkbox1">Cono</label>
        </div>
        <div class="funkyradio-success">
            <input type="checkbox" name="checkbox" id="checkbox2" checked/>
            <label for="checkbox2">Llave en cruz</label>
        </div>
        <div class="funkyradio-success">
            <input type="checkbox" name="checkbox" id="checkbox3" checked/>
            <label for="checkbox3">CD player/MP3</label>
        </div>
        <div class="funkyradio-success">
            <input type="checkbox" name="checkbox" id="checkbox4" checked/>
            <label for="checkbox4">Alfombras</label>
        </div>
        <div class="funkyradio-success">
            <input type="checkbox" name="checkbox" id="checkbox5" checked/>
            <label for="checkbox5">Cable de remolque</label>
        </div>
       
    </div>
     
      </div>
                     <div class="form-group col-md-6">
               <!--canvas para medidor de gasolina-->
        <!-- Target element for the igRadialGauge -->
        
   <div class="gauge gauge--liveupdate" id="gauge">
        	<div class="gauge__container" >
        		<div class="gauge__marker"></div>
        		<div class="gauge__background" style="background-color: gray;"></div>
        		<div class="gauge__center"></div>
        		<div class="gauge__data" style="background-color:#E80C2D;"></div>
        		<div class="gauge__needle"></div>
        	</div>
        	<div class="gauge__labels mdl-typography__headline">
            	<span class="gauge__label--low">E</span>
            	<span class="gauge__label--spacer"></span>
            	<span class="gauge__label--high">F</span>
        	</div>
    	</div>

    

    

        
        <!--fin canvas medidor de gasolina-->
              </div>
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
    <script src="../js/toastr.js"></script>
    <script src="../js/jquery.maskedinput.min.js"></script>
    <!--para mascaras-->
  <script type="text/javascript">
      
 jQuery(function($){
            // Definimos las mascaras para cada input
            
            $("#telefono").mask("9999-9999");
     $("#dui").mask("99999999-9");
            
        });
          
        
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