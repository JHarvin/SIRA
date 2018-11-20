<?php
require_once"../Modelos/ModeloMantenimiento.php";
class RevisionController{
    public $placa;
    public $fechaFin;
    public $encargado;
    public $servicio;
    public function guardarRevision(){
        $datos=array("placa"=>$this->placa,
                     "fechaFin"=>$this->fechaFin,
                     "encargado"=>$this->encargado,
                     "servicio"=>$this->servicio);
        $respuesta=MantenimientoModel::guardarRevisionModel($datos,"trevision");
        echo $respuesta;
        
    }
    
    
}

$guardar=new RevisionController();
$guardar->placa=$_POST["placa"];
$guardar->fechaFin=$_POST["fechaFin"];
$guardar->encargado=$_POST["encargado"];
$guardar->servicio=$_POST["servicio"];
$guardar->guardarRevision();