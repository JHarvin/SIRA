<?php 

#-------Controlador para actualizar datos usando jquery

//require_once"../Modelos/ModeloActualizarDatos.php";
require_once "../Modelos/ConexionNormal.php";




class ActualizarDatosController{
    
   
     public $id;
    public $nombre;
    public $telefono;
    
    public $direccion;
    public $username;
    public $password;
    
    public function actualizarDatos(){
        $conexion=conexion();
        $idD=$this->id;
        $nombreD=$this->nombre;
        $telefonoD=$this->telefono;
      //  $emailD=$this->email;
        $direccionD=$this->direccion;
        $usuario=$this->username;
        $contraseña=$this->password;
        //----------añadiendo las variables al array
        
        $sql="UPDATE tpersonal set nombre= '.$nombreD' WHERE idpersonal= '$idD'";
       echo $result=mysqli_query($conexion,$sql);
        
      
        
    }
    
}


$a=new ActualizarDatosController();
$a->id=$_POST["id"];
$a->nombre=$_POST["nombre"];
$a->telefono=$_POST["telefono"];
//$a->email="falta";
$a->direccion=$_POST["direccion"];
$a->username=$_POST["user"];
$a->password=$_POST["pass"];

$a->actualizarDatos();



    
  /*  
    public function actualizarDatosFController($idD,$nombreD,$telefonoD,$emailD,$direccionD,$usuario,$contraseña){
        
        #--strtoupper transforma todas las letras a mayusculas
        $datosControladorActualizar =array(
        "nombre"=>strtoupper($nombreD), 
        "telefono"=>$telefonoD, 
       // "email"=>$emailD,
        "direccion"=>$direccionD,
        "username"=>$usuario,
        "password"=>$contraseña,
        "id"=>$idD);
        
        
        $respuesta=ModeloActualizar::actualizarDatosM($datosControladorActualizar,"tpersonal");
        //---la funcion en la clase modelo retorna y si trae la palabra success
        //--entonces se actualizo correctamente, caso contrario traera la palabra 
        //---error---------------------------------------------------------------
     
       echo  $respuesta; 
    }*/
    
    
    



?>