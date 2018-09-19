<?php 
require_once "Conexion.php";

class EditarBateria extends Conexion{

    //funcion para editar el modelo de baterias
	public function EditarBateriaModel($idDatosModel, $tabla)
	{
	 $stmt =Conexion::conectar()->prepare("SELECT idproducto,tipo,codigo,precio_unitario,idproveedor,precio_venta,fecha_venta FROM $tabla WHERE idproducto= :id");
     $stmt->bindParam(":id",$idDatosModel,PDO::PARAM_INT);
     $stmt->execute();
     return $stmt->fetch();
     $stmt->close();
	}
     //funcion para actualiar los datos de el registro de baterias en la base de datos
    public function actualizarBateriasModel($datosModel,$tabla)
    {
    	$stmt->bindParam(":tipo",$datosModel["tipo"],PDO::PARAM_STR);
        $stmt->bindParam(":codigo",$datosModel["codigo"],PDO::PARAM_STR);
        $stmt->bindParam(":precio_unitario",$datosModel["precio_unitario"],PDO::PARAM_STR);
        $stmt->bindParam(":idproveedor",$datosModel["idproveedor"],PDO::PARAM_STR);
        $stmt->bindParam(":precio_venta",$datosModel["precio_venta"],PDO::PARAM_STR);
        $stmt->bindParam(":id",$datosModel["id"],PDO::PARAM_INT);
        $stmt->bindParam(":fecha_venta",$datosModel["fecha_venta"],PDO::PARAM_INT);
        
        
        if($stmt->execute()){
            return "success";
            
        }else{
            return "error";
        }
        $stmt->close();
    }//fin de la funcion de actualizarbateriasmodel

}//fin de la clase 
?>