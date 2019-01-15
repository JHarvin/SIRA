<?php 

require_once "../Modelos/ModeloActualizarBaterias.php";
require_once"../Controladores/ControladorBitacora.php";
require_once"../Modelos/ModeloBitacora.php";

#--Clase encargada
class ActualizarBateriasController{
 #--Funcion que se encarga de obtener los datos para ser mostrados por medio del id
    public function editarBateriasController(){
        
        $datos=$_GET["id"];
        $respuesta=EditarBateria::editarBateriasModel($datos,"tproductos");
        
        return $respuesta;
        
    }
    
    #-------------------Funcion que se encarga de actualizar los datos----
    
    public function actualizarBateriasController(){
        #---se valida que un campo venga lleno ya que si uno esta lleno lo estaran todos
        #---------------
        if(isset($_POST["tipo"])){
            #----arrray de dato, sin s, el anterior lleva s, xd
            $dato=array(
                    "id"=>$_POST["id"],
                    "tipo"=>$_POST["tipo"],
                    "codigo"=>$_POST["codigo"],
                    "idproveedor"=>$_POST["idproveedor"],
                    "precio_venta"=>$_POST["precio_venta"],
                    "fecha_venta"=>$_POST["fecha_venta"],
                    "precio_unitario"=>$_POST["precio_unitario"]
                  
                );
            
            $respuesta=EditarBateria::actualizarBateriasModel($dato,"tproductos");
             $bitacora=new BitacoraController();
    $bitacora->guardarBitacoraController("Se realizó el registro de una bateria ");
            
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