<?php 


require_once"../Controladores/ControladorRegistrarBaterias.php";
require_once"../Controladores/ControladorRegistrarProveedor.php";
session_start();
if(!$_SESSION["validar"]){
    

    header("location:../index.php");
    exit();
}

if(isset($_GET["ok"]) && !empty($_GET["ok"])){
    
    echo'
    <script>
    alertify.success("Registro Actualizado ");
    </script>
    ';
    
}

?>
<html lang="es">
 <head>
 <title>Baterias Disponibles</title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- libreria para notificaciones toast-->
    <link rel="stylesheet" href="../css/toastr.css">
    <script src="../js/toastr.js"></script>
    <!-- efectos del input buscar-->
    <link rel="stylesheet" href="../css/buscarInput.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/alertify.min.css">
    <link rel="stylesheet" href="../css/datatables.min.css">
    <script src="../js/alertify.min.js"></script>
<script src="../Vistas/js/validarRegistro.js"></script>

<script type="text/javascript">
//override defaults
alertify.defaults.transition = "slide";
alertify.defaults.theme.ok = "btn btn-primary";
alertify.defaults.theme.cancel = "btn btn-danger";
alertify.defaults.theme.input = "form-control";
</script>
<script>
  //----------funcion ajax
    function eliminar(idE){
        var datos=new FormData();
    datos.append("idb",idE);
        
        
         $.ajax({
        
        type: "POST",
        url: "../Controladores/ControladorAjaxEliminar.php",
        data: datos,
        cache:false,
        contentType:false,
        processData:false,
        
        success:function(r){
         

        if(r==1){
        
           // $(".table").load("../Vistas/usuarios.php");
            toastr.success("Eliminado");
    }
          else if(r!=1){
           
              alert("diferente "+r);
              
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
      include"menuVentas.php";
      ?>
 <main class="app-content">

 <div class="app-title">
        <div>
          <h1><i class="app-menu__icon fa fa-folder-open"  style="font-size:25px;color:orange"></i> Baterias Disponibles</h1>
          <p>Rent a Car Chacón </p>
        </div>
        
 </div>

     

    <div class="row">   
       
        <div class="col-md-12">
          <div class="tile">
            
            <h3 class="tile-title"></h3>
            <div class="table table-responsive">
            <table id="tabla"  class="table table-striped">
              <thead>
                <tr>
               <th>Tipo</th>
                  <th>Código</th>
                  <th>Proveedor</th>
                   <th>Precio unitario($)</th>
                  <th>Precio venta($)</th>
                  <th>Fecha venta</th>
                  
                   <th hidden></th>
              </tr>
              </thead>
              <tbody>
                  <?php 
                   
                  $proveedor=new RegistrarBateriasController();
                  $proveedor->mostrarBaterias();
                  
                  ?>
              </tbody>
            </table>
          
       </div>
          </div>
        </div>
        
        
        
      </div>




</main>



<script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    
    <script src="../js/jquery.quicksearch2.2.1.js" ></script>
    <script src="../js/jquery.maskedinput.min.js"></script>
    <script src="../js/datatables.min.js"></script>
     
     <script>
  
      $(document).ready(function() {
          //---para data tables codigo
    $('#tabla').DataTable( {
        
        
        "lengthMenu": [[4, 10, 50, -1], [4, 10, 50, "All"]],
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
     
     
      <script type="text/javascript">
      
 jQuery(function($){
            // Definimos las mascaras para cada input, se valida automaticamente
            
            $("#updateTelefono").mask("9999-9999");
            
        });
          
        
    </script>
    
    
    <script>
     function alerta(){
        toastr.success("Usuario Guardado");

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
  var id=$(this).find("td:eq(6)").text(); 
           
          
          //---poniendo los datos en los inputs del modal
          
         
        
          $("#nombreU").text(nombre+"?");
          $("#idDelete").text(id);
  
});
    </script>
    
    
    
    <script>
    
        $(document).ready(function(){
            
            $("#btnEliminar").click(function(){
                
                var idEliminar=$("#idDelete").text();
            eliminar(idEliminar);
                
            });
            
        });
        
    </script>
     
</body>
</html>
