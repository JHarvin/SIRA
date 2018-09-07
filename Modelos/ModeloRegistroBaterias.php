<?php 

require_once"Conexion.php";

class DatosBaterias extends Conexion
{
	
	public function registroBateriasModel($datosRegistroBateriasModel,$tabla){

 $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, en_existencias, fecha_venta, idproveedor,
    precio_unitario, precio_venta, tipo) VALUES (:codigo,:en_existencias,:fecha_venta,:idproveedor,
                    :precio_unitario,:precio_venta,:tipo)");

        
        $stmt->bindParam(":codigo",$datosRegistroBateriasModel["codigo"],PDO::PARAM_STR);

 $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, en_existencias, fecha_venta, idproveedor,
    precio_unitario, precio_venta, tipo) VALUES (:codigo,:en_existencias,:fecha_venta,:idproveedor,
                    :precio_unitario,:precio_venta,:tipo)");

    
$stmt->bindParam(":codigo",$datosRegistroBateriasModel["codigo"],PDO::PARAM_STR);
$stmt->bindParam(":en_existencias",$datosRegistroBateriasModel["en_existencias"],PDO::PARAM_STR);
$stmt->bindParam(":fecha_venta",$datosRegistroBateriasModel["fecha_venta"],PDO::PARAM_STR);
$stmt->bindParam(":idproveedor",$datosRegistroBateriasModel["idproveedor"],PDO::PARAM_STR);
$stmt->bindParam(":precio_unitario",$datosRegistroBateriasModel["precio_unitario"],PDO::PARAM_STR);
$stmt->bindParam(":precio_venta",$datosRegistroBateriasModel["precio_venta"],PDO::PARAM_STR);
$stmt->bindParam(":tipo",$datosRegistroBateriasModel["tipo"],PDO::PARAM_STR);
       
        if($stmt->execute()){
            return "success";
        }
        else{ return "error";}
        
        $stmt->close();
    
}

public function mostrarBateriasModel($tabla){
        $stmt =Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        
    }
}
?>