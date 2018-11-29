<?php 
require_once"Conexion.php";
#------------------------------------------------------------
#Clase para registrar el alquiler del vehiculo
#------------------------------------------------------------
class ModeloAlquilar{
    #------------------------------------------------------
    #Funcion donde se registra el alquiler
    #------------------------------------------------------
    public function registrarAlquilerModel($datosModel,$tabla){
        $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(fecha_alquiler, fecha_devolucion, numero_de_placa, dui) VALUES (
        :fecha_alquiler,:fecha_devolucion,:placa,:dui)");
        
        $stmt->bindParam(":fecha_alquiler",$datosModel["fechaAlquiler"],PDO::PARAM_STR);
        $stmt->bindParam(":fecha_devolucion",$datosModel["fechaDevolucion"],PDO::PARAM_STR);
        $stmt->bindParam(":placa",$datosModel["placa"],PDO::PARAM_STR);
        $stmt->bindParam(":dui",$datosModel["dui"],PDO::PARAM_STR);
       

        if($stmt->execute()){
            return "success";
        }
        else{
            
            
            return "error";}
        
        
        $stmt->close();
        
        
    }
    
    #---------------------------------------------------------------------------------------------------
    #Funcion que se usa para verificar si el auto esta alquilado y si lo esta se desactivan los botones de eliminar,modificar, alquilar y mantenimeito que estan en el controlador vehiculsos
    #---------------------------------------------------------------------------------------------------
    public function verificarEstadoAlquilerModel($placa,$tabla){
        
         $stmt =Conexion::conectar()->prepare("SELECT COUNT(*) from talquiler where numero_de_placa=:placa and status=0");
        
        $stmt->bindParam(":placa",$placa,PDO::PARAM_STR);
        
        
        $stmt->execute();
         
         if($stmt->fetchColumn()>0){
            return "success";
        }else{
            return "error";
        }
        
    $stmt->close();
    }
    #---------------------------------------------------------
    public function verificarClienteAlquilerModel($dui){
        $stmt =Conexion::conectar()->prepare("SELECT COUNT(*) from talquiler,tclientes where talquiler.dui=:dui and tclientes.dui=:dui and talquiler.status=0");
        
        $stmt->bindParam(":dui",$dui,PDO::PARAM_STR);
        
        
        $stmt->execute();
         
         if($stmt->fetchColumn()>0){
            return "success";
        }else{
            return "error";
        }
        
    $stmt->close();
        
    }
    
    #----------------------------------------------------------------------
    #Funcion en la que se consultara todos los autos que estan en alquiler
    #----------------------------------------------------------------------
    public function mostrarAlquilerModel(){
        
     $stmt =Conexion::conectar()->prepare("SELECT  talquiler.numero_de_placa as placa,talquiler.dui as dui,tvehiculos.marca as marca,tclientes.nombre as cliente from talquiler,tvehiculos,tclientes WHERE
tclientes.dui=talquiler.dui and tvehiculos.numero_de_placa=talquiler.numero_de_placa and talquiler.`status`=0"); 
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        
    }
    
    #----------------------------------------------------------------------
    
    #--------------------------------------------------------------------------
    #Funcion para obtener todos los autos que fueron alquilados hasta la fecha
    #---------------------------------------------------------------------------
    
    #---------------------------------------------------------------------------
    
    #Funciones de devolver el auto
    public function devolverCarroModel($placa){
        $stmt =Conexion::conectar()->prepare("UPDATE talquiler 
        SET status=1 where numero_de_placa=:placa");
        
       
       $stmt->bindParam(":placa",$placa,PDO::PARAM_STR);
      
       
         if($stmt->execute()){
            return 1;
            
        }else{
            return 0;
        }
        $stmt->close();
        
    }
    
}

