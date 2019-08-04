<?php
require_once"../Modelos/ModeloMantenimiento.php";
class TiempoController{
    public $placa;
    public $km;
    public $mes;
    public function guardarTiempoController(){
        $respuesta;
        $datos=array("placa"=>$this->placa,
                     "km"=>$this->km,
                     "meses"=>$this->mes);
                     $verificar=MantenimientoModel::verificarTiempo($datos,"tkilometraje");
                     if($verificar=="success"){

$respuesta = MantenimientoModel::updateKiloMesesModel($datos, "tkilometraje");

                     }
                     else{

$respuesta = MantenimientoModel::ingresarKiloMesesModel($datos, "tkilometraje");

                     }
        
        echo $respuesta;
        
    }
    
    
}

$guardar=new TiempoController();
$guardar->placa=$_POST["placa"];
$guardar->km=$_POST["km"];
$guardar->mes=$_POST["meses"];
$guardar->guardarTiempoController();