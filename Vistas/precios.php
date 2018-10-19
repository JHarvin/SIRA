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

    <title>Precios alquiler</title>
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
<script src="../Vistas/js/preciosAjax.js"></script>
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
          <h1><i class="app-menu__icon fa fa-folder-open"  style="font-size:25px;color:orange"></i>Precios alquiler</h1>
          <p>Rent a Car Chacón </p>
        </div>
        
 </div>
       
       <div class="row">
      <div class="col-md-12">
         <!--contenedor de la tabla de vehiculos (principal vista)-->
          <div id="contenedorTabla" class="tile">
            
           
             	    
       
            <div class="table table-responsive" >
            <table id="tabla"  class="table display table-striped  " style="font-size:13.4px;">
              <thead>
                <tr>
                 
                  <th>NUMERO DE PLACA</th>
                  <th>MARCA,MODELO,AÑO</th>
                   <th>TIPO</th>
                  <th>COLOR</th>
                
                  <th>COMBUSTIBLE</th>
                  <th>Precio alquiler(mes)</th>
                 <th>Acciones</th>
                
                </tr>
              </thead>
              <tbody>
                <?php 
                  $mostrar=new RegistrarVehiculoController();
                  $mostrar->mostrarVehiculosPreciosController();
                  
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
       
       <!--modal para editar precio del auto si ya se ingreso por primera vez-->
      
  <div class="modal fade" id="modalPrecioEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center" style="background-color:#7f8be8;">
                <h4 class="modal-title w-100 font-weight-bold">Editar precio de alquiler</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            
            
            <div class="modal-body">
            
               
<form>
  <div id="rowM" class="form-row">
    
    
     <div class="form-group col-md-4">
    <label for="autoname">Auto</label>
    <input type="text" class="form-control" id="autoname" disabled>
  </div>
  <div class="form-group col-md-4">
    <label for="placarente">Placas del auto</label>
    <input type="text" class="form-control" id="placarent" disabled>
  </div>
  <div class="form-group col-md-4">
    <label for="precio">Cambie el precio de alquiler $</label>
    <input type="text" class="form-control" id="precio" autofocus placeholder="digite precio del auto">
  </div>
               
               
  </div>
 
  
  
  
</form>
              

            </div>
            <div class="modal-footer">
              <div class="form-group">
                  <button type="button" class="btn btn-primary" id="btnEditarPrecio" name="btnEditarPrecio">
               <i class="fa fa-check"></i>
               Actualizar precio</button>
       
                <button class="btn btn-info"><i class="fa fa-ban"></i>Cancelar</button>
              </div>
               
            </div>
        </div>
    </div>
</div>    
        
      
     
    
      
  <!--------------------------------------------------------->
   <!--Modal para agregar precio del carro por primera vez--> 
   <!-------------------------------------------------------------> 
    <div class="modal fade" id="modalPrecio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center" style="background-color:#7f8be8;">
                <h4 class="modal-title w-100 font-weight-bold">Precio por dia de alquiler</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            
            
            <div class="modal-body">
            
               
<form>
  <div id="rowM" class="form-row">
    
    
     <div class="form-group col-md-4">
    <label for="autoname">Auto</label>
    <input type="text" class="form-control" id="autoname" disabled>
  </div>
  <div class="form-group col-md-4">
    <label for="placarente">Placas del auto</label>
    <input type="text" class="form-control" id="placarent" name="placarent" disabled>
  </div>
  <div class="form-group col-md-4">
    <label for="precio">Digite precio $</label>
    <input type="text" class="form-control" id="precio" name="precio" autofocus placeholder="digite precio del auto">
  </div>
               
               
  </div>
 
  
  
  
</form>
              

            </div>
            <div class="modal-footer">
              <div class="form-group">
                  <button type="button" class="btn btn-primary" id="btnGuardarPrecio" name="btnGuardarPrecio">
               <i class="fa fa-check"></i>
               Guardar precio</button>
       
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
     
     <script src="../js/plugins/jquery.mask.min.js"></script>
    
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
    //--------pone los datos en el modal
        
        //---Funcion para detectar el clic y obtener los datos
      $("#tabla tbody tr").click(function() {
          //---se obtiene de la tabla la placa y nombre del vehiculo
 var placa=$(this).find("td:eq(0)").text();
  var nombre=$(this).find("td:eq(1)").text(); 
    //----obteniendo las imagenes de la tabla (td hidden) en caso seleccione ver-
          // -imagenes
          //--imagenes
        var  imagen=$(this).find("td:eq(8)").text();
          var imagen2=$(this).find("td:eq(9)").text();
          var imagen3=$(this).find("td:eq(10)").text();
          var imagen4=$(this).find("td:eq(11)").text();
          //---------------------------------------
          //---poniendo los datos en los inputs del modal de eliminar en caso seleccione eliminar
          
         
        
         
          
          
          //--Poniendo el nombre y placa del vehiculo en el modal de editarprecio
          
           $("#placarent").val(placa);
        $("#autoname").val(nombre);
          
            
      });
        
    </script>
     
    <script>
        //--mascara para poner precio del auto
    $('#precio').mask('000.000.000.000.000,00', {reverse: true});
    </script>
     
     <script>
         
    //Para agregar precios
          $(document).ready(function(){
            
            $("#btnGuardarPrecio").click(function(){
                var placa=$("#placarent").val();
                var precio=$("#precio").val();
            addprecio(precio,placa);
                
            });
            
        });
    </script>
     
    <script>
        //Se usan los mismos nombres que el modal de agregar precios por primera vez
    //Para editar precios
          $(document).ready(function(){
            
            $("#btnEditarPrecio").click(function(){
                var placa=$("#placarent").val();
                var precio=$("#precio").val();
            updateprecio(precio,placa);
                
            });
            
        });
    </script>
   
    
   
    <script>
    alertify.set('notifier','position', 'top-right');
    </script>
    </body>
</html>