<?php
require_once"Conexion.php";
class MantenimientoModel extends Conexion{
    public function guardarKmModel($datosModel,$tabla){
          $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(numero_de_placa,fecha,tipomantenimiento,status) VALUES (
        :placa,:fecha,:tipo,1)");
        
        $stmt->bindParam(":placa",$datosModel["placa"],PDO::PARAM_STR);
        $stmt->bindParam(":fecha",$datosModel["fecha"],PDO::PARAM_STR);
        $stmt->bindParam(":tipo",$datosModel["tipomantenimiento"],PDO::PARAM_STR);
        
        
        if($stmt->execute()){
            return 1;
        }
        else{ return 0;}
        
        $stmt->close();
    }
    
    public function guardarRevisionModel($datosModel,$tabla){
         $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(fechasalida,encargadoservicio,servicio,numero_de_placa,status) VALUES (
        :fechafin,:encargadoservicio,:servicio,:placa,1)");
        
        $stmt->bindParam(":placa",$datosModel["placa"],PDO::PARAM_STR);
        $stmt->bindParam(":fechafin",$datosModel["fechaFin"],PDO::PARAM_STR);
        $stmt->bindParam(":encargadoservicio",$datosModel["encargado"],PDO::PARAM_STR);
        $stmt->bindParam(":servicio",$datosModel["encargado"],PDO::PARAM_STR);
        
        
        if($stmt->execute()){
            return 1;
        }
        else{ return 0;}
        
        $stmt->close();
        
    }
}