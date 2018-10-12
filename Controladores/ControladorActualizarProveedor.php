<?php 

require_once "../Modelos/ModeloActualizarProveedor.php";

#--Clase encargada
class ActualizarProveedorController{
 #--Funcion que se encarga de obtener los datos para ser mostrados por medio del id
    public function editarProveedorController(){
        
        $datos=$_GET["id"];
        $respuesta=EditarProveedor::editarProveedorModel($datos,"tproveedores");
        
        return $respuesta;
        
    }
    
    #-------------------Funcion que se encarga de actualizar los datos----
    
    public function actualizarProveedorController(){
        #---se valida que un campo venga lleno ya que si uno esta lleno lo estaran todos
        #---------------
        if(isset($_POST["nombre"])){
            #----arrray de dato, sin s, el anterior lleva s, xd
            $dato=array(
                    "id"=>$_POST["id"],
                    "nombre"=>$_POST["nombre"],
                    "telefono"=>$_POST["telefono"],
                    "email"=>$_POST["email"],
                    "direccion"=>$_POST["direccion"]
                    
                  
                );
            
            $respuesta=EditarProveedor::actualizarProveedorModel($dato,"tproveedores");
            
            if($respuesta=="success"){
                 echo '
                
               <script>
                alertify.set("notifier","position", "top-center");
               alertify.success("Datos actualizados correctamente");
               
            
               </script>
                
                
                ';
               // header("location:usuarios.php");
               // header("location:..Vistas/usuarios.php?ok=1");
                
            }
            else{
                
                
            }
            
        }
         
        
    }
    
    
   
   
}
?>