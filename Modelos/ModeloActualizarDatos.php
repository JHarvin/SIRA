<?php 
require_once "Conexion.php";
#--------------------------------------------------------------------------------
#-Clase que se encargara de consultar a la base de datos
#--La funcion editarUsuarioModel devuelve el registro solicitado por medio del id
#--La funcion actualizar datos actualiza los datos del usuario por medio del id
#-- y los datos que se le manden
#-------------------------------------------------------------------------------
#---------------------------------------
#--- by Harvin Ramos
#---------------------------------------
class EditarUsuario extends Conexion{
    
    public function editarUsuarioModel($idModelDatos,$tabla){
        
         $stmt =Conexion::conectar()->prepare("SELECT idpersonal,nombre,telefono,direccion,username,password,status,email FROM $tabla WHERE idpersonal= :id");
        
         
       
        $stmt->bindParam(":id",$idModelDatos,PDO::PARAM_INT);
        
        $stmt->execute();
       
        return $stmt->fetch();
        
        $stmt->close();
         
      
        
        
        
    }
   
    #--Funcion encargada de actualizar
    public function actualizarUsuarioModel($datosModel,$tabla){
         $stmt =Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,telefono=:telefono,direccion=:direccion, username=:username ,password=:password WHERE idpersonal= :id");
        
         $stmt->bindParam(":nombre",$datosModel["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":telefono",$datosModel["telefono"],PDO::PARAM_STR);
        $stmt->bindParam(":direccion",$datosModel["direccion"],PDO::PARAM_STR);
        $stmt->bindParam(":username",$datosModel["username"],PDO::PARAM_STR);
        $stmt->bindParam(":password",$datosModel["password"],PDO::PARAM_STR);
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