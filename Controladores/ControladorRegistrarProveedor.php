<?php 
#Clase para registrar un nuevo proveedor
require_once"../Modelos/ModeloProveedores.php";

 class proveedorcontrolador 
{
	public function registrarProveedor(){
   
   if(isset($_POST["nombre"])){
           
            $datosController =array(
                "nombre"=>strtoupper($_POST["nombre"]),
                 "telefono"=>$_POST["telefono"], 
                 "email"=>$_POST["email"],
                 "direccion"=>$_POST["direccion"]);


                 $respuesta=DatosProveedor::registroProveedorModel($datosController,"tproveedores");
        if( $respuesta=="success"){
            echo' 
             
            <script type="text/javascript">
             alertify.set("notifier","position", "top-center");

          alertify.success("  ¡Proveedor Registado! ✔ ");

            </script>
            ';
        }
        else {
               echo' 
             
            <script type="text/javascript">
             alertify.set("notifier","position", "top-center");

          alertify.error("Algo salió mal "'.$_POST["nombre"].');

            </script>
            ';  
                
            }
     


	}       
        }
        
        
    
}


