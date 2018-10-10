<?php 
#------Hecho por Harvin---------------------------------------


require_once "../Controladores/ControladorMostrarUsuarios.php";
 

class HabilitarAjax{
    
    public $id;
   
    
    public function ajaxHabilitar(){
        
        $ide=$this->id;
       
        #Se llama a la funcion en el controlador y luego en el controlador llama al
        #modelo que es el encargado de obtener las imagenes eliminarlas y luego eliminar
        #el registro de la bd-----------------------------------------------------------
        $respuesta=MostrarUsuariosController::habilitarController($ide);
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

$a=new HabilitarAjax();
//---se obtiene la placa del auto y se llama a la funcion
$a->id=$_POST["id"];


$a->ajaxHabilitar();




?>