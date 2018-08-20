<?php 
#--Esta clase es la encargada de manejar la edicion y actualizacion

#--La funcion editarUsuarioModel es la encargada de recibir el id a traves del get
#--para luego enviarlo al modelo el cual devuelve un array, y que a su vez esta-
#--funcion se encarga de retornarlo a la vista para ser mostrados los datos del usuario seleccionado-
#----------------------------------------------------------------
#----- by Harvin Ramos
require_once "../Modelos/ModeloActualizarDatos.php";

#--Clase encargada
class ActualizarDatosController{
 #--Funcion que se encarga de obtener los datos para ser mostrados por medio del id
    public function editarUsuarioController(){
        
        $datos=$_GET["id"];
        $respuesta=EditarUsuario::editarUsuarioModel($datos,"tpersonal");
        
        return $respuesta;
        
    }
    
    #-------------------Funcion que se encarga de actualizar los datos----
    
    public function actualizarUsuarioController(){
        #---se valida que un campo venga lleno ya que si uno esta lleno lo estaran todos
        #---------------
        if(isset($_POST["Nombre"])){
            #----arrray de dato, sin s, el anterior lleva s, xd
            $dato=array(
                    "id"=>$_POST["id"],
                    "nombre"=>$_POST["Nombre"],
                    "telefono"=>$_POST["Telefono"],
                    "direccion"=>$_POST["Direccion"],
                    "username"=>$_POST["Username"],
                    "password"=>$_POST["Pass"]);
            
            $respuesta=EditarUsuario::actualizarUsuarioModel($dato,"tpersonal");
            
            if($respuesta=="success"){
                 echo '
                
               <script>
                alertify.set("notifier","position", "top-center");
               alertify.success("Datos actualizados correctamente");
               </script>
                
                
                ';
                
               // header("location:..Vistas/usuarios.php?ok=1");
                
            }
            else{
                
                
            }
            
        }
         
        
    }
    
    
   
   
}
?>