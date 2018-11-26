<?php 
#------Hecho por Harvin---------------------------------------


require_once "../Modelos/ModeloVentas.php";
 

class Devolver{
    
    public $codigo;
   
    
    public function enviar(){
        
        $matricula=$this->codigo;
       $garantia="No aplica garantia";
        #Se llama a la funcion en el controlador y luego en el controlador llama al
        #modelo que es el encargado de obtener las imagenes eliminarlas y luego eliminar
        #el registro de la bd-----------------------------------------------------------
        $respuesta=DatosVentas::devolverModel($matricula);
        if($respuesta["garantia"]<=date("n")){
            $garantia="Aplica garantia";
        }
        #Si la variable $respuesta cumple con la condicion se retorna 1 con echo al ajax
     echo json_encode($garantia);
        
        
        
        
        
        
    }
    
}

$a=new Devolver();

$a->codigo=$_POST["codigo"];


$a->enviar();




