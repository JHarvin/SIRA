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
       
        
        #Luego se manda la ruta al modelo para que sean eliminadas las imagenes
        $respuesta=VehiculosModel::borrarVehiculoModel($placa,"tvehiculos");
        
        #Se retorna al php ajaxEliminarAuto.php para que luego los mande al ajax
        
       return $respuesta;
        
        
    }
}


?>