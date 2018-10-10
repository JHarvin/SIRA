<?php
require_once"Conexion.php";
#--para mostrar datos

class mostrarmodelina extends Conexion{
    #MOSTRAR USUARIOS
    public function vistaUsuarioModel1($tabla){
        
        $stmt =Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        
    }
    
    
    #BORRAR USUARIO MODEL
    public function borrarUsarioModel($id,$tabla){
        $stmt =Conexion::conectar()->prepare("udpate FROM $tabla WHERE idpersonal= :id");
        
          $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        
        
        if($stmt->execute()){
            return "success";
        }
        else{
            return "error";
        }
        $stmt->close();
        
    }
}


?>