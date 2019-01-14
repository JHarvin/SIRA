<?php 
require_once"ModeloRecuperar.php";
class RecuperarController{
    public $password1;
    public $id;
    public function actualizarContrasenaController(){
        
            $respuesta=RecuperarPassword::actualizarPassword($this->id,$this->password1);
            if($respuesta=="success"){
                echo 1;
            }else{
                echo 0;
            }
        
        
    }
}
$r=new RecuperarController();
$r->password1=$_POST["contrasena"];
$r->id=$_POST["id"];
$r->actualizarContrasenaController();