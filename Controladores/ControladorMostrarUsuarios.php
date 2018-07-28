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
                  <td><button class="btn btn-info" data-toggle="modal" data-target="#myModal">Editar</button></td>
                </tr>
        
        ';
        }
    }
    
    
}


?>