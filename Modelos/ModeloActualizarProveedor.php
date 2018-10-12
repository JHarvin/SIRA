<?php 
require_once "Conexion.php";//Lllamada a la conexion.


#---------------------------------------
class EditarProveedor extends Conexion{
    //Funcion de editar el proveedor.
    public function editarProveedorModel($idModelDatos,$tabla){
        //Llamada a la conexion de los campos
         $stmt =Conexion::conectar()->prepare("SELECT idproveedor,nombre,telefono, email, direccion, status FROM $tabla WHERE idproveedor= :id");
        
        $stmt->bindParam(":id",$idModelDatos,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();   
    }
   
    #--Funcion encargada de actualizar
    public function actualizarProveedorModel($datosModel,$tabla){
         $stmt =Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, telefono=:telefono, email=:email, direccion=:direccion, status=:status WHERE idproveedor= :id");
        
        $stmt->bindParam(":nombre",$datosModel["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":telefono",$datosModel["telefono"],PDO::PARAM_STR);
        $stmt->bindParam(":email",$datosModel["email"],PDO::PARAM_STR);
        $stmt->bindParam(":direccion",$datosModel["direccion"],PDO::PARAM_STR);
        $stmt->bindParam(":id",$datosModel["id"],PDO::PARAM_INT);
        $stmt->bindParam(":status",$datosModel["status"],PDO::PARAM_INT);
        
        if($stmt->execute()){
            return "success";
            
        }else{
            return "error";
        }
        $stmt->close(); 
    }
    
}

?>