<?php
require_once"../Controladores/ControladorRegistrarVehiculo.php";
require_once"../Controladores/ControladorClientes.php";
session_start();
if(!$_SESSION["validar"]){


    header("location:../index.php");
    exit();
}
?>
<html lang="es">
<head>

    <title>Autos registrados</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
   <!--Libreria fancybox para mostrar imagens-->
 <link rel="stylesheet" href="../css/fancybox.min.css" />


 <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
 <script src="../Vistas/js/reservarAlquilar.js"></script>
  <!-- include the RTL css files-->

<link rel="stylesheet" href="../css/alertify.rtl.css">
<link rel="stylesheet" href="../css/themes/default.rtl.css">

<!-- include alertify script -->
<script src="../js/alertify.js"></script>

<!-- then override glossary values -->
<script type="text/javascript">
alertify.defaults.glossary.title = 'أليرتفاي جي اس';
alertify.defaults.glossary.ok = 'موافق';
alertify.defaults.glossary.cancel = 'إلغاء';




</script>
    <!-- include alertify.css -->
<link rel="stylesheet" href="../css/alertify.css">
<!-- include semantic ui theme  -->
<link rel="stylesheet" href="../css/themes/semantic.css">
<!-- include alertify script -->
<script src="../js/alertify.js"></script>
<script type="text/javascript">
//override defaults
alertify.defaults.transition = "zoom";
alertify.defaults.theme.ok = "ui positive button";
alertify.defaults.theme.cancel = "ui black button";

</script>

<!-- include boostrap theme  -->
<link rel="stylesheet" href="../css/themes/bootstrap.css">

<!-- include alertify script -->


<script type="text/javascript">
//override defaults
alertify.defaults.transition = "slide";
alertify.defaults.theme.ok = "btn btn-primary";
alertify.defaults.theme.cancel = "btn btn-danger";
alertify.defaults.theme.input = "form-control";
</script>



</head>
<body class="app sidebar-mini rtl">
    <script>
    function actualizar(placa,posicion){


    var datos=new FormData();

    datos.append("placa",placa);
    datos.append("imagen",posicion);



     $.ajax({

        type: "POST",
        url: "../Vistas/ajaxActualizarImagen.php",
        data: datos,
        cache:false,
        contentType:false,
        processData:false,

        success:function(respuesta){


        if(respuesta==1){


           $("#tcuerpo").load("listado_auto.php #tcuerpo >*");
          alertify.success("Auto en alquiler");


    }
          else if(respuesta!=1){
            $("#tcuerpo").load("listado_auto.php #tcuerpo >*");
          alertify.success("Auto en alquiler");

          }
            else{
              //  $("#table").load();

                alert("Error -> "+respuesta  );}

    }


    });

}
    </script>
    <script>
    function mostrarCHaMotor(){
var chasis,motor;
$(document).ready(function(){
 $("#tabla tbody tr").dblclick(function(){
         chasis=$(this).find("td:eq(12)").text();
         motor=$(this).find("td:eq(13)").text();
        
        
        //se ponen los datos en el modal
        
        $("#dchasis").text(chasis);
        $("#dmotor").text(motor);
        
        
       
    $("#modalChM").modal();
    });

});
  

    }
    </script>
     <?php
    include"menu.php";
    ?>
      <main class="app-content" style="background-color:#788499;
">

<div class="app-title">
        <div>
          <h1><i class="app-menu__icon fa fa-car"  style="font-size:25px;color:#788499;
