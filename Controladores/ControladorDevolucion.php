<?php 
#------Hecho por Harvin---------------------------------------


require_once "../Modelos/ModeloVentas.php";
 

class Devolver{
    
    public $codigo;
    public $tipo;
    public $importe;
     public $fecha;
   
    
    public function enviar(){
        
        $matricula=$this->codigo;
        $tipo1=$this->tipo;
         $importe1=$this->importe;
        $fecha1=$this->fecha;
        #Se llama a la funcion en el controlador y luego en el controlador llama al
        #modelo que es el encargado de obtener las imagenes eliminarlas y luego eliminar
        #el registro de la bd-----------------------------------------------------------
        $respuesta=DatosVentas::devolverModel($matricula,$tipo1,$importe1,$fecha1);
        #Si la variable $respuesta cumple con la condicion se retorna 1 con echo al ajax
     echo $respuesta;
        
        
        
        
        
        
    }
    
}

$a=new Devolver();

$a->codigo=$_POST["codigo"];
$a->tipo=$_POST["tipobateria"];
$a->importe=$_POST["importe"];
$a->fecha=$_POST["fecha"];


$a->enviar();




