<?php 
class Detalles{
    public $boton;//solo es para que entre al ajax
    public function verDetalles(){
         $respuesta=MantenimientoModel::ingresarKiloMesesModel();
        
    }
}