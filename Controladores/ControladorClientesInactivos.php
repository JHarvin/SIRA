<?php 
require_once "../Modelos/mostrarmodelina.php";
class controladorClientesInactivos{
    
    public function vistaClientesControllerina(){
        
        $respuesta= mostrarmodelina::vistaClienteModel1("tclientes where status=0");
        
        foreach($respuesta as $row =>$item){
        if($item["status"]==1){
          $habilitado="Activo";

        }else{$habilitado="Inactivo";}
        echo'
        
        <tr>
                  <td>'.$item["nombre"].'</td>
                  <td>'.$item["telefono"].'
                  
                  </td>
                  <td>'.$item["direccion"].'</td>
                  <td>'.$item["email"].'</td>
                  <td>'.$item["username"].'</td>
                  <td>'.$habilitado.'</td>
                 
                
                  <td>
                  <div class="btn-group" role="group">
                  <a href="ModificarClientes.php?id='.$item["dui"].'" id="btnEditar" name="btnEditar" class="btn btn-info"   ><i class="fa fa-edit"></i></a>
                  <a href="#"  class="btn btn-danger" data-toggle="modal" data-target="#modalValidar" ><i class="fa fa-arrow-circle-up"></i></a>
                

                  </div>
                  </td>
                 <td hidden>'.$item["dui"].'</td>
                </tr>
        
        ';
        }
    }
    
    
     #BORRAR CLIENTES
    #------------------------------
    public function BorrarClienteController(){
        if(isset($_GET["idb"])){
            
            
            
            
            $duiController=$_GET["idb"];
            
            $respuesta=MostrarUsuarios::BorrarClienteModel($duiController,"tclientes");
            
            if($respuesta=="success"){
                  echo '
                
               <script>
                alertify.set("notifier","position", "top-center");
               alertify.success("Usuario habilitado");
               </script>
                
                
                ';
                
            }
            else{
                  echo '
                
               <script>
                alertify.set("notifier","position", "top-center");
               alertify.error("Error al inabilitar el usuario");
               </script>
                
                
                ';
            }
        }
    }
    
    
}

