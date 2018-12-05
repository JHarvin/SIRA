<?php
require_once"../Modelos/ModeloMantenimiento.php";
class DevolverCarroController{
    public $placaf;
    
    public function devolverCarro(){
        $placa=$this->placaf;
        
        $respuesta=MantenimientoModel::sacarModel($placa);
        echo $respuesta;
    }
}

$devolver=new DevolverCarroController();
$devolver->placaf=$_POST["placa"];
$devolver->devolverCarro();