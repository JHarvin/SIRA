<?php
require_once"../Modelos/Conexion.php";
class RecuperarPassword extends Conexion{
    
    public function verificarMail($email){
        
            
        $stmt=Conexion::conectar()->prepare("SELECT count(*) from tpersonal where email=:email");
        $stmt->bindParam(":email",$email,PDO::PARAM_STR);
        $stmt->execute();
        
        if($stmt->fetchColumn()>0){
            return "success";
        }else{
            return "error";
        }
        
       
    }
    
    public function obtenerId($email){
         $stmt=Conexion::conectar()->prepare("SELECT idpersonal,nombre from tpersonal where email=:email");
        $stmt->bindParam(":email",$email,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        
    }
    
    public function actualizarPassword($id,$password){
        $stmt =Conexion::conectar()->prepare("UPDATE tpersonal 
        SET password=:password WHERE idpersonal=:id");
        
        $stmt->bindParam(":password",$password,PDO::PARAM_STR);
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
       
      
       
         if($stmt->execute()){
            return "success";
            
        }else{
            return "error";
        }
        $stmt->close();
    }
}