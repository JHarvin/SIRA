<?php 
#Archivo de modelo para hacer las consultas php
require_once"Conexion.php";
class PreciosModel{
    
    public function registrarPrecioModel($placa,$precio,$tabla){
        
        $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(numero_de_placa,precio) VALUES (:placa,:precio)");
        
        $stmt->bindParam(":placa",$placa,PDO::PARAM_STR);
        $stmt->bindParam(":precio",$precio,PDO::PARAM_STR);
       
        if($stmt->execute()){
            return "success";
        }
        else{ return "error";}
        
        $stmt->close();
        
        
    }
    public function actualizarPrecioModel($placa,$precio,$tabla){
         $stmt =Conexion::conectar()->prepare("UPDATE $tabla 
        SET precio=:precio WHERE numero_de_placa= :placa");
        
        $stmt->bindParam(":placa",$placa,PDO::PARAM_STR);
        $stmt->bindParam(":precio",$precio,PDO::PARAM_STR);
       // $stmt->bindParam(":tipo",$datosModel["tipo"],PDO::PARAM_STR);
         if($stmt->execute()){
            return "success";
        }
        else{ return "error";}
        
        $stmt->close();
    }
    #Funcion para ver si al vehiculo ya le pusieron precio
    public function obtenerPrecioModel($placa,$tabla){
        
         $stmt =Conexion::conectar()->prepare("SELECT  COUNT(*) as contador, precio FROM $tabla where numero_de_placa=:placa");
        $stmt->bindParam(":placa",$placa,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        
    }
    
}


?>