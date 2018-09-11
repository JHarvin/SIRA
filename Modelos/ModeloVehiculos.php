<?php 
#AQUI SE HARAN TODAS LAS CONSULTAS A LA BD: insertar, eliminar, editar y mostrar
require_once"Conexion.php";
class VehiculosModel extends Conexion{
    
    public function registroVehiculoModel($datosModel,$tabla){
        
        //----configuramos para guardar la imagen en una carpeta
        //--lo guardamos en variables el nombre de la imagen el archivo de tipo png, jpg
        // o como sea el tipo de imagen
        #---------Nota....................................
        #Se usara la misma direccion para todas las imagenes solo se ira agregando 
        #Un identificador por ejemplo $ruta1,$ruta2 y asi sucesivamente hasta con 
        #Todas las variables que lleven numero despues......................
        //Para imagen 1
        $nombreImagen=$datosModel["nombreimagen"];
        $archivo=$datosModel["imagen"];
        $ruta="../vehicles";
        $ruta=$ruta."/".$nombreImagen;
        //--------se mueve el archivo a la ruta en especifico donde se guardara la imagen
        move_uploaded_file($archivo,$ruta);
        //......fin para imagen 1
        #------------------------------------------
        #------Imagen 2----------------------------
        
         $nombreImagen2=$datosModel["nombreimagen2"];
        $archivo2=$datosModel["imagen2"];
        $ruta2="../vehicles";
        $ruta2=$ruta2."/".$nombreImagen2;
        //--------se mueve el archivo a la ruta en especifico donde se guardara la imagen
        move_uploaded_file($archivo2,$ruta2);
        
        #----------------------fin imagen 2
        
        #-------------imagen 3----------------------------
        
         $nombreImagen3=$datosModel["nombreimagen3"];
        $archivo3=$datosModel["imagen3"];
        $ruta3="../vehicles";
        $ruta3=$ruta3."/".$nombreImagen3;
        //--------se mueve el archivo a la ruta en especifico donde se guardara la imagen
        move_uploaded_file($archivo3,$ruta3);
        
        #------------fin imagen 3-------------------------
        #------------imagen 4-----------------------------
         $nombreImagen4=$datosModel["nombreimagen4"];
        $archivo4=$datosModel["imagen4"];
        $ruta4="../vehicles";
        $ruta4=$ruta4."/".$nombreImagen4;
        //--------se mueve el archivo a la ruta en especifico donde se guardara la imagen
        move_uploaded_file($archivo4,$ruta4);
        #------------fin imagen 4-------------------------
        
        //---------------luego se inserta a la bd por pdo
        $stmt =Conexion::conectar()->prepare("INSERT INTO $tabla(numero_de_placa, marca, tipo, color, numeromotor, numerochasis, tipocombustible, imagen, imagen2, imagen3, imagen4, year) VALUES (:placa,:marca,:tipo,:color,:numero_motor,:chasis,:tcombustible,:imagen,:imagen2,:imagen3,:imagen4,:year)");
        
        $stmt->bindParam(":placa",$datosModel["placa"],PDO::PARAM_STR);
        $stmt->bindParam(":marca",$datosModel["marca"],PDO::PARAM_STR);
        $stmt->bindParam(":tipo",$datosModel["tipo"],PDO::PARAM_STR);
        $stmt->bindParam(":numero_motor",$datosModel["numero_motor"],PDO::PARAM_STR);
        $stmt->bindParam(":chasis",$datosModel["chasis"],PDO::PARAM_STR);
        $stmt->bindParam(":tcombustible",$datosModel["tcombustible"],PDO::PARAM_STR);
        $stmt->bindParam(":imagen",$ruta,PDO::PARAM_STR);
        $stmt->bindParam(":imagen2",$ruta2,PDO::PARAM_STR);
        $stmt->bindParam(":imagen3",$ruta3,PDO::PARAM_STR);
        $stmt->bindParam(":imagen4",$ruta4,PDO::PARAM_STR);
         $stmt->bindParam(":color",$datosModel["color"],PDO::PARAM_STR);
        $stmt->bindParam(":year",$datosModel["ano"],PDO::PARAM_INT);
        
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