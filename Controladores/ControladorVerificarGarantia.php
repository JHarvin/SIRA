<?php 
#------Hecho por Harvin---------------------------------------


require_once "../Modelos/ModeloVentas.php";
 

class Devolver{
    
    public $codigo;
   
    
    public function enviar(){
        
        $matricula=$this->codigo;
        $mensaje="";
       $garantia="No aplica garantia ";
       $total="No aplica garantia";
        $respuesta=DatosVentas::verificarGarantiaModel($matricula);
        $precio=$respuesta["precio"];
        $date1 = new DateTime($respuesta["fecha"]);
$date2 = new DateTime(date("Y-m-d"));
$intervalo = $date1->diff($date2);
        
        if($date1<=$date2 && $intervalo->m<=$respuesta["garantia"]){
            $garantia="Aplica garantia";
            $total=round(($precio/$respuesta["garantia"])*$intervalo->m,2);
            echo json_encode(array("garantia"=>$garantia,"precio"=>$total));
        }else{
            echo json_encode(array("garantia"=>$garantia,"precio"=>$total));
        }
        
        
        
 
     
       
        
        
        
        
        
    }
    
}

$a=new Devolver();

$a->codigo=$_POST["codigo"];


$a->enviar();




