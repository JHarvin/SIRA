<?php 
#---------------------------------------------------------------------------------
#---------------------por Harvin Ramos--------------------------------------------
/*------------------------------------------------------------------------------\
*--Esta Clase sera el modelo en el cual se ejecutaran las consultas crud que
*--requiera el administrador, esta clase controla los datos de los clientes
*/
#---------------------------------------------------------------------------------



require_once"Conexion.php";
class DatosCliente extends Conexion{
    #_____________________________________________
    #Funciones para validar repetidos
    #______________________________________________
    #Funcion para validar dui que no se repita
    public function validarDui($dui,$tabla){
        $stmt=Conexion::conectar()->prepare("SELECT count(*) as total from $tabla where dui=:dui");
         $stmt->bindParam(":dui",$dui,PDO::PARAM_STR);
        $stmt->execute();
        
        if($stmt->fetchColumn()>0){
            return "error";
        }else{
            return "success";
        }
    }
    #Funcion para validar licencia
    public function validarLicencia($licencia,$tabla){
        $stmt=Conexion::conectar()->prepare("SELECT count(*) as total from $tabla where licencia_de_conducir=:licencia");
         $stmt->bindParam(":licencia",$licencia,PDO::PARAM_STR);
        $stmt->execute();
        
        if($stmt->fetchColumn()>0){
            return "error";
        }else{
            return "success";
        }
    }
    
    #---------------------------------------------
    #---------------------------------------------
    #FUNCION PARA GUARDAR DATOS DE LOS CLIENTES
    #---------------------------------------------
 
    public function registroClienteModel($datosClienteModel,$tabla){
     


            
         $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, telefono, dui, licencia_de_conducir, direccion, genero,status) VALUES (
        :nombre,:telefono,:dui,:licencia,:direccion,:genero,1
        )");
    




        
        $stmt->bindParam(":nombre",$datosClienteModel["nombre"],PDO::PARAM_STR);
        $stmt->bindParam(":telefono",$datosClienteModel["telefono"],PDO::PARAM_STR);
        $stmt->bindParam(":dui",$datosClienteModel["dui"],PDO::PARAM_STR);
        $stmt->bindParam(":licencia",$datosClienteModel["licencia"],PDO::PARAM_STR);
        $stmt->bindParam(":direccion",$datosClienteModel["direccion"],PDO::PARAM_STR);
        $stmt->bindParam(":genero",$datosClienteModel["genero"],PDO::PARAM_STR);
        
        if($stmt->execute()){
            return "success";
        }
        else{ return "error";}
        
        $stmt->close();

      
        
          
        
         
        
        
    }
    #--------------------------------------
    #MOSTRAR CLIENTES
    #--------------------------------------
    public function mostrarClienteModel($tabla){
        $stmt =Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        
    }
 
    public function editarClientesModel($idModelDatos,$tabla){
        
        $stmt =Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE dui= :dui");
       
        
      


   

       $stmt->bindParam(":dui",$idModelDatos,PDO::PARAM_STR);



       

       $stmt->execute();


       
      // $stmt->execute();


      
       return $stmt->fetch();
       
       $stmt->close();
        
     
       
       
       
   }
  
   #--Funcion encargada de actualizar
   public function actualizarClientesModel($datosModel,$tabla){
        $stmt =Conexion::conectar()->prepare("UPDATE $tabla 
        SET nombre=:nombre,telefono=:telefono,licencia_de_conducir=:licencia,direccion=:direccion WHERE dui= :dui");
       
        $stmt->bindParam(":nombre",$datosModel["nombre"],PDO::PARAM_STR);
       $stmt->bindParam(":telefono",$datosModel["telefono"],PDO::PARAM_STR);
       $stmt->bindParam(":direccion",$datosModel["direccion"],PDO::PARAM_STR);
       $stmt->bindParam(":dui",$datosModel["dui"],PDO::PARAM_STR);
       $stmt->bindParam(":licencia",$datosModel["licencia"],PDO::PARAM_STR);
     
       
    
       
       
       if($stmt->execute()){
           return "success";
           
       }else{
           return "error";
       }
       $stmt->close();
       
       
   } 
    #para inhabilitar
   public function inhabilitarModel($dui,$tabla){
    $stado=0;
     $stmt =Conexion::conectar()->prepare("UPDATE $tabla SET status=:estado WHERE dui= :dui");
    
    $stmt->bindParam(":estado",$stado,PDO::PARAM_INT); 
    $stmt->bindParam(":dui",$dui,PDO::PARAM_INT);
    
    
    
    if($stmt->execute()){
        return "success";
        
    }else{
        return "error";
    }
    $stmt->close();
}
    
  #Para habilitar
    public function habilitarModel($dui,$tabla){
    $stado=1;
     $stmt =Conexion::conectar()->prepare("UPDATE $tabla SET status=:estado WHERE dui= :dui");
    
    $stmt->bindParam(":estado",$stado,PDO::PARAM_INT); 
    $stmt->bindParam(":dui",$dui,PDO::PARAM_INT);
    
    
    
    if($stmt->execute()){
        return "success";
        
    }else{
        return "error";
    }
    $stmt->close();
}
    
    


}

?>