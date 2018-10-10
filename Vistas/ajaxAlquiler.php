<?php 
#------Hecho por Harvin---------------------------------------
#-------------------------------------------------------------

require_once "../Controladores/ControladorAlquilarVehiculo.php";
 

class ajaxVehiculo{
    
    public $nplaca;
    public $dui;
    public $fechaInicio;
    public $fechaFin;
    
    public function alquilar(){
        
        
        #---------------------------------------------
         $datosAlquiler=array(
                    "placa"=>$this->nplaca,
                    "dui"=>$this->dui,
                    "fechaAlquiler"=>$this->fechaInicio,
                    "fechaDevolucion"=>$this->fechaFin
                    
                   
                );
        
        #Se llama a la funcion en el controlador y luego en el controlador llama al
        #modelo que es el encargado de obtener las imagenes eliminarlas y luego eliminar
        #el registro de la bd-----------------------------------------------------------
        $respuesta=AlquilarVehiculoController::alquilarVehiculo($datosAlquiler);
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

$a=new ajaxVehiculo();
//---se obtiene la placa del auto y se llama a la funcion
$a->nplaca=$_POST["placa"];
$a->dui=$_POST["dui"];
$a->fechaInicio=$_POST["fechaInicio"];
$a->fechaFin=$_POST["fechaFin"];
 

$a->alquilar();




?>