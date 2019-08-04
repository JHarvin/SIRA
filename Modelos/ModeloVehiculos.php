<?php 
#AQUI SE HARAN TODAS LAS CONSULTAS A LA BD: insertar, eliminar, editar y mostrar
#----------------------|-----------------|---------------------------------------
#----------------------|Por: Harvin Ramos|---------------------------------------
#---------------------|__________________|---------------------------------------
#-------------------|___________________|----------------------------------------
require_once"Conexion.php";
class VehiculosModel extends Conexion{
  #--------------------------------------------------------------------------------
  #Funcion para validar que no se inserten placas iguales de los vehiculos---------
  #--------------------------------------------------------------------------------    
     public function validarPlaca($placa,$tabla){
        $stmt=Conexion::conectar()->prepare("SELECT count(*) as total from $tabla where numero_de_placa=:placa");
         $stmt->bindParam(":placa",$placa,PDO::PARAM_STR);
        $stmt->execute();
        
        if($stmt->fetchColumn()>0){
            return "error";
        }else{
            return "success";
        }
    }
    #---------------------------------------------
    #-Funcion para actualizar imagen del carro
    #---------------------------------------------
    public function cambiarImagenModel($datosModel,$tabla,$rutaImg){
        #se borran las rutas de las imagenes anteriores para poner las nuevas rutas
     
        unlink($rutaImg);
        #Se pone la nueva imagen en la ruta
        //Para imagen 1
        $nombreImagen=$datosModel["nombreImagen"];
        $archivo=$datosModel["imagen"];
        $ruta="../vehicles";
        $ruta=$ruta."/".$nombreImagen;
        //--------se mueve el archivo a la ruta en especifico donde se guardara la imagen
        move_uploaded_file($archivo,$ruta);
        //......fin para imagen 1
        #luego se inserta a la bd la nueva imagen
        #----------------------------------------------
        
        #Se hacen las comparaciones para asi usar esa variable y con base a eso actualizar la imagen
      
        if($datosModel["numero"]==1){
             $stmt =Conexion::conectar()->prepare("UPDATE $tabla 
                    SET imagen=:imagen WHERE numero_de_placa= :placa");
            $stmt->bindParam(":imagen",$ruta,PDO::PARAM_STR);
            $stmt->bindParam(":placa",$datosModel["placa"],PDO::PARAM_STR);
        }
        if($datosModel["numero"]==2){
             $stmt =Conexion::conectar()->prepare("UPDATE $tabla 
                    SET imagen2=:imagen WHERE numero_de_placa= :placa");
            $stmt->bindParam(":imagen",$ruta,PDO::PARAM_STR);
            $stmt->bindParam(":placa",$datosModel["placa"],PDO::PARAM_STR);
        }
        if($datosModel["numero"]==3){
             $stmt =Conexion::conectar()->prepare("UPDATE $tabla 
                    SET imagen3=:imagen WHERE numero_de_placa= :placa");
            $stmt->bindParam(":imagen",$ruta,PDO::PARAM_STR);
            $stmt->bindParam(":placa",$datosModel["placa"],PDO::PARAM_STR);
        }
        else if($datosModel["numero"]==4){
             $stmt =Conexion::conectar()->prepare("UPDATE $tabla 
                    SET imagen4=:imagen WHERE numero_de_placa= :placa");
            $stmt->bindParam(":imagen",$ruta,PDO::PARAM_STR);
            $stmt->bindParam(":placa",$datosModel["placa"],PDO::PARAM_STR);
        }
        #----------------------------------------------
        
        
        
        
      
      
       
         if($stmt->execute()){
            return "success";
            
        }else{
            return "error";
        }
        $stmt->close();
    }
    #--------------------------------------------------------------------------------------
    #Funcion para obtener la ruta de la  imagen por imagen, al hacer uso del modal cambiar imagen del carro
    #---------------------------------------------------------------------------------------
    public function obtenerRutaImagenModel($datosModel,$tabla){
        
         if($datosModel["numero"]==1){
         $stmt=Conexion::conectar()->prepare("SELECT imagen as imagen from $tabla where numero_de_placa=:placa");
         $stmt->bindParam(":placa",$datosModel["placa"],PDO::PARAM_STR);
        
        }
        if($datosModel["numero"]==2){
             $stmt=Conexion::conectar()->prepare("SELECT imagen2 as imagen from $tabla where numero_de_placa=:placa");
             $stmt->bindParam(":placa",$datosModel["placa"],PDO::PARAM_STR);
        
        }
        if($datosModel["numero"]==3){
             $stmt=Conexion::conectar()->prepare("SELECT imagen3 as imagen from $tabla where numero_de_placa=:placa");
             $stmt->bindParam(":placa",$datosModel["placa"],PDO::PARAM_STR);
        
        }
        else if($datosModel["numero"]==4){
             $stmt=Conexion::conectar()->prepare("SELECT imagen4 as imagen from $tabla where numero_de_placa=:placa");
             $stmt->bindParam(":placa",$datosModel["placa"],PDO::PARAM_STR);
        
        }
        //---se hace la consulta y se retorna
        $stmt->execute();
        return $stmt->fetch();
         $stmt->close();
    }
    
    #-----------------------------------------------------
    #Funcion para guardar los datos del vehiculo en la bd-
    #-----------------------------------------------------
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
    #---------------------------------------------------------------------
    #FUNCION PARA OBTENER LA DIRECCION DE LAS IMAGENES Y LUEGO ELIMINARLAS
    #----------------------------------------------------------------------
     public function obtenerDireccionImagenes($placa,$tabla){
        $stmt=Conexion::conectar()->prepare("SELECT imagen,imagen2,imagen3,imagen4 
        from $tabla where numero_de_placa=:placa");
         $stmt->bindParam(":placa",$placa,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch();
         $stmt->close();
       
    }
    
    #---------------------------------------------------------------
    #FUNCION PARA ELIMINAR REGISTRO DEL AUTO Y ELIMINAR LAS IMAGENES
    #---------------------------------------------------------------
    public function borrarVehiculoModel($placa,$tabla){
       
        #Primero se eliminara de las tablas con llave foranea
        #------------------------------------------------------------------------------------------
        #tprecios
        $stprecios=Conexion::conectar()->prepare("DELETE FROM tprecios WHERE numero_de_placa=:placa");
        $stprecios->bindParam(":placa",$placa,PDO::PARAM_STR);

        $stprecios->execute();
        #-------------------------------------------------------------------------------------------
        #tmantenimiento
        $stmantenimiento = Conexion::conectar()->prepare("DELETE FROM tmantenimiento WHERE numero_de_placa=:placa");
        $stmantenimiento->bindParam(":placa", $placa, PDO::PARAM_STR);
        $stmantenimiento->execute();
        #---------------------------------------------------------------------------------------------
        #trevision
        $strevision = Conexion::conectar()->prepare("DELETE FROM trevision WHERE numero_de_placa=:placa");
        $strevision->bindParam(":placa", $placa, PDO::PARAM_STR);
        $strevision->execute();
        #---------------------------------------------------------------------------------------------
        #talquiler
        $stalquiler = Conexion::conectar()->prepare("DELETE FROM talquiler WHERE numero_de_placa=:placa");
        $stalquiler->bindParam(":placa", $placa, PDO::PARAM_STR);
        $stalquiler->execute();
        #---------------------------------------------------------------------------------------------
        #tkilometraje
        $stkilometraje = Conexion::conectar()->prepare("DELETE FROM tkilometraje WHERE numero_de_placa=:placa");
        $stkilometraje->bindParam(":placa", $placa, PDO::PARAM_STR);
        $stkilometraje->execute();
        #---------------------------------------------------------------------------------------------
#=====================================================================================================
        #-------------------------------------------------------------------------------------------
        #Luego elimino el registro de la llave primaria
        $stmt =Conexion::conectar()->prepare("DELETE FROM $tabla WHERE numero_de_placa=:placa");
        
          $stmt->bindParam(":placa",$placa,PDO::PARAM_STR);
        
        
        if($stmt->execute()){
            return "success";
        }
        else{
            return "error";
        }
        
        
    }
    #Para obtener los datos del carro por medio del get 
  public function editarVehiculoModel($placa,$tabla){
      $stmt =Conexion::conectar()->prepare("SELECT numero_de_placa,marca,tipo,color,numeromotor,numerochasis,tipocombustible,year FROM $tabla WHERE numero_de_placa= :id");
        
         
       
        $stmt->bindParam(":id",$placa,PDO::PARAM_INT);
        
        $stmt->execute();
       
        return $stmt->fetch();
        
        $stmt->close();
      
      
  }
    public function actualizarVehiculoModel($datosModel,$tabla){
        #me quede aqui revisar maañana
        $stmt =Conexion::conectar()->prepare("UPDATE $tabla 
        SET numero_de_placa=:placa,marca=:marca,tipo=:tipo, 
        color=:color,numerochasis=:chasis,numeromotor=:nmotor WHERE numero_de_placa= :placa");
        
        $stmt->bindParam(":placa",$datosModel["placa"],PDO::PARAM_STR);
        $stmt->bindParam(":marca",$datosModel["marca"],PDO::PARAM_STR);
        $stmt->bindParam(":tipo",$datosModel["tipo"],PDO::PARAM_STR);
       $stmt->bindParam(":nmotor",$datosModel["nmotor"],PDO::PARAM_STR);
        $stmt->bindParam(":chasis",$datosModel["chasis"],PDO::PARAM_STR);
        //$stmt->bindParam(":tcombustible",$datosModel["tcombustible"],PDO::PARAM_STR);
        $stmt->bindParam(":color",$datosModel["color"],PDO::PARAM_STR);
        //$stmt->bindParam(":year",$datosModel["year"],PDO::PARAM_STR);
       // echo'<script>alert("entra "+'.$datosModel["marca"].');</script>';
        if($stmt->execute()){
            return "success";
            
        }else{
            return "error";
        }
        $stmt->close();
        
        
    }
    
    #Actualizar imagen 1
   public function actualizarImgModel($nombreI,$archivo,$posicion,$placa,$tabla){
        $stmt =Conexion::conectar()->prepare("UPDATE $tabla 
        SET imagen=:imagen WHERE numero_de_placa= :placa");
        
        $stmt->bindParam(":imagen",$posicion,PDO::PARAM_STR);
       $stmt->bindParam(":placa",$placa,PDO::PARAM_STR);
      
       
         if($stmt->execute()){
            return "success";
            
        }else{
            return "error";
        }
        $stmt->close();
       
   }
    
    #Actualizar imagen 2
   public function actualizarImgModel2($nombreI,$archivo,$posicion,$placa,$tabla){
        $stmt =Conexion::conectar()->prepare("UPDATE $tabla 
        SET imagen2=:imagen WHERE numero_de_placa= :placa");
        
        $stmt->bindParam(":imagen",$posicion,PDO::PARAM_STR);
       $stmt->bindParam(":placa",$placa,PDO::PARAM_STR);
      
       
         if($stmt->execute()){
            return "success";
            
        }else{
            return "error";
        }
        $stmt->close();
       
   }
    #Actualizar imagen 3
   public function actualizarImgModel3($nombreI,$archivo,$posicion,$placa,$tabla){
        $stmt =Conexion::conectar()->prepare("UPDATE $tabla 
        SET imagen3=:imagen WHERE numero_de_placa= :placa");
        
        $stmt->bindParam(":imagen",$posicion,PDO::PARAM_STR);
       $stmt->bindParam(":placa",$placa,PDO::PARAM_STR);
      
       
         if($stmt->execute()){
            return "success";
            
        }else{
            return "error";
        }
        $stmt->close();
       
   }
    #Actualizar imagen 4
   public function actualizarImgModel4($nombreI,$archivo,$posicion,$placa,$tabla){
        $stmt =Conexion::conectar()->prepare("UPDATE $tabla 
        SET imagen4=:imagen WHERE numero_de_placa= :placa");
        
        $stmt->bindParam(":imagen",$posicion,PDO::PARAM_STR);
       $stmt->bindParam(":placa",$placa,PDO::PARAM_STR);
      
       
         if($stmt->execute()){
            return "success";
            
        }else{
            return "error";
        }
        $stmt->close();
       
   }
    
    #Para verificar si el carro esta en mantenimiento
    public function verificarMantenimiento($placa){
        
         $stmt=Conexion::conectar()->prepare("select trevision.numero_de_placa as placa, trevision.status as estado from trevision where trevision.numero_de_placa=:placa and trevision.status=0");
         $stmt->bindParam(":placa",$placa,PDO::PARAM_STR);
         $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        
    }
    #para obtener todos los registros de los caros
     public function verificarMantenimientoTodos($placa){
        
         $stmt=Conexion::conectar()->prepare("select trevision.numero_de_placa as placa, trevision.status as estado from trevision where trevision.numero_de_placa=:placa and trevision.status=1");
         $stmt->bindParam(":placa",$placa,PDO::PARAM_STR);
         $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
        
    }
    #----------------------------------------------------------------
    
   public function verKmModel($placa){
       $stmt=Conexion::conectar()->prepare("SELECT tkilometraje.numero_de_placa as placa, tkilometraje.cada_cuantos_kilometros as km, tkilometraje.cada_cuantos_meses_revision as mes,tkilometraje.fecha from tkilometraje
WHERE tkilometraje.numero_de_placa=:placa");
         $stmt->bindParam(":placa",$placa,PDO::PARAM_STR);
         $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
   }
    #---------------------------------------------------------------------------------------
    #Funcion que se utiliza para hacer el calculo de los dias en alquiler por medio de ajax
    #al momento de alquilar el vehiculo en el modal alquilar
    #---------------------------------------------------------------------------------------
    public function mostrarPrecioXDia($placa){
         $stmt=Conexion::conectar()->prepare("SELECT precio from tprecios
         WHERE numero_de_placa=:placa");
         $stmt->bindParam(":placa",$placa,PDO::PARAM_STR);
         $stmt->execute();
        return $stmt->fetch();
        $stmt->close();
    }
   
}

