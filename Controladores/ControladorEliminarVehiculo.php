<?php 
#Para eliminar vehiculo utilizando ajax
#---------------------------|==================|---------------------------------
#---------------------------|Por: Harvin Ramos:|---------------------------------
#--------------------------|__________________|----------------------------------
#-------------------------|__________________|-----------------------------------
require_once"../Modelos/ModeloVehiculos.php";
class EliminarVehiculoController{
    
    #---------------------------------------------------
    public function eliminarVehiculo($placa){
        #Variable imagenes que las obtiene de la funcion para luego mandar la dir al modelo
        $imagenes=VehiculosModel::obtenerDireccionImagenes($placa,"tvehiculos");
        #Variables ruta solo se le agregara un numero para identificar la imagen
        #Variable ruta1 que obtendra la ruta de la imagen
        $ruta1=$imagenes["imagen"];
        $ruta2=$imagenes["imagen2"];
        $ruta3=$imagenes["imagen3"];
        $ruta4=$imagenes["imagen4"];
        
        #Luego se manda la ruta al modelo para que sean eliminadas las imagenes
        $respuesta=VehiculosModel::borrarVehiculoModel($placa,$ruta1,$ruta2,$ruta3,$ruta4,"tvehiculos");
        
        #Se retorna al php ajaxEliminarAuto.php para que luego los mande al ajax
        
       return $respuesta;
        
        
    }
}


?>