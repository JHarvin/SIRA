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
    
     #Para ingresar el kilometraje del vehiculo
    public function ingresarKiloMesesModel($datosModel,$tabla){
         $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(cada_cuantos_meses_revision, cada_cuantos_kilometros, numero_de_placa) VALUES (:meses,:km,:placa)");
        
        $stmt->bindParam(":placa",$datosModel["placa"],PDO::PARAM_STR);
        $stmt->bindParam(":km",$datosModel["km"],PDO::PARAM_STR);
        $stmt->bindParam(":meses",$datosModel["meses"],PDO::PARAM_INT);
        
        if($stmt->execute()){
            return "success";
            
        }else{
            return "error";
        }
        $stmt->close();
        
    }
    
    #Funcion para ver los datos de fechas de la revision del vehiculo
    public function verHistorialFechaModel($placa){
         $stmt=Conexion::conectar()->prepare("SELECT DISTINCT tmantenimiento.fecha as entrada,trevision.fechasalida as salida FROM tmantenimiento,trevision WHERE tmantenimiento.numero_de_placa=:placa");
         $stmt->bindParam(":placa",$placa,PDO::PARAM_STR);
         $stmt->execute();
         return $stmt->fetch();
         $stmt->close();
    }
}