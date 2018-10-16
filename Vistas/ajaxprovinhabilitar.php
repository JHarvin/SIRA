<?php 

require_once "../Controladores/ControladorRegistrarProveedor.php";

class InhabilitarAjax{
    
    public $id;
    public function ajaxInhabilitar(){
        
        $ide=$this->id;

        $respuesta=RegistrarProveedorController::inhabilitarController($ide);
        if($respuesta=="success"){
            echo 1;
        
        }
        else{
            echo 0;
        }
    }
}
$a=new InhabilitarAjax();
$a->id=$_POST["id"];
$a->ajaxInhabilitar();
?>