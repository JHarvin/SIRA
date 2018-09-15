<?php 
#------Hecho por Harvin---------------------------------------


require_once "../Controladores/ControladorActualizarDatos.php";
require_once "../Modelos/ModeloActualizarDatos.php";

class Ajax{
    
    public $nplaca;
   
    
    public function actualizarDatosModal(){
        
        $matricula=$this->nplaca;
       
        
        echo 1;
        
        
        
        //----se retorna el valor obtenido en la clase controlador 0 o 1
        
        
    }
    
}

$a=new Ajax();
$a->nplaca=$_POST["placa"];


$a->actualizarDatosModal();




?>