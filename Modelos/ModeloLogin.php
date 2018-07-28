<?php 
require_once "Conexion.php";
Class LoginModel extends Conexion{
    #---Esta funcion verifica los datos recibidos de la vista del login
    #---------------------------------------------------------------
    public function verificar($datosModelLogin, $tabla){
        
        
        $stmt =Conexion::conectar()->prepare("SELECT username,password FROM $tabla WHERE username= :usuarioLog and password =:usuarioPass");
        
        $stmt->bindParam(":usuarioLog",$datosModelLogin["usuarioLog"],PDO::PARAM_STR);
        $stmt->bindParam(":usuarioPass",$datosModelLogin["usuarioPass"],PDO::PARAM_STR);
        
        $stmt->execute();
            
        return $stmt->fetch();
    
        
       
        
        
    }
}


?>