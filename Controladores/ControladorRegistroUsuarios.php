<?php 
require_once "../Modelos/ModeloRegistrarUsuario.php";
#Registro de usuarios 
#------------------------------------
#---Iniciado por Harvin Ramos--------
#--Este controlador servira para mandar los datos al modelo y luego el modelo los guardara en la bd
#-------------------------------------------------------------

Class RegistrarUsuarioController{
    
    public function registrarController(){
        #--Variable array para capturar datos--------
        if(isset($_POST["nombre"])){
        $datosControladorRegistro =array("nombre"=>$_POST["nombre"], "telefono"=>$_POST["telefono"], 
        "email"=>$_POST["email"],
        "direccion"=>$_POST["direccion"],
        "username"=>$_POST["username"],
        "password"=>$_POST["password"]);
        
        
        $respuesta=Datos::registroUsuarioModel($datosControladorRegistro,"tpersonal");
        
        echo $respuesta;
        
        
        
        
        }
        
    }
    
}




?>