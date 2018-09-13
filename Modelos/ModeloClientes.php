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
    
}

?>