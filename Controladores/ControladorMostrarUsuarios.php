<?php 
require_once "../Modelos/MostrarModel.php";
class MostrarUsuariosController{
    
    #Para mostrar usuarios desabilitados
    #------------------------------------
    public function vistaUsuariosDesController(){
        $respuesta=MostrarUsuarios::vistaUsuarioModel("tpersonal");
          foreach($respuesta as $row =>$item){
        if($item["status"]==0){
          echo'
        
        <tr>
                  <td>'.$item["nombre"].'</td>
                  <td>'.$item["telefono"].'</td>
                  <td>'.$item["direccion"].'</td>
                  <td>'.$item["email"].'</td>
                  <td>'.$item["username"].'</td>
                  <td>Deshabilitado</td>
                 
                
                  <td>
                  <div class="btn-group" role="group">
                  <a href="actualizarDatosUsuario.php?id='.$item["idpersonal"].'" id="btnEditar" name="btnEditar" class="btn btn-info"   ><i class="fa fa-edit"></i></a>

                  <a href="#"  class="btn btn-danger" data-toggle="modal" data-target="#modalValidar" ><i class="fa fa-arrow-circle-up"></i></a>

                 
                  </div>
                  </td>
                 <td hidden>'.$item["idpersonal"].'</td>
                </tr>
        
        ';

        }
            
        
        }
    }
    
    
    #Para mostrar usuarios habilitados
    #---------------------------------
    public function vistaUsuariosController(){
        
        $respuesta=MostrarUsuarios::vistaUsuarioModel("tpersonal");
        
        foreach($respuesta as $row =>$item){
        if($item["status"]==1){
          echo'
        
        <tr>
                  <td>'.$item["nombre"].'</td>
                  <td>'.$item["telefono"].'</td>
                  <td>'.$item["direccion"].'</td>
                  <td>'.$item["email"].'</td>
                  <td>'.$item["username"].'</td>
                  <td>Habilitado</td>
                 
                
                  <td>
                  <div class="btn-group" role="group">
                  <a href="actualizarDatosUsuario.php?id='.$item["idpersonal"].'" id="btnEditar" name="btnEditar" class="btn btn-info"   ><i class="fa fa-edit"></i></a>

                  <a href="#"  class="btn btn-danger" data-toggle="modal" data-target="#modalValidar" ><i class="fa fa-arrow-circle-down"></i></a>

                 
                  </div>
                  </td>
                 <td hidden>'.$item["idpersonal"].'</td>
                </tr>
        
        ';

        }
            
        
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
    
    #para inabilitar
    public function inhabilitarController($id){
         
        $respuesta=MostrarUsuarios::inhabilitarModel($id,"tpersonal");
        
        if($respuesta=="success"){
            return "success";
            
        }else { return "error";}
        
    }
    #para habilitar
    public function habilitarController($id){
         $respuesta=MostrarUsuarios::habilitarModel($id,"tpersonal");
        
        if($respuesta=="success"){
            return "success";
            
        }else { return "error";}
    }
    
    
}


?>