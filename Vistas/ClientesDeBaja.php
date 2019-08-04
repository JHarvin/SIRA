<?php 
require_once"../Controladores/ControladorClientesInactivos.php";
session_start();
if(!$_SESSION["validar"]){
    

    header("location:../index.php");
    exit();
}
?>
<html lang="es">
<head>

    <title>Clientes Inhabilitados</title>
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
        
           
            alertify.success("Cliente habilitado");
            setTimeout(function () {location . reload();}, 900);

            
    }
          else if(r!=1){
           
              alertify.success("Cliente habilitado");
              setTimeout(function () {location . reload();}, 900);

              
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
      <main class="app-content" style="background-color:#788499;">
       <div class="app-title">
        <div>
          <h1><i class="app-menu__icon fa fa-address-card-o"  style="font-size:25px;color:#788499;
"></i>  Clientes inhabilitados</h1>
          <p>Rent a Car Chacón </p>
        </div>
                              
 </div>
       
       <div class="row">
      <div class="col-md-12">

          <div class="tile">
            
             
            <div class="table table-responsive">
            <table id="tabla"  class="table table-striped">
              <thead>
                <tr>
                  <th>NOMBRE</th>
                  <th>TELEFONO</th>
                   <th>DIRECCION</th>
                  <th>DUI</th>
                  <th>LICENCIA DE CONDUCIR</th>
                  <th>ESTADO</th>
                <th>ACCIONES</th> 
                 
                 
                </tr>
              </thead>
              <tbody id="tcuerpo">
              
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
   <div class="modal-header" style="background-color:#788499;
 color:white;">
        <h4 class="modal-title">Habilitar</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>



      <!-- Modal body -->
      <div class="modal-body">
      
      <div class="row">
                 <div class="col-md-6"> 
                 <label for="nombre" style="font-size:16px;">¿Desea habilitar a  :  </label>
                <b><p id="nombre" style="font-size:16px;"></p></b>
                <input id="idDelete" name="idDelete" type="hidden" >
    
                 </div>
              <div class="col-md-6">
              <li class="fa fa-question-circle fa-5x" style="color:#0F6099;
"></li>
              </div>
                 
                
       </div>
          
          
          
     
      <!-- Modal footer -->
      <div class="modal-footer">

      
      <button id="btnInhabilitar" name="btnInhabilitar" class="btn btn-info" data-dismiss="modal"><i class="fa fa-arrow-circle-up"></i>Habilitar</button>

     
        
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
     <script>
    alertify.set('notifier','position', 'top-left');
    </script>
    </body>
</html>