<?php

require_once"Conexion.php";

class DatosVentas extends Conexion{

 
public function registroVentasModel($datosVentasModel,$tabla){

      $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(cliente, direccion, fecha, codigo ,tipo, idproveedor,precio,garantia) 
            VALUES (:cliente,:direccion,:fecha,:codigo,:tipo,:idproveedor,:precio,:garantia)");
        
     
        $stmt->bindParam(":cliente",$datosVentasModel["cliente"],PDO::PARAM_STR);
        $stmt->bindParam(":direccion",$datosVentasModel["direccion"],PDO::PARAM_STR);
        $stmt->bindParam(":fecha",$datosVentasModel["fecha"],PDO::PARAM_STR);
        $stmt->bindParam(":codigo",$datosVentasModel["codigo"],PDO::PARAM_STR);
        $stmt->bindParam(":tipo",$datosVentasModel["tipo"],PDO::PARAM_STR);
        $stmt->bindParam(":idproveedor",$datosVentasModel["idproveedor"],PDO::PARAM_STR);
        $stmt->bindParam(":precio",$datosVentasModel["precio"],PDO::PARAM_STR);
        $stmt->bindParam(":garantia",$datosVentasModel["garantia"],PDO::PARAM_STR);

       
        if($stmt->execute()){
            return "success";
        }
        else{ return "error";}
        
        $stmt->close();      
        
}

 //funcion para mostrar usuarios



   

    public function mostrarVentas($tabla,$tablaUnir){
        $stmt =Conexion::conectar()->prepare("SELECT * FROM $tabla INNER JOIN $tablaUnir ON $tabla.proveedor=$tablaUnir.idproveedor where $tabla.tipo='AUTO'"); 
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        
    }
    //para mostrar las devoluciones 
     public function mostrarDev($tabla){
        $stmt =Conexion::conectar()->prepare("SELECT * FROM $tabla"); 
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        
    }
#Para guardar las ventas
    public function guardarVentaModel($datosVentasModel,$tabla){
         $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(cliente, direccion, fecha, codigo ,tipo, proveedor,precio,garantia) 
            VALUES (:cliente,:direccion,:fecha,:codigo,:tipo,:idproveedor,:precio,:garantia)");
        
$stmt2 =Conexion::conectar()->prepare("DELETE FROM tproductos WHERE codigo=:codigo");
$stmt2->bindParam(":codigo",$datosVentasModel["codigo"],PDO::PARAM_STR);
$stmt2->execute();
        
        $stmt->bindParam(":cliente",$datosVentasModel["cliente"],PDO::PARAM_STR);
        $stmt->bindParam(":direccion",$datosVentasModel["direccion"],PDO::PARAM_STR);
        $stmt->bindParam(":fecha",$datosVentasModel["fecha"],PDO::PARAM_STR);
        $stmt->bindParam(":codigo",$datosVentasModel["codigo"],PDO::PARAM_STR);
        $stmt->bindParam(":tipo",$datosVentasModel["tipo"],PDO::PARAM_STR);
        $stmt->bindParam(":idproveedor",$datosVentasModel["proveedor"],PDO::PARAM_STR);
        $stmt->bindParam(":precio",$datosVentasModel["precio"],PDO::PARAM_STR);
        $stmt->bindParam(":garantia",$datosVentasModel["garantia"],PDO::PARAM_STR);

       
        if($stmt->execute()){
            return 1;
        }
        else{ return 0;}
        
        $stmt->close();   
    }
    
    #Funcion para mandar a la tabla de baterias devueltas
    public function devolverModel($codigo,$tipo,$importe,$fecha){
        #-----------------------------------------------------
        $estado="NO DEVUELTA";
        $stmt =Conexion::conectar()->prepare("INSERT INTO tdevoluciones(codigo,tipo,importe,fecha,estado)
            VALUES (:codigo,:tipo,:importe,:fecha,'NO DEVUELTA')");
        
        $eli =Conexion::conectar()->prepare("DELETE FROM tventas WHERE tventas.codigo=:codigo");
        
         $eli->bindParam(":codigo",$codigo,PDO::PARAM_STR);
        $eli->execute();

     
       
         $stmt->bindParam(":codigo",$codigo,PDO::PARAM_STR);
         $stmt->bindParam(":tipo",$tipo,PDO::PARAM_STR);
         $stmt->bindParam(":importe",$importe,PDO::PARAM_STR);
         $stmt->bindParam(":fecha",$fecha,PDO::PARAM_STR);
        
       
        
        if($stmt->execute()){
            return 1;
        }
        else{ return 0;}
        
        $stmt->close(); 
        
       
        #-----------------------------------------------------
    }
    //==========devolver proveedor================================
    #Funcion para mandar a la tabla de baterias devueltas
    public function devolverModelPro($codigo){
        #-----------------------------------------------------
        
        
        $stmt =Conexion::conectar()->prepare("UPDATE tdevoluciones SET estado= 'DEVUELTA' WHERE tdevoluciones.codigo =:codigo");
        
         $stmt->bindParam(":codigo",$codigo,PDO::PARAM_STR);
    
       
        
        if($stmt->execute()){
            return 1;
        }
        else{ return 0;}
        
        $stmt->close(); 
        
       
        #-----------------------------------------------------
    }
    
    //====================================
    #Funcion para verificar la garantia
    public function verificarGarantiaModel($codigo){
        $stmt =Conexion::conectar()->prepare("SELECT * FROM tventas WHERE codigo=:codigo "); 
        $stmt->bindParam(":codigo",$codigo,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
    }
    

}//fin de clase