"></i>  Autos registrados </h1>
          <p>RentalSys </p>
        </div>
                            
 </div>
       <div class="row">
      <div class="col-md-12">
         <!--contenedor de la tabla de vehiculos (principal vista)-->
          <div id="contenedorTabla" class="tile">




            <div class="table table-responsive" >
            <table id="tabla"  class="table display table-striped  " style="font-size:13.4px;" ondblclick="mostrarCHaMotor()">
              <thead>
                <tr>
                 <th></th>
                  <th>NUMERO DE PLACA</th>
                  <th>MARCA,MODELO,AÑO</th>
                   <th>TIPO</th>
                  <th>COLOR</th>

                  <th>COMBUSTIBLE</th>
                  <th>ESTADO</th>
                 <th>ACCIONES</th>
                 <th hidden></th>
                 <th hidden></th>
                 <th hidden></th>
                 <th hidden></th>
                 <th hidden></th>
                 <th hidden></th>
                 
                </tr>
              </thead>
              <tbody id="tcuerpo">
                <?php
                  $mostrar=new RegistrarVehiculoController();
                  $mostrar->mostrarVehiculosController();

                  ?>


              </tbody>
            </table>
            </div>


          </div>
        </div>



      </div>
      </main>
      <!------------------------------------------------------------------------->
      <!-- Modales -->
      <!------------------------------------------------------------------------->
    <!--Modal para mostrar numero de chasis y motor del carro-->
    <!--------------------------------------------------------------------------->
    <div class="modal" id="modalChM">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color:#788499;
color:white;">
        <h4 class="modal-title">Numero de chasis y motor </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

              
       
<div class="row">
<div class="col-md-12">
  <b><label>Número de chasis</label> </b><p id="dchasis"></p> <b>Número de motor:</b> <p id="dmotor"></p>
</div>

</div>

          </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">
        <i class="fa fa-undo"></i> Retroceder</button>
      </div>

    </div>
  </div>
</div>
      <!------------------------------------------------------------------------->
       <!-- Modal para eliminar vehiculo -->
       <!------------------------------------------------------------------------->
      <div class="modal" id="modalEliminar">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color:#788499;
color:white;">
        <h4 class="modal-title">Eliminar </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

              
       
<div class="row">
<div class="col-md-6">
  <label>¿Desea Eliminar este vehiculo?</label> <b><p id="nombrePl"></p> Placas: <p id="numeroPl"></p> </b>
</div>
<div class="col-md-6">
<li class="fa fa-question-circle fa-5x" style="color:#0F6099
;"></li>
</div>
</div>

          </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button id="btnEliminarVehiculo" name="btnEliminarVehiculo" class="btn btn-info" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-check-circle"></i> Eliminar</button>
        |
        <button type="button" class="btn btn-danger" data-dismiss="modal">
        <i class="fa fa-undo"></i> Cancelar</button>
      </div>

    </div>
  </div>
</div>
<!------------------------------------------------------------------------->
 <!-- Modal para actualizar la imagenes del vehiculo -->
 <!------------------------------------------------------------------------->
<div class="modal" id="imagenModal">
<div class="modal-dialog modal-sm">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header" style="background-color:#788499; color:white;">
  <h4 class="modal-title">Selecione imagen </h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
<div class="modal-body">
<form enctype="multipart/form-data">
      <input type="file" id="file" name="file" class="form-control">
      <input type="hidden" id="placaimg" name="placaimg" value="">
      <input type="hidden" id="numeroImg" name="numeroImg" value="">

</form>

    </div>

<!-- Modal footer -->
<div class="modal-footer">
<button id="btnCambiarImagen" name="btnCambiarImagen" class="btn btn-info"><i class="fa fa-fw fa-lg fa-check-circle"></i> Cambiar</button>
  |
  <button type="button" class="btn btn-danger" data-dismiss="modal">
  <i class="fa fa-undo"></i> Cancelar</button>
</div>

</div>
</div>
</div>

      <!------------------------------------------------------------------------->
      <!-- Modal  PARA PONER IMAGEN DEL CARRO-->
      <!------------------------------------------------------------------------->
 <div class="modal" id="modalDetalle">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color:#788499; color:white;">
        <h4 class="modal-title">Imagenes del auto </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">


    <div id="img" name="img">
      <!--Imagenes-->
       <!--Para imagen 1-->
        <a id="imagen1" data-fancybox="gallery" href=""> <img id="imagenDC"  src="" width="165" height="100"></a>
        <!--Para imagen 2-->
        <a id="imagen2" data-fancybox="gallery" href=""> <img id="imagenDC2"  src="" width="165" height="100"></a>
        <!--Para imagen 3-->
        <a id="imagen3" data-fancybox="gallery" href=""> <img id="imagenDC3"  src="" width="165" height="100"></a>
        <!--Para imagen 4-->
