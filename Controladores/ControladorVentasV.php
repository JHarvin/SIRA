<?php
require_once"../Modelos/ModeloVentas.php";
class VentasController{
    public $codigo;
    public $tipo;
    public $idproveedor;
    public $precio;
    public $fecha;
    public $cliente;
    public $direccion;
    public $garantia;
    public function guardarVentaController(){
        $datos=array("codigo"=>$this->codigo,
                     "tipo"=>$this->tipo,
                     "proveedor"=>$this->idproveedor,
                    "precio"=>$this->precio,
                    "fecha"=>$this->fecha,
                    "cliente"=>$this->cliente,
                    "direccion"=>$this->direccion,
                    "garantia"=>$this->garantia);
        $respuesta=DatosVentas::guardarVentaModel($datos,"tventas");
        echo $respuesta;
        
    }
    
    
}

$guardar=new VentasController();
$guardar->precio=$_POST["precio"];
$guardar->fecha=$_POST["fecha"];
$guardar->cliente=$_POST["cliente"];
$guardar->direccion=$_POST["direccion"];
$guardar->garantia=$_POST["garantia"];
$guardar->codigo=$_POST["codigo"];
$guardar->tipo=$_POST["tipo"];
$guardar->idproveedor=$_POST["proveedor"];
$guardar->guardarVentaController();