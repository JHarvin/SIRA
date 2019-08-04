<?php
require_once"../Controladores/ControladorRegistrarVehiculo.php";
session_start();
if(!$_SESSION["validar"]){


    header("location:../index.php");
    exit();
}

?>
<html lang="es">
<head>

    <title>Respaldo y restauración de datos</title>
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
   <script>
    function respaldarF(){
        $.ajax({

        type: "POST",
        url: "../BackupRes/Backup.php",
        cache:false,
        contentType:false,
        processData:false,


        success:function(respuesta){

if(respuesta==1){

    alertify.success("Datos respaldados");
    setTimeout(function(){location.reload();},500);
}
            else{
                alertify.error("Auto error en el servidor");
            }


    }


    });
    }
    </script>

</head>
<body class="app sidebar-mini rtl">
     <?php
    include"menu.php";
    //----para alertas bootstrap abajo
    ?>

      <main class="app-content" style="background-color:#788499;
">
         <div class="app-title">
        <div>
          <h1><i class="app-menu__icon fa fa-database"  style="font-size:25px;color:#788499
"></i> Respaldo y restauración de datos </h1>
          <p>RentalSys</p>
        </div>

                

 </div>

       <div class="row">
        <div class="col-md-12">
          <div class="tile">

            <div class="tile-body">
            <div class="row">
                <div class="col-md-6">

                <button id="btnRespal" name="btnRespal" class="btn btn-primary btn-block" onclick="respaldarF();">
                <li class="fa fa-window-restore"></li>
                 Realizar copia de seguridad
             </button>
               <p><h6>
                   Nota: El respaldo de los datos se guardará por default en el disco local C en en la carpeta "rentalsys" que el sistema creara si esta no existe.
               </h6></p>
                </div>
                <div class="col-md-6">
                  <form action="../BackupRes/Restore.php" method="post" enctype="multipart/form-data">
                       <label for="upload">
                      Seleccione archivo a restaurar
                       <input type="file" id="upload" name="upload" class="form-control" required>
                   </label>
                   <button type="submit" id="btnRestaurar" name="btnRestaurar" class="btn btn-primary">
                       <li class="fa fa-upload"></li>
                       Restaurar
                   </button>
                  </form>


                </div>
            </div>


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
 <?php
if(isset($_GET["ok"])){
    echo'<script>
alertify.success("Datos restaurados con exito");
</script>';
}

?>