<a id="imagen4" data-fancybox="gallery" href=""> <img id="imagenDC4"  src="" width="165" height="100"></a>

    <!--Fin imagenes-->
</div>





      <!-- Modal footer -->
      <div class="modal-footer btn-group" role="group">
        <button type="button" id="btn1" class="btn btn-secondary" data-toggle="modal" data-target="#imagenModal" data-dismiss="modal">
        <i class="fa fa-image"></i>Cambiar imagen 1</button>
        <button id="btn2" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#imagenModal" data-dismiss="modal">
        <i class="fa fa-image"></i>Cambiar imagen 2</button>
        <button id="btn3" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#imagenModal" data-dismiss="modal">
        <i class="fa fa-image"></i>Cambiar imagen 3</button>
        <button id="btn4" type="button" class="btn btn-secondary" data-toggle="modal" data-target="#imagenModal" data-dismiss="modal">
        <i class="fa fa-image"></i>Cambiar imagen 4</button>

        <button id="btn4" type="button" class="btn btn-info" data-dismiss="modal">
        <i class="fa fa-undo"></i>Atras</button>
      </div>

    </div>
  </div>
</div>
    </div>

      <!------------------------------------------------------------------------->
      <!-- |MODAL PARA PREGUNTAR SI ALQUILAR ||||||||||||||||||||||||||||||||||-->
      <!------------------------------------------------------------------------->
      <div class="modal" id="modalOpcion">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header panel-info" style="background-color:#788499; color:white;">
        <h4 class="modal-title">Elegir Acción </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">




          </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <a href="#" id="btnIrAlquiler" name="btnIrAlquiler" class="btn btn-success" data-toggle="modal" data-target="#modalAlquilar" data-dismiss="modal"> <i class="fa fa-key"></i> Alquilar Vehiculo</a>
        |
        <button type="button" class="btn btn-primary" data-dismiss="modal">
        <i class="fa fa-exclamation-triangle"></i> Cancelar</button>
      </div>

    </div>
  </div>
</div>
     <!-------------------------------------------------------------------------->
      <!-- |MODAL PARA MOSTRAR LOS CLIENTES Y ALQUILAR EL VEHICUO|--------------->
      <!------------------------------------------------------------------------->

      <div class="modal" id="modalAlquilar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color:#788499; color:white;">
        <h4 class="modal-title">Rentar auto </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" >
     <div class="table table-responsive">
         <table id="clientesAquiler" style="font-size:13.5px;">
             <thead>
                 <th>Cliente</th>
                 <th>Teléfono</th>
                 <th>Dirección</th>
                 <th>DUI</th>
                 <th>Licencia de conducir</th>
                 <th>Genero</th>
                 <th>Estado</th>
                 <th>Rentar</th>
             </thead>
             <tbody>
                 <?php
                  $clientes=new ClientesController();
                  $clientes->mostrarClienteAlquiler();
                 ?>
             </tbody>
         </table>


     </div>



          </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button id="btnRetrocederAlquiler" name="btnRetrocederAlquiler" class="btn btn-info" data-dismiss="modal"> <i class="fa fa-undo"></i> Retroceder</button>

      </div>

    </div>
  </div>
</div>

      <!------------------------------------------------------------------------->

  <!--------------------------------------------------------->
   <!--Modal para seleccionar la fecha de alquiler-->
   <!------------------------------------------------------------->
    <div class="modal fade" id="modalTiempo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#788499; color:white;">
                <h4 class="modal-title w-100 font-weight-bold">Tiempo de alquiler del auto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <div class="modal-body">


