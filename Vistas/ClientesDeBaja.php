<?php 
require_once"../Controladores/ControladorClientesInactivos.php";
?>
<html lang="es">
<head>

    <title>Clientes registrados</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- libreria para notificaciones toast-->
    <link rel="stylesheet" href="../css/toastr.css">
    <!-- efectos del input buscar-->
    <link rel="stylesheet" href="../css/buscarInput.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/alertify.min.css">
    <script src="../js/alertify.min.js"></script>
    <script src="../Vistas/js/validarRegistro.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/datatables.min.css">
    <link rel="stylesheet" href="../css/datatables.min.css">
<script type="text/javascript">
//override defaults
alertify.defaults.transition = "slide";
alertify.defaults.theme.ok = "btn btn-primary";
alertify.defaults.theme.cancel = "btn btn-danger";
alertify.defaults.theme.input = "form-control";
</script>
<script>
//----------funcion ajax
function inhabilitar(idE){
        var datos=new FormData();
    datos.append("dui",idE);
        
         $.ajax({
        
        type: "POST",
        url: "ajaxhabilitarcliente.php",
        data: datos,
        cache:false,
        contentType:false,
        processData:false,
        
        success:function(r){
         

        if(r==1){
        
           $("#tabla").load("clientesDeBaja.php #tabla > *");
            alertify.success("cliente inhabilitado");
            
    }
          else if(r!=1){
           
              alertify.error("Algo salio mal"+r);
              
          }
            else{
              //  $("#table").load();
                
                alert("Error -> "+r  );}
        
    }
        
        
    });
        
    }
     
    
    </script>

</head>      
<body class="app sidebar-mini rtl">
     <?php 
    include"menu.php";
    ?>
      <main class="app-content">
       <div class="app-title">
        <div>
          <h1><i class="fa fa-credit-card"></i> Clientes registrados</h1>
          
        </div>
        
      </div>
       
       <div class="row">
      <div class="col-md-12">

          <div class="tile">
            
            <h3 class="tile-title">Clientes</h3>
             
            <div class="table table-responsive">
            <table id="tabla"  class="table table-striped">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Teléfono</th>
                   <th>Dirección</th>
                  <th>DUI</th>
                  <th>Licencia de conducir</th>
                  <th>estado</th>
                <th>Acciones</th> 
                 
                 
                </tr>
              </thead>
              <tbody>
              
              <?php 
                  #AQUI SE LLAMA LA FUNCION PARA MOSTRAR LOS DATOS
                  $mostrar1=new ClientesController();
                  $mostrar1->mostrarCliente1();
                 
                  
                  ?>
              
              </tbody>
            </table>
            </div>
          </div>
        </div>
        
        
        
      </div>
      </main>

            <div class="modal" id="modalValidar">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
    
      
   <!-- Modal Header -->
   <div class="modal-header">
        <h4 class="modal-title">Inahabilitar</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>



      <!-- Modal body -->
      <div class="modal-body">
      <p>cliente anterior. </p>
      <div class="row">
                 <div> 
                 <img src="../images/pregunta.png" alt="">
                 </div>
                 
              <label for="nombre" style="font-size:16px;">¿Desea Inahabilitar a :  </label>
                <b><p id="nombre" style="font-size:16px;"></p></b>
          
    
                 <input id="idDelete" name="idDelete" type="text" >
                </div>
       </div>
          
          
          
     
      <!-- Modal footer -->
      <div class="modal-footer">

      
      <button id="btnInhabilitar" name="btnInhabilitar" class="btn btn-info" data-dismiss="modal"><i class="fa fa-arrow-alt-circle-down"></i> Inahabilitar</button>

     
        
        <button type="button" class="btn btn-danger" data-dismiss="modal">
        <i class="fa fa-undo"></i>Cancelar</button>
      </div>

    </div>
  </div>
  </div>

    
        <!-- fin modal datos de los cleintes --> 
 
      <!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/jquery.quicksearch2.2.1.js" ></script>
     <script src="../js/datatables.min.js"></script>
    
    
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
     function alerta(){
        toastr.success("Cliente Guardado");

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
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
    
    
<!--escript para buscar en la tabla-->
    <script>
      $(function () {

  $('#search').quicksearch('table tbody tr');								
});
    </script>
    
    <script>
    //---Funcion para detectar el clic y obtener los datos
      $("table tbody tr").click(function() {
          //---se obtiene el indice de la tabla
 var nombre=$(this).find("td:eq(0)").text();
  var id=$(this).find("td:eq(3)").text(); 
           
          
          //---poniendo los datos en los inputs del modal
            
          $("#nombre").text(nombre+"?");
          $("#idDelete").val(id);
  
});
    </script>
    
    
    
    <script>
    
        $(document).ready(function(){
            
            $("#btnEliminar").click(function(){
                
                
                
            });
            
        });
        
    </script>
    
    <script>
    //accion para inhabilitar usuario
        $(document).ready(function(){
            
            $("#btnInhabilitar").click(function(){
                
                var idEliminar=$("#idDelete").val();
            inhabilitar(idEliminar);
                
            });
            
        });
        
    </script>
    </body>
</html>