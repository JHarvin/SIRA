<?php
require_once"Conexion.php";
#--para mostrar datos

class MostrarUsuarios extends Conexion{
    
    public function vistaUsuarioModel($tabla){
        
        $stmt =Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
        $stmt->execute();
        return $stmt->fetchAll();
        
    }
    
}


?>