<?php 
#------Hecho por Harvin---------------------------------------
#---por ajax

require_once "../Modelos/ModeloVehiculos.php";
 

class VerPrecio{
    
    public $placa;
    
   
    
    public function ajaxVer(){
        
        $nplaca=$this->placa;
        
        
        $respuesta=VehiculosModel::mostrarPrecioXDia($nplaca);
        #Si la variable $respuesta cumple con la condicion se retorna 1 con echo al ajax
       echo json_encode($respuesta);
        
        
        
        //----se retorna el valor obtenido en la clase controlador 0 o 1
        
        
    }
    
}

$a=new VerPrecio();
//---se obtiene la placa del auto y se llama a la funcion
$a->placa=$_POST["placa"];



$a->ajaxVer();




?>