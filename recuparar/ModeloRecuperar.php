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
    
    public function actualizarPassword(){
        
    }
}