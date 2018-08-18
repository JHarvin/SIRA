<?php 

require_once "../Controladores/ControladorMostrarUsuarios.php";

?>
!DOCTYPE html>
<html lang="es">
<head>

    <title>Registrar usuarios</title>
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
<script src="../Vistas/js/validarRegistro.js"></script>
</head>      
<body class="app sidebar-mini rtl">
     <?php 
    include"menu.php";
    ?>
      <main class="app-content">
       
       
       <div class="row">
      <div class="col-md-12">
          <div class="tile">
            
            <h3 class="tile-title">Usuarios Registrados</h3>
             <div class="box input-group" style="margin-left:25px;">
             
  <div class="container-2">
      <i class="glyphicon glyphicon-search"></i>
        <input  type="search" id="search" />
           </div>
        </div>
            
          
          
        
            <table id="table"  class="table table-striped">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Telefono</th>
                   <th>Dirección</th>
                  <th>Nombre de usuario</th>
                  <th>Contraseña</th>
                  <th>Acción</th>
                 
                </tr>
              </thead>
              <tbody>
               
               <?php 
                  #--Llamamos al controlador antes instanciando la clase
                  $mostrar=new MostrarUsuariosController();
                  $mostrar->vistaUsuariosController();
                  
                  ?>
               
                 
                
              </tbody>
            </table>
          </div>
        </div>
        
        
        
      </div>
      </main>
      
      <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn close" data-dismiss="modal"></button>
        <h4 class="modal-title">Modificar Username</h4>
      </div>
      <div class="modal-body">
        <p>Username anterior. </p>
        
         <div class="form-group">
                  <label class="control-label">Usuario</label>
                  <input class="form-control" type="text" placeholder="Nombre de usuario nuevo">
                </div>
      </div>
      <div class="modal-footer">
       <button class="btn btn-primary" type="button" onclick="return alerta();"><i class="fa fa-fw fa-lg fa-check-circle"></i>Actualizar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar y retroceder</button>
      </div>
    </div>

  </div>
</div>
     
      
      <!-- modal para modificar los datos de los usuarios -->
       
       <div class="modal" id="datosUsuario">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Actualizar Datos de Usuario </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      
       
                  <div class="row mb-4">
                    <div class="col-md-4">
                      <label>Nombre Completo</label>
                      <input id="updateNombre" name="updateNombre" class="form-control" type="text">
                    </div>
                    <div class="col-md-4">
                      <label>Telefono</label>
                      <input id="updateTelefono" name="updateTelefono" class="form-control" type="text">
                    </div>
                     <div class="col-md-4">
                      <label>Email</label>
                      <input id="updateEmail" name="updateEmail" class="form-control" type="email">
                    </div>
                  </div>
                  <div class="row">
                   
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                      <label>Dirección</label>
                      <input id="updateDireccion" name="updateDireccion" class="form-control" type="text">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-4">
                      <label>Nombre de Usuario</label>
                      <input id="updateUsername" name="updateUsername" class="form-control" type="text">
                    </div>
                    
                    <div class="col-md-4">
                      <label>Contraseña</label>
                      <input id="updatePass" name="updatePass" class="form-control" type="password" placeholder="Escriba la nueva contraseña" required>
                    </div>
                  </div>
                 <input id="id" name="id" type="hidden" >
                
       
         
            
              
          </div>
          
          
          
     
      <!-- Modal footer -->
      <div class="modal-footer">
        <button id="btnGuardarNuevo" name="btnGuardarNuevo" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i> Actualizar</button>
        |
        <button type="button" class="btn btn-info" data-dismiss="modal">
        <i class="fa fa-undo"></i> Atras</button>
      </div>

    </div>
  </div>
</div>
       
        <!-- fin modal datos de los usuarios -->
          
      
      <!-- Essential javascripts for application to work-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/toastr.js"></script>
    <script src="../js/jquery.quicksearch2.2.1.js" ></script>
    <script src="../js/jquery.maskedinput.min.js"></script>
    
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
  var nombre = $(this).find("td:eq(0)").text();
  var telefono=$(this).find("td:eq(1)").text();
  var direccion=$(this).find("td:eq(2)").text();
  var usuario=$(this).find("td:eq(3)").text();  
  var id=$(this).find("td:eq(6)").text(); 
          
          //---poniendo los datos en los inputs del modal
          
          $('#updateNombre').val(nombre);
          $('#updateTelefono').val(telefono);
          $('#updateDireccion').val(direccion);
          $('#updateUsername').val(usuario);
          $('#id').val(id);
          //--falta la accion para actualizar email
          $("#updateEmail").val("falta este item");
  
});
    </script>
    
    <script type="text/javascript">
    $(document).ready(function(){
        
        $('#btnGuardarNuevo').click(function(){
            //---se obtienen los datos del modal
            ///---alert("entra al boton");
            
            nombreUpdate=$('#updateNombre').val();
            telefonoUpdate=$('#updateTelefono').val();
            direccionUpdate=$('#updateDireccion').val();
            userUpdate=$('#updateUsername').val();
            passUpdate=$('#updatePass').val();
            idUpdate=$('#id').val();
            //---luego se llama la funcion que esta en Vistas/js/validarRegistro.js
           actualizar(idUpdate,nombreUpdate,telefonoUpdate,direccionUpdate,userUpdate,passUpdate);
        });
    });
    
    </script>
    
    
    </body>
</html>