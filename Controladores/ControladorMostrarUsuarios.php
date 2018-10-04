<?php 
require_once "../Modelos/MostrarModel.php";
class MostrarUsuariosController{
    
    public function vistaUsuariosController(){
        
        $respuesta=MostrarUsuarios::vistaUsuarioModel("tpersonal");
        
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
                  <a href="actualizarDatosUsuario.php?id='.$item["idpersonal"].'" id="btnEditar" name="btnEditar" class="btn btn-info"   ><i class="fa fa-edit"></i></a>
<<<<<<< HEAD
                  <a href="#"  class="btn btn-danger" data-toggle="modal" data-target="#modalValidar" ><i class="fa fa-arrow-circle-down"></i></a>
=======
                  <a href="#"  class="btn btn-danger" data-toggle="modal" data-target="#modalValidar" ><i class="fa fa-arrow-alt-circle-down"></i></a>
>>>>>>> ac62dec2b29617f60c6acf306fabc6496caaa808
                  </div>
                  </td>
                 <td hidden>'.$item["idpersonal"].'</td>
                </tr>
        
        ';
        }
    }
    
    
     #BORRAR USUARIOS
    #------------------------------
    public function borrarUsuarioController(){
        if(isset($_GET["idb"])){
            
            
            
            
            $idController=$_GET["idb"];
            
            $respuesta=MostrarUsuarios::borrarUsarioModel($idController,"tpersonal");
            
            if($respuesta=="success"){
                  echo '
                
               <script>
                alertify.set("notifier","position", "top-center");
               alertify.success("Usuario Eliminado");
               </script>
                
                
                ';
                
            }
            else{
                  echo '
                
               <script>
                alertify.set("notifier","position", "top-center");
               alertify.error("Error al borrar en el servidor");
               </script>
                
                
                ';
            }
        }
    }
    
    
}


?>