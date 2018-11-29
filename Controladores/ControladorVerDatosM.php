<?php
require_once"../Modelos/ModeloMantenimiento.php";
class VerHistorialDatos{
    public $fecha1;
    public $fecha2;
    public $placaf;
    public function verHistorialdDatos(){
        $fechaInicio=$this->fecha1;
        $fechaFin=$this->fecha2;
        $placa=$this->placaf;
        
        $respuesta=MantenimientoModel::verDatosHistorialModel($fechaInicio,$fechaFin,$placa);
       // echo'<script>alert("entra");</script>';
    
        echo json_encode($respuesta);
        
    }
}
$a=new VerHistorialDatos();
$a->fecha1=$_POST["fechaInicio"];
$a->fecha2=$_POST["fechaFin"];
$a->placaf=$_POST["placa"];
$a->verHistorialdDatos();