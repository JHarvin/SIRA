<?php 

#CLASE CONTROLADOR PARA REGISTRAR EL VEHICULO
require_once"../Modelos/ModeloVehiculos.php";
class RegistrarVehiculoController{
    
    public function registrarVController(){
        #SE VALIDARA SOLO UNO POR EL MOMENTO YA QUE QUIERO QUE FUNCIONE A LAS YA
        if(isset($_POST["nplaca"])){
           
            $datosController =array(
                "placa"=>strtoupper($_POST["nplaca"]),
                "marca"=>$_POST["marca"], 
        "tipo"=>$_POST["tipo"],
        "color"=>$_POST["color"],
        "numero_motor"=>$_POST["numero_motor"],
        "chasis"=>$_POST["chasis"],
        "tcombustible"=>$_POST["tcombustible"],
        "costo"=>$_POST["costo"],
        "imagen"=>$_POST["imagen"] );
           
             
           $respuesta=VehiculosModel::registroVehiculoModel($datosController,"tvehiculos");
        
        if( $respuesta=="success"){
            echo' 
             
            <script type="text/javascript">
             alertify.set("notifier","position", "top-center");

          alertify.success("Vehiculo Registrado    ✔");

        


        
            </script>
            ';
        }
            
            else {
               echo' 
             
            <script type="text/javascript">
             alertify.set("notifier","position", "top-center");

          alertify.error("Algo salio mal "'.$_POST["nplaca"].');




        
            </script>
            ';  
                
            }
            
        }
        
        
    }
    
    
}



    
