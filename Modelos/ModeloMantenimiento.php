<?php
require_once"Conexion.php";
class MantenimientoModel extends Conexion{
    public function guardarKmModel($datosModel,$tabla){
          $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(numero_de_placa,fecha,tipomantenimiento) VALUES (
        :placa,:fecha,:tipo)");
        
        $stmt->bindParam(":placa",$datosModel["placa"],PDO::PARAM_STR);
        $stmt->bindParam(":fecha",$datosModel["fecha"],PDO::PARAM_STR);
        $stmt->bindParam(":tipo",$datosModel["tipomantenimiento"],PDO::PARAM_STR);
        
        
        if($stmt->execute()){
            return 1;
        }
        else{ return 0;}
        
        $stmt->close();
    }
}