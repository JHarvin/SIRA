<?php 
#--Iniciado por Harvin Ramos----
#-----------------------------------
#---Clase y funcion para guardar los datos del registro
require_once "Conexion.php";

class Datos extends Conexion{

    #_____________________________________________
    #Funciones para validar repetidos
    #______________________________________________
    #Funcion para validar dui que no se repita
    public function validarusuario($username,$tabla){
        $stmt=Conexion::conectar()->prepare("SELECT count(*) as total from $tabla where username=:username");
         $stmt->bindParam(":username",$username,PDO::PARAM_STR);
        $stmt->execute();
        
        if($stmt->fetchColumn()>0){
            return "error";
        }else{
            return "success";
        }
    }
    #Funcion para validar licencia
    public function validarcorreo($correo,$tabla){
        $stmt=Conexion::conectar()->prepare("SELECT count(*) as total from $tabla where correo=:email");
         $stmt->bindParam(":email",$correo,PDO::PARAM_STR);
        $stmt->execute();
        
        if($stmt->fetchColumn()>0){
            return "error";
        }else{
            return "success";
        }
    }
    #---Esta funcion recibira del controlodor para guardarlo a la bd
    #---------------------------------------------------------------
    public function registroUsuarioModel($datosModel, $tabla){
        
        
        $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, telefono, direccion, username, password, genero,status,email) VALUES (
        :nombre,:telefono,:direccion,:username,:password,:genero,1,:email)");
        
        $stmt->bindParam(":nombre",$datosModel["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":telefono",$datosModel["telefono"],PDO::PARAM_STR);
        $stmt->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
        $stmt->bindParam(":direccion",$datosModel["direccion"],PDO::PARAM_STR);
        $stmt->bindParam(":username",$datosModel["username"],PDO::PARAM_STR);
        $stmt->bindParam(":password",$datosModel["password"],PDO::PARAM_STR);
        $stmt->bindParam(":genero",$datosModel["genero"],PDO::PARAM_STR);

        
        if($stmt->execute()){
            return "success";
        }
        else{ return "error";}
        
        $stmt->close();
    }
}


?>