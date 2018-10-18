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
     <?php
    include"menu.php";
    ?>
      <main class="app-content">
       <div class="app-title">
        <div>
          <h1><i class="fa fa-car"></i> Autos registrados</h1>

        </div>

      </div>

       <div class="row">
      <div class="col-md-12">
         <!--contenedor de la tabla de vehiculos (principal vista)-->
          <div id="contenedorTabla" class="tile">

            <h3 class="tile-title">Autos</h3>


            <div class="table table-responsive" >
            <table id="tabla"  class="table display table-striped  " style="font-size:13.4px;">
              <thead>
                <tr>
                 <th></th>
                  <th>NUMERO DE PLACA</th>
                  <th>MARCA,MODELO,AÑO</th>
                   <th>TIPO</th>
                  <th>COLOR</th>

                  <th>COMBUSTIBLE</th>
                  <th>ESTADO</th>
                 <th>Acciones</th>
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
       <!-- Modal para eliminar vehiculo -->
       <!------------------------------------------------------------------------->
      <div class="modal" id="modalEliminar">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Eliminar </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">

              <div><img src="../images/pregunta.png" alt=""></div>
         <label>¿Desea Eliminar este vehiculo?</label> <b><p id="nombrePl"></p> Placas: <p id="numeroPl"></p> </b>


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
 <!-- Modal para actualizar la imagen1 del vehiculo -->
 <!------------------------------------------------------------------------->
<div class="modal" id="imagenModal">
<div class="modal-dialog modal-sm">
<div class="modal-content">

<!-- Modal Header -->
<div class="modal-header">
  <h4 class="modal-title">Selecione imagen </h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
<div class="modal-body">

      <input type="file" name="imagen1" class="form-control">
      <input type="hidden" id="placaimg" name="placaimg" value="">
<input type="hidden" id="numero_imagen" name="numero_imagen">
    </div>

<!-- Modal footer -->
<div class="modal-footer">
<button id="btnCambiarImagen" name="btnCambiarImagen" class="btn btn-info" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-check-circle"></i> Cambiar</button>
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
      <div class="modal-header">
        <h4 class="modal-title">Imagenes del vehiculo </h4>
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
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#imagenModal" data-dismiss="modal">
        <i class="fa fa-image"></i>Cambiar imagen 1</button>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#imagenModal" data-dismiss="modal">
        <i class="fa fa-image"></i>Cambiar imagen 2</button>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#imagenModal" data-dismiss="modal">
        <i class="fa fa-image"></i>Cambiar imagen 3</button>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#imagenModal" data-dismiss="modal">
        <i class="fa fa-image"></i>Cambiar imagen 4</button>

        <button type="button" class="btn btn-info" data-dismiss="modal">
        <i class="fa fa-undo"></i>Atras</button>
      </div>

    </div>
  </div>
</div>
    </div>

      <!------------------------------------------------------------------------->
      <!-- |MODAL PARA PREGUNTAR SI ALQUILAR EL CARRO O MANDARLO A MANTENIMIENTO|-->
      <!------------------------------------------------------------------------->
      <div class="modal" id="modalOpcion">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header panel-info">
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMantenimiento" data-dismiss="modal">
        <i class="fa fa-exclamation-triangle"></i> Mandar a Mantenimiento</button>
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
      <div class="modal-header">
        <h4 class="modal-title">Rentar auto </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
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

      <!-- Modal para mostrar contrato -->
<div class="modal fade" id="modalContrato" tabindex="-1" role="dialog" aria-labelledby="ModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLongTitle">Contrato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="contratoP">
            Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.

Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.

Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.

Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.

Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.

Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.

Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.

Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.

Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.

Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.

Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.

Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.

Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.

Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.

Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.

Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.

Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.

Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.
        </p>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-primary">Aceptar</button>
        <button type="button" class="btn btn-primary" onclick="printContrato()">Aceptar e Imprimir contrato</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
  <!--------------------------------------------------------->
   <!--Modal para seleccionar la fecha de alquiler-->
   <!------------------------------------------------------------->
    <div class="modal fade" id="modalTiempo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center" style="background-color:#7f8be8;">
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
                   <input type="text" class="form-control" id="fechaFin" name="fechaFin"  autocomplete="off" data-format="dd/MM/yyyy" required>
                </div>
  </div>




</form>


            </div>
            <div class="modal-footer">
              <div class="form-group">
                  <button type="button" class="btn btn-primary" onclick="reservar()" data-dismiss="modal">
               <i class="fa fa-get-pocket"></i>
               Alquilar</button>
        
                <button class="btn btn-info" data-dismiss="modal"><i class="fa fa-ban"></i>Cancelar</button>
              </div>

            </div>
        </div>
    </div>
</div>


    <!------------------------------------------------------->
     <!--Modal para mantenimiento insertar-->
     <!------------------------------------------------------->
      <div class="modal fade" id="modalMantenimiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center" style="background-color:#7f8be8;">
                <h4 class="modal-title w-100 font-weight-bold">Mantenimiento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>



            <div class="modal-body">


<form>
  <div id="rowM" class="form-row">


     <div class="form-group col-md-6">
    <label for="autoname">Auto</label>
    <input type="text" class="form-control" id="autoname" disabled>
  </div>
  <div class="form-group col-md-6">
    <label for="placarente">Placas del auto</label>
    <input type="text" class="form-control" id="placarent" disabled>
  </div>

               <div class="form-group col-md-6">
                  <label for="fechaInicio">Fecha:</label>
                   <input type="text" class="form-control" id="fechaInicio" name="fechaInicio"  autocomplete="off" data-format="dd/MM/yyyy" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="fechaInicio">Descripción:</label>
                  <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                </div>



  </div>


  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
  <label class="form-check-label" for="defaultCheck1">
    Alarma
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" >
  <label class="form-check-label" for="defaultCheck2">
    Airbag
  </label>
</div>

</form>


            </div>
            <div class="modal-footer">
              <div class="form-group">

        <button type="button" class="btn btn-success"  data-dismiss="modal">
               <i class="fa fa-clipboard"></i>
               Mandar a mantenimiento</button>
                <button class="btn btn-info"><i class="fa fa-ban"></i>Cancelar</button>
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
        });
    </script>
    <script>
    alertify.set('notifier','position', 'top-right');
    </script>
    </body>
</html>
