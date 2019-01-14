<?php
#------Hecho por Harvin---------------------------------------


require_once "../Modelos/ModeloVentas.php";
require_once"../Modelos/ModeloProveedores.php";

class DevolverPro{

    public $codigo;
    public $codigonuevo;
    public $precion;
    public $nombre;



    public function enviarPro(){

        $matricula=$this->codigo;
        $codenew=$this->codigonuevo;
        $precionuevo=$this->precion;
        $name=$this->nombre;
        #Se llama a la funcion en el controlador y luego en el controlador llama al
        #modelo que es el encargado de obtener las imagenes eliminarlas y luego eliminar
        #el registro de la bd-----------------------------------------------------------
        $codigoProveedor=DatosProveedor::obtenerCodigoProveedor($name);
        $respuesta=DatosVentas::devolverModelPro($matricula,$codenew,$precionuevo,$codigoProveedor);
        #Si la variable $respuesta cumple con la condicion se retorna 1 con echo al ajax
     echo $respuesta;






    }

}

$a=new DevolverPro();

$a->codigo=$_POST["codigo"];
$a->codigonuevo=$_POST["codigon"];
$a->precion=$_POST["precion"];
$a->nombre=$_POST["tipobateria"];

$a->enviarPro();
