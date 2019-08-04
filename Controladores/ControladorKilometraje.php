<?php
require_once"../Modelos/ModeloMantenimiento.php";
class KilometrajeController{
    public $placa;
    public $tipomantenimiento;
    public $fecha;
    public $ffin;
    public $encargado;
    public $servicio;
    public function guardarKilometraje(){
        $datos=array("placa"=>$this->placa,
                     "tipomantenimiento"=>$this->tipomantenimiento,
                     "fecha"=>$this->fecha,"fechaFin"=>$this->ffin,"encargado"=>$this->encargado,"servicio"=>$this->servicio);
        $respuesta=MantenimientoModel::guardarKmModel($datos,"tmantenimiento");
        $respuesta2=MantenimientoModel::guardarRevisionModel($datos,"trevision");
        if($respuesta==$respuesta2)
        echo 1;
        else
            echo 0;
        
    }
    
    
}

$guardar=new KilometrajeController();
$guardar->placa=$_POST["placa"];
$guardar->fecha=$_POST["fecha"];
$guardar->tipomantenimiento=$_POST["tipo"];
$guardar->ffin=$_POST["fechaFin"];
$guardar->encargado=$_POST["encargado"];
$guardar->servicio=$_POST["servicio"];
$guardar->guardarKilometraje();