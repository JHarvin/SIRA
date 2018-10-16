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
        SET numero_de_placa=:placa,marca=:marca,tipo=:tipo, 
        color=:color,numerochasis=:chasis,numeromotor=:nmotor WHERE numero_de_placa= :placa");
        
        $stmt->bindParam(":placa",$datosModel["placa"],PDO::PARAM_STR);
        $stmt->bindParam(":marca",$datosModel["marca"],PDO::PARAM_STR);
        $stmt->bindParam(":tipo",$datosModel["tipo"],PDO::PARAM_STR);
    }
    public function mostrarPreciosModel(){}
    
}


?>