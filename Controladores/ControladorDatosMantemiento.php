<?php 
require_once"../Modelos/ModeloMantenimiento.php";
#------Hecho por Harvin---------------------------------------

class VerHistorialController{
    
    public $placa;
    //public $precio;
   
    
    public function ajaxVerController(){
        
       $placaV=$this->placa;
       $html="";
        $respuesta=MantenimientoModel::verHistorialFechaModel($placaV);
     
        
        
        
        echo json_encode($respuesta);
        
        
        
        
        
    }
    
}

$a=new VerHistorialController();
//---se obtiene la placa del auto y se llama a la funcion
$a->placa=$_POST["placa"];



$a->ajaxVerController();




