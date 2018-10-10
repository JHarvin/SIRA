<?php
require_once"Conexion.php";
#--para mostrar datos

class MostrarUsuarios extends Conexion{
    #MOSTRAR USUARIOS
    public function vistaUsuarioModel($tabla){
        
        $stmt =Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        
    }
    
    
    #BORRAR USUARIO MODEL
    public function borrarUsarioModel($id,$tabla){
        $stmt =Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idpersonal= :id");
        
          $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        
        
        if($stmt->execute()){
            return "success";
        }
        else{
            return "error";
        }
        $stmt->close();
        
    }
    #para inhabilitar
    public function inhabilitarModel($id,$tabla){
        $stado=0;
         $stmt =Conexion::conectar()->prepare("UPDATE $tabla SET status=:estado WHERE idpersonal= :id");
        
        $stmt->bindParam(":estado",$stado,PDO::PARAM_INT); 
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        
        
        
        if($stmt->execute()){
            return "success";
            
        }else{
            return "error";
        }
        $stmt->close();
    }
    
    #Para habilitar
        public function habilitarModel($id,$tabla){
        $stado=1;
         $stmt =Conexion::conectar()->prepare("UPDATE $tabla SET status=:estado WHERE idpersonal= :id");
        
        $stmt->bindParam(":estado",$stado,PDO::PARAM_INT); 
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        
        
        
        if($stmt->execute()){
            return "success";
            
        }else{
            return "error";
        }
        $stmt->close();
    }
}


?>