<?php 
// archivo rquired para obtencion del archivo
require_once "Controladores/ControladorLogin.php";

//salida de las vistas al usuario
// esta se encarga de llamar a la funcion
$mvc=new MvcController();
$mvc->plantilla();

?>