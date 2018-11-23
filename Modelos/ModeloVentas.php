<?php

require_once"Conexion.php";

class DatosVentas extends Conexion{

 
public function registroVentasModel($datosVentasModel,$tabla){

      $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(cliente, direccion, fecha, codigo ,tipo, idproveedor,precio,garantia) 
            VALUES (:cliente,:direccion,:fecha,:codigo,:tipo,:idproveedor,:precio,:garantia)");
        
        $stmt->bindParam(":cliente",$datosVentasModel["cliente"],PDO::PARAM_STR);

      $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(cliente, direccion, fecha, codigo ,tipo, idproveedor,precio,garantia) 
            VALUES (:cliente,:direccion,:fecha,:codigo,:tipo,:idproveedor,:precio,:garantia)");
        
        $stmt->bindParam(":cliente",$datosVentasModel["cliente"],PDO::PARAM_STR);
        $stmt->bindParam(":direccion",$datosVentasModel["direccion"],PDO::PARAM_STR);
        $stmt->bindParam(":fecha",$datosVentasModel["fecha"],PDO::PARAM_STR);
        $stmt->bindParam(":codigo",$datosVentasModel["codigo"],PDO::PARAM_STR);
        $stmt->bindParam(":tipo",$datosVentasModel["tipo"],PDO::PARAM_STR);
        $stmt->bindParam(":idproveedor",$datosVentasModel["idproveedor"],PDO::PARAM_STR);
        $stmt->bindParam(":precio",$datosVentasModel["precio"],PDO::PARAM_STR);
        $stmt->bindParam(":garantia",$datosVentasModel["garantia"],PDO::PARAM_STR);

       
        if($stmt->execute()){
            return "success";
        }
        else{ return "error";}
        
        $stmt->close();      
        
}

 //funcion para mostrar usuarios
    public function mostrarventas($tabla, $tablaUnir){
        
        $stmt =Conexion::conectar()->prepare("SELECT * FROM $tabla INNER JOIN $tablaUnir ON $tabla.idproveedor=$tablaUnir.idproveedor"); 
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        
    }


}//fin de clase
?>