<?php 
require_once "Conexion.php";
class ModeloActualizar extends Conexion{
    
    public function actualizarDatosM($idD,$nombreD,$telefonoD,$direccionD,$usuario,$contraseña){
        
         $stmt =Conexion::conectar()->prepare("UPDATE tpersonal SET nombre=:nombre WHERE idpersonal=:id");
        
         $stmt->bindParam(":nombre",$nombreD,PDO::PARAM_STR);
       
        $stmt->bindParam(":id",$idD,PDO::PARAM_INT);
        
        return $stmt->execute();
             
         
      
        
        
        
    }
    
    
}




?>