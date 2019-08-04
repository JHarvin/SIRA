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
        
       #Se obtiene la direccion de cada imagen y luego se elimina
       $imagenes=VehiculosModel::obtenerDireccionImagenes($placa,"tvehiculos");
        #se procede a eliminar las imagenes
        #se puede hacer en el modelo pero por esta vez sera aqui en el controlador
        unlink($imagenes["imagen"]);
        unlink($imagenes["imagen2"]);
        unlink($imagenes["imagen3"]);
        unlink($imagenes["imagen4"]);

        #Luego se manda la ruta al modelo para que sean eliminadas las imagenes
        return VehiculosModel::borrarVehiculoModel($placa,"tvehiculos");
        
        #Se retorna al php ajaxEliminarAuto.php para que luego los mande al ajax
        
       
        
        
    }
}