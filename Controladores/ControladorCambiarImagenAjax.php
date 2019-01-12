<?php 
#------Hecho por Harvin---------------------------------------
#-------------------------------------------------------------
##Use las mismas funciones solo copie, pegue y modifique de otros archivos de este proyecto
require_once "../Modelos/ModeloVehiculos.php";
 

class ajaxVehiculo{
    
    public $nplaca;
    public $imagen;
 public $nombreImagen;
    #Se usa para identificar si es la imagen 1,2,3 o4 a modificar ya que se recive del ajax
   public $nimagen; 
    public function alquilar(){
        
        
        #---------------------------------------------
         $datosAlquiler=array(
                    "placa"=>$this->nplaca,
                    "imagen"=>$this->imagen,
             "nombreImagen"=>$this->nombreImagen,
             "numero"=>$this->nimagen
                    
                   
                );
        
        #se obtiene la ruta de la imagen a eliminar y luego se manda la ruta para eliminarla de la bd y de la carpeta
        $ruta=VehiculosModel::obtenerRutaImagenModel($datosAlquiler,"tvehiculos");
        $rutaImg=$ruta["imagen"];
        $respuesta=VehiculosModel::cambiarImagenModel($datosAlquiler,"tvehiculos",$rutaImg);
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
$a->imagen=$_FILES["file"]["tmp_name"];
$a->nombreImagen=$_FILES["file"]["name"];
$a->nimagen=$_POST["numero"];
$a->alquilar();




?>