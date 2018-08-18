<?php 
require_once "../Modelos/ModeloRegistrarUsuario.php";
#Registro de usuarios 
#------------------------------------
#---Iniciado por Harvin Ramos--------
#--Este controlador servira para mandar los datos al modelo y luego el modelo los guardara en la bd
#-------------------------------------------------------------

class RegistrarUsuarioController{
    //--se utilizara para guardar el genero
    
    public function registrarController(){
        #--Variable array para capturar datos--------
        if(isset($_POST["nombre"]) && !empty($_POST["nombre"]) && isset($_POST["telefono"]) && !empty($_POST["telefono"]) && isset($_POST["email"]) && !empty($_POST["email"]) &&
          isset($_POST["direccion"]) && !empty($_POST["direccion"]) &&
           isset($_POST["username"]) && !empty($_POST["username"]) &&
           isset($_POST["password"]) && !empty($_POST["password"])
           
           
          ){
            
            # validacion que todo este correcto es decir caracteres y cantidad de estos lado servidor
            # preg_match realiza una comparacion de expresiones regulares
            if(preg_match('/^[a-zA-Z]+$/',$_POST["nombre"]) && preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/',$_POST["email"]) &&
              preg_match('/^[0-9]+$/',$_POST["telefono"])
              ){}
            if(isset($_POST["masculino"]) ){
                $genero="M";
            }
            else if(isset($_POST["femenino"])){
                $genero="F";
            }
            #--strtoupper transforma todas las letras a mayusculas
        $datosControladorRegistro =array("nombre"=>strtoupper($_POST["nombre"]), "telefono"=>$_POST["telefono"], 
        "email"=>$_POST["email"],
        "direccion"=>$_POST["direccion"],
        "username"=>$_POST["username"],
        "password"=>$_POST["password"],
        "genero"=>$genero);
        
        
        $respuesta=Datos::registroUsuarioModel($datosControladorRegistro,"tpersonal");
        
        if( $respuesta=="success"){
            echo' 
             
            <script type="text/javascript">
             alertify.set("notifier","position", "top-center");

          alertify.success("Registro Guardado    ✔");

        


        
            </script>
            ';
        }
            
            else {
               echo' 
             
            <script type="text/javascript">
             alertify.set("notifier","position", "top-center");

          alertify.error("Algo salio mal :(");




        
            </script>
            ';  
                
            }
        
        
        
        
        }
        
    }
    
}




?>