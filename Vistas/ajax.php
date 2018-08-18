<?php 
#------Hecho por Harvin---------------------------------------
#-------------------------------------------------------------------------------
#-----------En este archivo sera el encargado de recibir la información del ajax
#-----------que se encuentra en validarRegistro.js asi como tambien algunos otros
#-----------ajax que se especificaran en cada archivo.
#--------------------------------------------------------------------------------
#-----------Tambien sera el encargado de mandar la informacion al controlador
#-----------y nuevamente recibirla y mandar la respuesta al ajax para mostrar los
#-----------mensajes de guardado con exito.--------------------------------------
#--------------------------------------------------------------------------------

require_once "../Controladores/ControladorActualizarDatos.php";
require_once "../Modelos/ModeloActualizarDatos.php";

class Ajax{
    
    public $id;
    public $nombre;
    public $telefono;
    public $email;
    public $direccion;
    public $username;
    public $password;
    
    public function actualizarDatosModal(){
        
        $idD=$this->id;
        $nombreD=$this->nombre;
        $telefonoD=$this->telefono;
        $emailD=$this->email;
        $direccionD=$this->direccion;
        $usuario=$this->username;
        $contraseña=$this->password;
        
        
        $respuesta=ActualizarDatosController::actualizarDatosFController($idD,$nombreD,$telefonoD,$emailD,$direccionD,$usuario,$contraseña);
        
        //----se retorna el valor obtenido en la clase controlador 0 o 1
        echo $respuesta;
        
    }
    
}

$a=new Ajax();
$a->id=$_POST["id"];
$a->nombre=$_POST["nombre"];
$a->telefono=$_POST["telefono"];
//$a->email="falta";
$a->direccion=$_POST["direccion"];
$a->username=$_POST["user"];
$a->password=$_POST["pass"];

$a->actualizarDatosModal();




?>