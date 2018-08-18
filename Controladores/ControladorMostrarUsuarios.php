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
                  <button class="btn btn-danger" data-toggle="modal" data-target="#datosUsuario"><i class="fa fa-trash-o"></i></button>
                  </td>
                 
                </tr>
        
        ';
        }
    }
    
    
}


?>