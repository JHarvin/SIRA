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
     


            
         $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, telefono, dui, licencia_de_conducir, direccion, genero) VALUES (
        :nombre,:telefono,:dui,:licencia,:direccion,:genero
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
       
        
      
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
       $stmt->bindParam(":dui",$idModelDatos,PDO::PARAM_STR);
=======
>>>>>>> 52a94383ba8b75a6760d5b7b7ddcc4ff2ecd75d3
>>>>>>> 663cc0a004381d14a6d7abfce8b06cbb8c643b81

       $stmt->bindParam(":dui",$idModelDatos,PDO::PARAM_INT);

       $stmt->bindParam(":dui",$idModelDatos,PDO::PARAM_STR);

<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
>>>>>>> 0283b61ba0957f8b3d62c7dd118263ea7859c9e9
>>>>>>> 52a94383ba8b75a6760d5b7b7ddcc4ff2ecd75d3
>>>>>>> 663cc0a004381d14a6d7abfce8b06cbb8c643b81
       
       $stmt->execute();
      
       return $stmt->fetch();
       
       $stmt->close();
        
     
       
       
       
   }
  
   #--Funcion encargada de actualizar
   public function actualizarClientesModel($datosModel,$tabla){
        $stmt =Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre,telefono=:telefono,dui=:dui,licencia_de_conducir=:licencia,direccion=:direccion, WHERE dui= :dui");
       
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

}

?>