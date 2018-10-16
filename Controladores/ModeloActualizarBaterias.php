<?php 
require_once "Conexion.php";

#---------------------------------------
class EditarBateria extends Conexion{
    
    public function editarBateriasModel($idModelDatos,$tabla){
        
         $stmt =Conexion::conectar()->prepare("SELECT idproducto, tipo, codigo, idproveedor, precio_venta, fecha_venta, precio_unitario FROM $tabla WHERE idproducto= :id");
        
        $stmt->bindParam(":id",$idModelDatos,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();   
    }
   
    #--Funcion encargada de actualizar
    public function actualizarBateriasModel($datosModel,$tabla){
         $stmt =Conexion::conectar()->prepare("UPDATE $tabla SET tipo=:tipo, codigo=:codigo, idproveedor=:idproveedor, precio_venta=:precio_venta, fecha_venta=:fecha_venta, precio_unitario=:precio_unitario WHERE idproducto= :id");
        
        $stmt->bindParam(":tipo",$datosModel["tipo"],PDO::PARAM_STR);
        $stmt->bindParam(":codigo",$datosModel["codigo"],PDO::PARAM_STR);
        $stmt->bindParam(":idproveedor",$datosModel["idproveedor"],PDO::PARAM_STR);
        $stmt->bindParam(":precio_venta",$datosModel["precio_venta"],PDO::PARAM_STR);
        $stmt->bindParam(":fecha_venta",$datosModel["fecha_venta"],PDO::PARAM_STR);
        $stmt->bindParam(":precio_unitario",$datosModel["precio_unitario"],PDO::PARAM_STR);
        $stmt->bindParam(":id",$datosModel["id"],PDO::PARAM_INT);
        
        if($stmt->execute()){
            return "success";
            
        }else{
            return "error";
        }
        $stmt->close(); 
    }
    
}

?>