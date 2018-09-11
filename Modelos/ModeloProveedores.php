<?php 

require_once"Conexion.php";

class DatosProveedor extends Conexion
{
	
	public function registroProveedorModel($datosProveedorModel,$tabla){

		  $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, telefono, email, direccion) 
            VALUES (:nombre,:telefono,:email,:direccion)");
        
        $stmt->bindParam(":nombre",$datosProveedorModel["nombre"],PDO::PARAM_STR);

		   $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, telefono, email,direccion) 
            VALUES (:nombre,:telefono,:email,:direccion)");

		$stmt->bindParam(":nombre",$datosProveedorModel["nombre"],PDO::PARAM_STR);

        $stmt->bindParam(":telefono",$datosProveedorModel["telefono"],PDO::PARAM_STR);
        $stmt->bindParam(":email",$datosProveedorModel["email"],PDO::PARAM_STR);
        $stmt->bindParam(":direccion",$datosProveedorModel["direccion"],PDO::PARAM_STR);
       
        if($stmt->execute()){
            return "success";
        }
        else{ return "error";}
        
        $stmt->close();
        
}

public function mostrarProveedoresModel($tabla){
        $stmt =Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        
    }
}
?>