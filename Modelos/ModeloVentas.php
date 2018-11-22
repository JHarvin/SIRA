<?php

require_once"Conexion.php";

class DatosVentas extends Conexion{

 
public function registroVentasModel($datosVentasModel,$tabla){

      $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(cliente, direccion, fecha, codigo ,tipo, proveedor,precio,garantia,total) 
            VALUES (:cliente,:direccion,:fecha,:codigo,:tipo,:proveedor,:precio,:garantia,:total)");
        
        $stmt->bindParam(":cliente",$datosVentasModel["tipo"],PDO::PARAM_STR);

      $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(cliente, direccion, fecha, codigo ,tipo, proveedor,precio,garantia,total) 
            VALUES (:cliente,:direccion,:fecha,:codigo,:tipo,:proveedor,:precio,:garantia,total)");
        
        $stmt->bindParam(":cliente",$datosBateriasModel["cliente"],PDO::PARAM_STR);
        $stmt->bindParam(":direccion",$datosBateriasModel["direccion"],PDO::PARAM_STR);
        $stmt->bindParam(":fecha",$datosBateriasModel["fecha"],PDO::PARAM_STR);
        $stmt->bindParam(":codigo",$datosBateriasModel["codigo"],PDO::PARAM_STR);
        $stmt->bindParam(":tipo",$datosBateriasModel["tipo"],PDO::PARAM_STR);
        $stmt->bindParam(":proveedor",$datosBateriasModel["proveedor"],PDO::PARAM_STR);
        $stmt->bindParam(":precio",$datosBateriasModel["precio"],PDO::PARAM_STR);
        $stmt->bindParam(":garantia",$datosBateriasModel["garantia"],PDO::PARAM_STR);
        $stmt->bindParam(":total",$datosBateriasModel["total"],PDO::PARAM_STR);
       
        if($stmt->execute()){
            return "success";
        }
        else{ return "error";}
        
        $stmt->close();      
        
}
 //funcion para mostrar usuarios
    public function mostrarventas($tabla){
        
        $stmt =Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        
    }


}//fin de clase
?>