<?php 
require_once "../Modelos/ModeloRegistrarUsuario.php";
require_once"../Controladores/ControladorBitacora.php";
require_once"../Modelos/ModeloBitacora.php";
#Registro de usuarios 
#------------------------------------
#---Iniciado por Harvin Ramos--------
#--Este controlador servira para mandar los datos al modelo y luego el modelo los guardara en la bd
#-------------------------------------------------------------

function buscaRepetido($username,$password,$conexion){
  $sql="SELECT * from usuarios where usuario='user' and password=$pass";
  $result=mysql_query($conexion,$sql);
  if (mysqli_num_rows($result)>0)
   {
    return 1;
  }else{
    return 0;
  }


}
class RegistrarUsuarioController{
    //--se utilizara para guardar el genero
    
    public function registrarController(){
        #--Variable array para capturar datos--------
        if(isset($_POST["nombre"]) && !empty($_POST["nombre"]) && isset($_POST["telefono"]) && !empty($_POST["telefono"]) && isset($_POST["email"]) && !empty($_POST["email"]) &&
          isset($_POST["direccion"]) && !empty($_POST["direccion"]) &&
           isset($_POST["username"]) && !empty($_POST["username"]) &&
           isset($_POST["password"]) && !empty($_POST["password"])){
            
            # validacion que todo este correcto es decir caracteres y cantidad de estos lado servidor
            # preg_match realiza una comparacion de expresiones regulares
            if(preg_match('/^[a-zA-Z]+$/',$_POST["nombre"]) && preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/',$_POST["email"]) &&
              preg_match('/^[0-9]+$/',$_POST["telefono"])
              ){}
            $genero = $_POST["genero"];
            $seguridad=$_POST["seguridad"];
            if($seguridad=="Administrador" || $seguridad=="A"){
              $seguridad="A";
            }
            else if($seguridad!="Administrador" || $seguridad!="A"){
              $seguridad="N";
            }
            $estado=1;
            #--strtoupper transforma todas las letras a mayusculas
            #--$clave = password_hash($_POST["clave1"], PASSWORD_DEFAULT);
        $datosControladorRegistro =array("nombre"=>$_POST["nombre"],
                                         "telefono"=>$_POST["telefono"], 
        "email"=>$_POST["email"],
        "direccion"=>$_POST["direccion"],
        "username"=>$_POST["username"],
        "password"=> password_hash($_POST["password"], PASSWORD_DEFAULT),
        "genero"=>$genero,
      "seguridad"=>$seguridad);
        
         #-----VAlidamos dui y lencia llamando a las dos funciones en el modelo
            #------------------------------------
            #--Validamos el dui que no se repita
            #-----------------------------------
            $validarusuario=Datos::validarusuario($_POST["username"],"tpersonal");
            
            #-----------------------------------
            #--Validamos la licencia que no haya sido ingresada antes
            #---------------------------------------------------------
        $validarcorreo=Datos::validarcorreo($_POST["email"],"tpersonal");
            
            #Validamos el dui
            if($validarusuario=="error" || $validarcorreo=="error"){
                
                 echo' 
             
            <script type="text/javascript">
             alertify.set("notifier","position", "top-center");

          alertify.error("Usuario o Correo ya han sido registrados");




        
            </script>
            ';  
                
            }
            
#----------------------------------------------------------------------------            
#Si no da error es decir si el fecht es igual a 0 entonces llamamos a la function y save
#_______________________________________________________________________________________    
        else if($validarusuario=="success" && $validarcorreo=="success"){    
            
    $respuesta=Datos::registroUsuarioModel($datosControladorRegistro,"tpersonal");
    $bitacora=new BitacoraController();
    $bitacora->guardarBitacoraController("Se realizó el registro de un Usuario:".$_POST["nombre"]);  
        if( $respuesta=="success"){
            echo' 
             
            <script type="text/javascript">
             alertify.set("notifier","position", "top-right");

          alertify.success("Registro Guardado ");

        


        
            </script>
            ';
        }
            
            else {
               echo' 
             
            <script type="text/javascript">
             alertify.set("notifier","position", "top-right");

          alertify.error("Algo salio mal :(");

       alertify.error("EL USUARIO O CORREO YA HAN SIDO REGISTRADOS PRUEBA OTRA ");



        
            </script>
            ';  
                
            }
        }
    }
    
}


}

