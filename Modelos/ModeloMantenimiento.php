<?php
require_once"Conexion.php";
class MantenimientoModel extends Conexion{

    public function verificarTiempo($datosModel,$tabla){
        $stmt = Conexion::conectar()->prepare("SELECT count(*) as total from $tabla where numero_de_placa=:placa");
$stmt->bindParam(":placa", $datosModel["placa"], PDO::PARAM_STR);
$stmt->execute();

if ($stmt->fetchColumn() > 0) {
    return "success";
} else {
    return "error";
}

    }

    public function updateKiloMesesModel($datosModel,$tabla){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla
        SET cada_cuantos_meses_revision=:meses WHERE numero_de_placa= :placa");

$stmt->bindParam(":placa", $datosModel["placa"], PDO::PARAM_STR);

$stmt->bindParam(":meses", $datosModel["meses"], PDO::PARAM_INT);

// $stmt->bindParam(":tipo",$datosModel["tipo"],PDO::PARAM_STR);
if ($stmt->execute()) {
    return "success";
} else {return "error";}

$stmt->close();

    }

    public function guardarKmModel($datosModel,$tabla){
          $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(numero_de_placa,fecha,tipomantenimiento,status) VALUES (
        :placa,:fecha,:tipo,0)");
        
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
        :fechafin,:encargadoservicio,:servicio,:placa,0)");
        
        $stmt->bindParam(":placa",$datosModel["placa"],PDO::PARAM_STR);
        $stmt->bindParam(":fechafin",$datosModel["fechaFin"],PDO::PARAM_STR);
        $stmt->bindParam(":encargadoservicio",$datosModel["encargado"],PDO::PARAM_STR);
        $stmt->bindParam(":servicio",$datosModel["servicio"],PDO::PARAM_STR);
        
        
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
    public function verHistorialModel($placa){
         $stmt=Conexion::conectar()->prepare("SELECT DISTINCTROW mantenimiento.fecha as entrada, revision.fechasalida as salida  FROM tmantenimiento mantenimiento INNER JOIN trevision revision
ON mantenimiento.numero_de_placa=:placa AND revision.numero_de_placa=:placa and mantenimiento.id=revision.idrevision

");
         $stmt->bindParam(":placa",$placa,PDO::PARAM_STR);
         $stmt->execute();
         return $stmt->fetchAll();
         $stmt->close();
    }
    #Función para ver los datos seleccionados de las fechas de la placa del carro
    public function verDatosHistorialModel($fechaInicio,$fechaFin,$placa){
         $stmt=Conexion::conectar()->prepare("SELECT tmantenimiento.tipomantenimiento as tipo,
         trevision.encargadoservicio as encargado, 
         servicio from tmantenimiento,trevision 
         where tmantenimiento.numero_de_placa=:placa and tmantenimiento.fecha=:fechainicio and trevision.fechasalida=:fechafin");
         $stmt->bindParam(":placa",$placa,PDO::PARAM_STR);
        $stmt->bindParam(":fechainicio",$fechaInicio,PDO::PARAM_STR);
        $stmt->bindParam(":fechafin",$fechaFin,PDO::PARAM_STR);
         $stmt->execute();
         return $stmt->fetch();
         $stmt->close();
    }
    public function sacarModel($placa){
         $stmt =Conexion::conectar()->prepare("UPDATE trevision 
        SET status=1 WHERE numero_de_placa= :placa");
        
       
       $stmt->bindParam(":placa",$placa,PDO::PARAM_STR);
      
       
         if($stmt->execute()){
            return "success";
            
        }else{
            return "error";
        }
        $stmt->close();
    }

    public function mostrarMacaModel($placa){
        $stmt = Conexion::conectar()->prepare("SELECT CONCAT(tvehiculos.marca,',',tvehiculos.`year`) as marca
          from tvehiculos
         where tvehiculos.numero_de_placa=:placa");
$stmt->bindParam(":placa", $placa, PDO::PARAM_STR);

$stmt->execute();
return $stmt->fetch();
$stmt->close();

    }
}