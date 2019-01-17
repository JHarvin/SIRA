<?php
require_once"../Controladores/ControladorRegistrarBaterias.php";
require_once"../Controladores/ControladorVentas.php";
require_once"../Controladores/ControladorRegistrarProveedor.php";

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

<!-- include alertify -->
<script src="../js/alertify.js"></script>
<style>
@media print{

button,.btn{

  display: none !important;

}

}
</style>
  </head>
  <body class="app sidebar-mini rtl" class="panel panel-info">
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
<div id="muestra" class="row" >

      <form class="POST" >

       <div   class="col-md-12">
           <div  class="card col-md-3" style="float:right;">
               <div class="card-tittle" style="background-color:#E84D13;">
                   <h2  style="font-size:25px;color:white">Datos de factura:</h2>
               </div>



    <label class="control-label">Fecha</label>
    <?php   $fecha=date('Y-m-d')?>

      <input id="fecha"  min="<?php echo $fecha; ?>"
      name="fecha" type="date" value="<?php echo $fecha; ?>"
      class="form-control"  max="<?php echo $fecha; ?>" >

               <br>
               <input type="text" class="form-control" placeholder="Nombre del cliente"
               id="cliente" name="cliente" onkeypress="return soloLetras(event)" autocomplete="off"
               maxlength="65"  pattern=".{7,}" title="7 o mas caracteres para nombre real" required>
               <br>
               <input type="text" id="direccion" name="direccion"class="form-control" placeholder="Direccion"
               autocomplete="off"  maxlength="150"  pattern=".{7,}" title="7 o mas caracteres para Direccion real">
               <br>
               <?php
               if($datos["tipo"]=="MOTO"){
                ?>
               <input type="text" id="garantia" onkeypress="return validaNumericos(event)"name="garantia" class="form-control"  placeholder="Garantía (Meses)" autocomplete="off" disabled value="00">
               <br>
               <?php }
               else{
               ?>
               <input type="text" id="garantia" onkeypress="return validaNumericos(event)"name="garantia" class="form-control"  placeholder="Garantía (Meses)" autocomplete="off">
               <br>
               <?php }?>

<br>
               <button class="btn btn-info" id="factura" <input type="button" value="Imprimir Tabla" onclick="window.print();"></i>Imprimir factura</button>
               <br>
           </div>
           <div class="card col-md-9">
          <div class="card-title">
              <h3>Datos bateria</h3>
          </div>


  <div class="form-row">

    <div class="col">

    <label>Código</label>
      <input class="form-control" id="codigo" name="codigo" type="text"
       value="<?php echo $datos["codigo"]; ?>"
        disabled>
    </div>

   <div class="col">
    <label>Tipo</label>
      <input type="text" class="form-control" id="tipo" name="tipo" disables
       value="<?php echo $datos["tipo"]; ?>" disabled>
    </div>
    <div class="col">
    <label>Proveedor</label>
      <input type="text" class="form-control" id="idproveedor" name="idproveedor"
      value="<?php echo $datos["idproveedor"]; ?>" disabled>
    </div>
    <div class="col">
    <label>Precio($)</label>
      <input type="text" class="form-control" id="precio_venta" name="precio_venta"
      value="<?php echo $datos["precio_venta"]; ?>" disabled>
    </div>



  </div>


   <div class="card-footer">
       <button type="button" id="limp" name="btnguardarb" id="btnguardarb" class="btn btn-primary" onclick="agregarT()">
       <i class="icon fa fa-cart-plus fa-3x" id="l"></i>Agregar al carrito</button>
       <a href="../Vistas/bateriaInicio.php" class="btn btn-danger"><i class="fa fa-plus-circle"></i>Baterias Disponibles</a>
   </div>




           </div>



           <div class="card col-md-9 ">

               <table class="table table-striped" name="tabla" id="tabla">
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


                </tr>
                   </tbody>
               </table>



              <h3> <label>Total:$ <?php echo $datos["precio_venta"]; ?></label></h3>
               <div class="card-footer">
                    <button class="btn btn-success" type="submit" name="btnguardar" id="btnguardar"><i class="fa fa-check-circle">
                       </i>Registrar Venta </button>
                      <button type="reset" class="btn btn-secondary"><i class="fa fa-fw fa-lg fa-times-circle"></i> Cancelar </button>


               </div>
           </div>


       </div>
       </form>

       </div>

      </div>




</main>

    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>

    <!-- The javascript plugin to display page loading on top-->
    <script src="../js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="../js/plugins/select2.min.js"></script>
    <script src="../js/jquery.quicksearch2.2.1.js" ></script>
    <script src="js/ventas.js"></script>
    <script src="../js/JQuery.print.min.js"></script>

    <!--escript n la tabla-->




    <script>
     function agregarT()
     {
      //alert('aaaaaa');
      var codigo = $('#codigo').val();
      var tipo = $('#tipo').val();
      var precio = $('#precio_venta').val();
      var idproveedor = $('#idproveedor').val();
      var tabla = $('#tabla');

      var datos = "<tr>"+
      "<td>"+codigo+"</td>"+
      "<td>"+tipo+"</td>"+
      "<td>"+idproveedor+"</td>"+
      "<td>"+precio+"</td>"+
      "</tr>";

      tabla.append(datos);
     }

    </script>



 <script type="text/javascript">
        $(document).ready(function() {
            $('#limpiar').click(function() {
                $('.form-control').val('');
            });
        });
    </script>


       <div class="modal" id="modalValidar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" >

      <!-- Modal Header -->


   </body>


       <script>

         //funcionpara valida solo numero en el campo de telefono
          function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;
}

    </script>

     <script type="text/javascript">

           function soloLetras(e){
        key=e.keyCode || e.which;
        teclado=String.fromCharCode(key).toLowerCase();
        letras=" áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales="8-37-38-46-164";
        teclado_especial=false;
        for(var i in especiales){
            if(key==especiales[i]){
                teclado_especial=true;break;
            }
        }
        if(letras.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
        }

    </script>

</html>
