<?php 
require_once"Conexion.php";

/**
* 
*/
class DatosProveedor extends Conexion
{
	
	public function registroProveedorModel ($datosProveedorModel,$tabla){

		   $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, telefono, email,direccion) VALUES (:nombre,:telefono,:email,:direccion)");

		$stmt->bindParam(":nombre",$datosProveedorModel["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":telefono",$datosProveedorModel["telefono"],PDO::PARAM_STR);
        $stmt->bindParam(":email",$datosProveedorModel["email"],PDO::PARAM_STR);
        $stmt->bindParam(":direccion",$datosProveedorModel["direccion"],PDO::PARAM_STR);
       
        if($stmt->execute()){
            return "success";
        }
        else{ return " ¡Error! ";}
        
        $stmt->close();
	}

}
