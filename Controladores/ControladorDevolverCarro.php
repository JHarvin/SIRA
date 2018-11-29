<?php
require_once"../Modelos/ModeloAlquiler.php";
class DevolverCarroController{
    public $placaf;
    
    public function devolverCarro(){
        $placa=$this->placaf;
        
        $respuesta=ModeloAlquilar::devolverCarroModel($placa);
        echo $respuesta;
    }
}

$devolver=new DevolverCarroController();
$devolver->placaf=$_POST["placa"];
$devolver->devolverCarro();