<?php 

require_once"Conexion.php";

class DatosBaterias extends Conexion
{
	public function registroBateriasModel($datosBateriasModel,$tabla){


          $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(tipo, codigo, en_existencias, precio_unitario,
            idproveedor, precio_venta, fecha_venta) 
            VALUES (:tipo,:codigo,:en_existencias,:precio_unitario,:idproveedor,:precio_venta,:fecha_venta)");
        
        $stmt->bindParam(":tipo",$datosBateriasModel["tipo"],PDO::PARAM_STR);

           $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(tipo, codigo, en_existencias, precio_unitario,
            idproveedor, precio_venta, fecha_venta) 
            VALUES (:tipo,:codigo,:en_existencias,:precio_unitario,:idproveedor,:precio_venta,:fecha_venta)");

        $stmt->bindParam(":tipo",$datosBateriasModel["tipo"],PDO::PARAM_STR);

        $stmt->bindParam(":codigo",$datosBateriasModel["codigo"],PDO::PARAM_STR);
        $stmt->bindParam(":en_existencias",$datosBateriasModel["en_existencias"],PDO::PARAM_STR);
        $stmt->bindParam(":precio_unitario",$datosBateriasModel["precio_unitario"],PDO::PARAM_STR);
        $stmt->bindParam(":idproveedor",$datosBateriasModel["idproveedor"],PDO::PARAM_STR);
         $stmt->bindParam(":precio_venta",$datosBateriasModel["precio_venta"],PDO::PARAM_STR);
           $stmt->bindParam(":fecha_venta",$datosBateriasModel["fecha_venta"],PDO::PARAM_STR);

           
        if($stmt->execute()){
            return "success";
        }
        else{ return "error";}
        
        $stmt->close();
        
}


}
?>