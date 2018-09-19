<?php 

require_once"Conexion.php";

class DatosProveedor extends Conexion
{
     #-----------------------------------------------------
    #Para validar que no se repita el email del proveedor
    #-----------------------------------------------------
     public function validarEmail($email,$tabla){
        $stmt=Conexion::conectar()->prepare("SELECT count(*) as total from $tabla where email=:email");
         $stmt->bindParam(":email",$email,PDO::PARAM_STR);
        $stmt->execute();
        
        if($stmt->fetchColumn()>0){
            return "error";
        }else{
            return "success";
        }
    }
    #----------------------------------------------------------------
    #-----------------------------------------------------
    #Para validar que no se repita el nombre del proveedor
    #-----------------------------------------------------
     public function validarNombre($nombre,$tabla){
        $stmt=Conexion::conectar()->prepare("SELECT count(*) as total from $tabla where nombre=:nombre");
         $stmt->bindParam(":nombre",$nombre,PDO::PARAM_STR);
        $stmt->execute();
        
        if($stmt->fetchColumn()>0){
            return "error";
        }else{
            return "success";
        }
    }
    #----------------------------------------------------------------
	
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