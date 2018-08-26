<?php 
#AQUI SE HARAN TODAS LAS CONSULTAS A LA BD: insertar, eliminar, editar y mostrar
require_once"Conexion.php";
class VehiculosModel extends Conexion{
    
    public function registroVehiculoModel($datosModel,$tabla){
        
        $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(numero_de_placa, marca, tipo, color, numeromotor, numerochasis, tipocombustible, imagen) VALUES (:placa,:marca,:tipo,:color,:numero_motor,:chasis,:tcombustible,:imagen)");
        
        $stmt->bindParam(":placa",$datosModel["placa"],PDO::PARAM_STR);
        $stmt->bindParam(":marca",$datosModel["marca"],PDO::PARAM_STR);
        $stmt->bindParam(":tipo",$datosModel["tipo"],PDO::PARAM_STR);
        $stmt->bindParam(":numero_motor",$datosModel["numero_motor"],PDO::PARAM_STR);
        $stmt->bindParam(":chasis",$datosModel["chasis"],PDO::PARAM_STR);
        $stmt->bindParam(":tcombustible",$datosModel["tcombustible"],PDO::PARAM_STR);
        $stmt->bindParam(":imagen",$datosModel["imagen"],PDO::PARAM_LOB);
         $stmt->bindParam(":color",$datosModel["color"],PDO::PARAM_STR);
        
        if($stmt->execute()){
            return "success";
        }
        else{ return "error";}
        
        $stmt->close();
        
    }
    
    #----------------------------------------------------------
    #FUNCION PARA MOSTRAR
    public function mostrarVehiculoModel($tabla){
        
         $stmt =Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }
    
}

?>