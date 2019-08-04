<?php
// archivo rquired para obtencion del archivo
require_once "Modelos/ModeloLogin.php";
require_once "Modelos/ModeloRegistrarUsuario.php";
require_once "Controladores/ControladorLogin.php";
require_once'fpdf/fpdf.php';
#Para bitacora, NO BORRAR..................
require_once"Controladores/ControladorBitacora.php";
require_once"Modelos/ModeloBitacora.php";

//salida de las vistas al usuario
// esta se encarga de llamar a la funcion
$mvc=new MvcController();
$mvc->plantilla();
