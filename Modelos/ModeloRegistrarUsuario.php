<?php 
#--Iniciado por Harvin Ramos----
#-----------------------------------
#---Clase y funcion para guardar los datos del registro
require_once "Conexion.php";

class Datos extends Conexion{
    #---Esta funcion recibira del controlodor para guardarlo a la bd
    #---------------------------------------------------------------
    public function registroUsuarioModel($datosModel, $tabla){
        
        
        $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, telefono, direccion, username, password, genero) VALUES (
        :nombre,:telefono,:direccion,:username,:password,:genero
        )");
        
        $stmt->bindParam(":nombre",$datosModel["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":telefono",$datosModel["telefono"],PDO::PARAM_STR);
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