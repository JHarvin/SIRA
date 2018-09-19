<?php 

require_once"Conexion.php";

class DatosBaterias extends Conexion
{
  
  public function registroBateriasModel($datosBateriasModel,$tabla){

      $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(tipo, codigo, idproveedor, precio_venta ,fecha_venta, precio_unitario) 
            VALUES (:tipo,:codigo,:idproveedor,:precio_venta,:fecha_venta,:precio_unitario)");
        
        $stmt->bindParam(":tipo",$datosBateriasModel["tipo"],PDO::PARAM_STR);

       $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(tipo, codigo, idproveedor, precio_venta ,fecha_venta, precio_unitario) 
            VALUES (:tipo,:codigo,:idproveedor,:precio_venta,:fecha_venta,:precio_unitario)");

    $stmt->bindParam(":tipo",$datosBateriasModel["tipo"],PDO::PARAM_STR);

        $stmt->bindParam(":codigo",$datosBateriasModel["codigo"],PDO::PARAM_STR);
        $stmt->bindParam(":idproveedor",$datosBateriasModel["idproveedor"],PDO::PARAM_STR);
        $stmt->bindParam(":precio_venta",$datosBateriasModel["precio_venta"],PDO::PARAM_STR);
        $stmt->bindParam(":fecha_venta",$datosBateriasModel["fecha_venta"],PDO::PARAM_STR);
        $stmt->bindParam(":precio_unitario",$datosBateriasModel["precio_unitario"],PDO::PARAM_STR);
       
        if($stmt->execute()){
            return "success";
        }
        else{ return "error";}
        
        $stmt->close();
        
}

public function mostrarBateriasModel($tabla,$tablaUnir){
        $stmt =Conexion::conectar()->prepare("SELECT * FROM $tabla INNER JOIN $tablaUnir ON $tabla.idproveedor=$tablaUnir.idproveedor"); 
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        
    }
}
?>