<?php 
require_once "../Controladores/ControladorRegistrarProveedor.php";
 
class habilitarAjax{
    
    public $id;
    public function ajaxHabilitar(){
        $ide=$this->id;
        $respuesta=RegistrarProveedorController::habilitarProvController($ide);
        if($respuesta=="success"){
            echo 1;
        } else{
            echo 0;
        }
    }
}
$a=new habilitarAjax();
$a->id=$_POST["id"];
$a->ajaxHabilitar();
?>