<?php 
#------Hecho por Harvin---------------------------------------


require_once "../Controladores/ControladorRegistrarVehiculo.php";
 

class ActualizarImg{
    
    public $imagen;
    public $numero;
   
    
    public function ajaxImg(){
        
        $img=$this->imagen;
        $posicion=$this->numero;
        #Se llama a la funcion en el controlador y luego en el controlador llama al
        #modelo que es el encargado de obtener las imagenes eliminarlas y luego eliminar
        #el registro de la bd-----------------------------------------------------------
        $respuesta=RegistrarVehiculoController::actualizarImgController($img,$posicion);
        #Si la variable $respuesta cumple con la condicion se retorna 1 con echo al ajax
        if($respuesta=="success"){
            echo 1;
        
        }
        #Sino se cumple retornamos cero
        else{
            echo 0;
        }
        
        
        
        //----se retorna el valor obtenido en la clase controlador 0 o 1
        
        
    }
    
}

$a=new ActualizarImg();
//---se obtiene la placa del auto y se llama a la funcion
$a->imagen=$_POST["imagen"];
#si la imagen es la 1,2,3 o 4 a eso se refiere la variable numero
$a->numero=$_POST["numero"];


$a->ajaxImg();




?>