<form id="formulario_alquilar">
  <div id="rowM" class="form-row">
    <div class="form-group col-md-6">
      <label for="nombreClienteAl">Nombre del cliente</label>
      <input type="text" class="form-control"  disabled id="nombreClienteAl">
    </div>
    <div class="form-group col-md-6">
      <label for="duiClienteAl">DUI del cliente</label>
      <input type="text" class="form-control" id="duiClienteAl" disabled>
    </div>

     <div class="form-group col-md-6">
    <label for="autoname">Auto a rentar</label>
    <input type="text" class="form-control" id="autoname" disabled>
  </div>
  <div class="form-group col-md-6">
    <label for="placarente">Placas del auto</label>
    <input type="text" class="form-control" id="placarent" disabled>
  </div>

               <div class="form-group col-md-6">
                  <label for="fechaFin">Fecha de renta(inicio)</label>
                   <input type="text" class="form-control" id="fechaInicio" name="fechaInicio"  autocomplete="off" data-format="dd/MM/yyyy" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="fechaFin">Fecha de devolucion(fin)</label>
                   <input type="text" class="form-control" id="fechaFin" name="fechaFin"  autocomplete="off" data-format="dd/MM/yyyy" required onblur="calcularDias();">
                </div>

                <div class="form-group col-md-6" style="border-left: 6px solid #0F6099;
;
  background-color: lightgrey;">
                    <h5>
                        <label id="dias"></label>
                    </h5>
                </div>
                <div class="form-group col-md-6" style="border-left: 6px solid #0F6099;
;
  background-color: lightgrey;">
                    <h5>
                        <label id="precio"></label>
                    </h5>
                </div>
                 <div class="form-group col-md-12" style="border-left: 6px solid #0F6099;
;
  background-color: lightgrey;">
                    <h5>
                        <label id="precioxdia"></label>
                    </h5>
                </div>
  </div>




</form>


            </div>
            <div class="modal-footer">
              <div class="form-group">
                  <button type="button" class="btn btn-primary" onclick="reservar()">
               <i class="fa fa-get-pocket"></i>
               Alquilar</button>
        <button class="btn btn-info" data-toggle="modal" data-target="#modalAlquilar" data-dismiss="modal"><i class="fa fa-undo"></i>Atras</button>
              <button class="btn btn-info" data-dismiss="modal"><i class="fa fa-ban"></i>Cancelar</button>
              </div>

              </div>

            </div>
        </div>
    </div>
</div>



     <!------------------------------------------------------->

      <!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
     <script src="../js/main.js"></script>
    <script src="../js/plugins/pace.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.min.js"></script>


    <script src="../js/fancybox.min.js"></script>
    <script src="../Vistas/js/eliminarVehiculo.js"></script>
     <script src="../js/bootstrap-datepicker.js"></script>
