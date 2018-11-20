<?php
require_once"../Modelos/ModeloMantenimiento.php";
class KilometrajeController{
    public $placa;
    public $tipomantenimiento;
    public $fecha;
    public function guardarKilometraje(){
        $datos=array("placa"=>$this->placa,
                     "tipomantenimiento"=>$this->tipomantenimiento,
                     "fecha"=>$this->fecha);
        $respuesta=MantenimientoModel::guardarKmModel($datos,"tmantenimiento");
        echo $respuesta;
        
    }
    
    
}

$guardar=new KilometrajeController();
$guardar->placa=$_POST["placa"];
$guardar->fecha=$_POST["fecha"];
$guardar->tipomantenimiento=$_POST["tipo"];
$guardar->guardarKilometraje();