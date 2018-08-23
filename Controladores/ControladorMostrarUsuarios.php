<?php 
require_once "../Modelos/MostrarModel.php";
class MostrarUsuariosController{
    
    public function vistaUsuariosController(){
        
        $respuesta=MostrarUsuarios::vistaUsuarioModel("tpersonal");
        
        foreach($respuesta as $row =>$item){
        
        echo'
        
        <tr>
                  <td>'.$item["nombre"].'</td>
                  <td>'.$item["telefono"].'
                  
                  </td>
                  <td>'.$item["direccion"].'</td>
                  <td>'.$item["username"].'</td>
                  <td>Si</td>
                  
                  <td><a href="actualizarDatosUsuario.php?id='.$item["idpersonal"].'" id="btnEditar" name="btnEditar" class="btn btn-info"   ><i class="fa fa-edit"></i></a>
                  <a href="#"  class="btn btn-danger" data-toggle="modal" data-target="#modalValidar" ><i class="fa fa-trash-o"></i></a>
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