<script src="../js/plugins/moment.min.js"></script>
 <script src="../Vistas/js/actualizarImagen.js"></script>
  <script>

      $(document).ready(function() {
          //---para data tables codigo
    $('#tabla').DataTable( {


        "lengthMenu": [[4, 10, 50, -1], [4, 10, 50, "Todos"]],


           "language": {
            "lengthMenu": "Mostrar _MENU_",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando _PAGE_ de _PAGES_ paginas",
            "infoEmpty": "Busqueda no encontrada",
            "infoFiltered": "(Total de registrados _MAX_ )",
            "sSearch":"Buscar",
            "paginate": {
            "previous": "Anterior",
                "next": "Siguente"
    }
        }

    } );
} );

    </script>

     <script>

    $(document).ready(function() {
          //---para data tables codigo
    $('#clientesAquiler').DataTable( {


        "lengthMenu": [[4, 10, 50, -1], [4, 10, 50, "Todos"]],


           "language": {
            "lengthMenu": "Mostrar _MENU_",
            "zeroRecords": "No se encontraron registros",
            "info": "Mostrando _PAGE_ de _PAGES_ paginas",
            "infoEmpty": "Busqueda no encontrada",
            "infoFiltered": "(Total de registrados _MAX_ )",
            "sSearch":"Buscar",
            "paginate": {
            "previous": "Anterior",
                "next": "Siguente"
    }
        }

    } );
} );
    </script>


    <script>
    //--------pone los datos en el modal

        //---Funcion para detectar el clic y obtener los datos
      $("#tabla tbody tr").click(function() {
          //---se obtiene de la tabla la placa y nombre del vehiculo
 var placa=$(this).find("td:eq(1)").text();
  var nombre=$(this).find("td:eq(2)").text();
    //----obteniendo las imagenes de la tabla (td hidden) en caso seleccione ver-
          // -imagenes
          //--imagenes
        var  imagen=$(this).find("td:eq(8)").text();
          var imagen2=$(this).find("td:eq(9)").text();
          var imagen3=$(this).find("td:eq(10)").text();
          var imagen4=$(this).find("td:eq(11)").text();
          //---------------------------------------
          //---poniendo los datos en los inputs del modal de eliminar en caso seleccione eliminar



         $("#numeroPl").text(placa);
        $("#nombrePl").text(nombre);

          //---poniendo imagen en el modal detalles (es el boton con el icono de admiracion)


          //--imagen 1
          $("#imagen1").attr("href",""+imagen);
          $("#imagenDC").attr("src",""+imagen);
          //--imagen 2
          $("#imagen2").attr("href",""+imagen2);
          $("#imagenDC2").attr("src",""+imagen2);
          //---imagen 3
          $("#imagen3").attr("href",""+imagen3);
          $("#imagenDC3").attr("src",""+imagen3);
          //---imagen 4
          $("#imagen4").attr("href",""+imagen4);
          $("#imagenDC4").attr("src",""+imagen4);

          //--Poniendo el nombre y placa del vehiculo en el modal de alquilar

           $("#placarent").val(placa);
        $("#autoname").val(nombre);

          //poniendo la placa para cambiar imagen
         // $("#placaimg").val(placa);


      });

    </script>

    <script>
    //----Se ejecuta cuando se da click en el boton eliminar del modal eliminar
        //----La funcion llama a otra funcion que se encarga de ejecutar el ajax
        //---que sirve para eliminar
        $(document).ready(function(){

            $("#btnEliminarVehiculo").click(function(){

                var idEliminar=$("#numeroPl").text();

            eliminar(idEliminar);

            });

        });

    </script>

     <script>
    //----Se ejecuta cuando se da click en el boton eliminar del modal eliminar
        //----La funcion llama a otra funcion que se encarga de ejecutar el ajax
        //---que sirve para eliminar
        $(document).ready(function(){

            $("#btn1").click(function(){

                var idEliminar=$("#numeroPl").text();
                var imagen=$("#imagen1").Image();
            actualizar(idEliminar,imagen);

            });

        });

    </script>

     <script>
    //Para imprimir contrato
         function printContrato() {

     var contenido= document.getElementById("contratoP").innerHTML;
     var contenidoOriginal= document.body.innerHTML;
     document.body.innerHTML = contenido;
     window.print();
     document.body.innerHTML = contenidoOriginal;
}

    </script>

    <script>
    //-Codigo para obtener el nombre y dui del cliente y ponerlo en el modal de alquiler

        $("#clientesAquiler tbody tr").click(function() {
          //---se obtiene de la tabla la placa y nombre del vehiculo
 var nombreClienteA=$(this).find("td:eq(0)").text();
  var duiAlquilerCliente=$(this).find("td:eq(3)").text();

        $("#nombreClienteAl").val(nombreClienteA);
        $("#duiClienteAl").val(duiAlquilerCliente);


      });

    </script>

    <script>
    //Codigo para no permitir seleccionar dias pasados de la fecha de inicio del alquiler
   var getDate = function (input) {
        return new Date(input.date.valueOf());
    }
    $('#fechaInicio, #fechaFin').datepicker({
        format: "dd/mm/yyyy",
        language: 'es'
    });
    $('#fechaFin').datepicker({
        startDate: '+6d',
        endDate: '+36d',
    });
    $('#fechaInicio').datepicker({
        startDate: '+5d',
        endDate: '+35d',
    }).on('changeDate',
        function (selected) {
            $('#fechaFin').datepicker('clearDates');
            $('#fechaFin').datepicker('setStartDate', getDate(selected));
        //--para calcular dias


        });
    </script>
    <script>
    alertify.set('notifier','position', 'top-right');
    </script>
    </body>
</html>
