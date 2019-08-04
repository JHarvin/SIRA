<?php 
#------Hecho por Harvin---------------------------------------


require_once "../Controladores/ControladorEliminarVehiculo.php";
 

class EnvioEliminar{
    
    public $nplaca;
   
    
    public function eliminarEnvio(){
        
        $matricula=$this->nplaca;
       
        #Se llama a la funcion en el controlador y luego en el controlador llama al
        #modelo que es el encargado de obtener las imagenes eliminarlas y luego eliminar
        #el registro de la bd-----------------------------------------------------------
        $respuesta=EliminarVehiculoController::eliminarVehiculo($this->nplaca);
        #Si la variable $respuesta cumple con la condicion se retorna 1 con echo al ajax
        if($respuesta=="success"){
            echo "success";
        
        }
        #Sino se cumple retornamos cero
        else{
            echo "error";
        }
        
        
        
        //----se retorna el valor obtenido en la clase controlador 0 o 1
        
        
    }
    
}

$a=new EnvioEliminar();
//---se obtiene la placa del auto y se llama a la funcion
$a->nplaca=$_POST["placa"];


$a->eliminarEnvio();




?>