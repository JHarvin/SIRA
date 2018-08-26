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
    #FUNCION QUE SE USA PARA MOSTRAR LOS CARROS
    #MAS ADELANTE SE CAMBIARA PARA USAR AJAX<-<-<---<----<---<----<...........----------
    public function mostrarVehiculosController(){
        $respuesta=VehiculosModel::mostrarVehiculoModel("tvehiculos");
        
         foreach($respuesta as $row =>$item){
        
        echo'
        
        <tr>
        <td><a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalVer" ><i class="fa fa-info-circle"></i></a></td>
                  <td>'.$item["numero_de_placa"].'</td>
                  <td>'.$item["marca"].'
                  
                  </td>
                  <td>'.$item["tipo"].'</td>
                  <td>'.$item["color"].'</td>
                  <td>'.$item["numeromotor"].'</td>
                  <td>'.$item["numerochasis"].'</td>
                  <td>'.$item["tipocombustible"].'</td>
                  <td class="bg-info"><i class="icon fa fa-road fa fa-3x"></i>

</td>
                  <td>
                  <div class="btn-group" role="group">
                  
                  <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modalEliminar" ><i class="fa fa-truck"></i></a>
                  
                   <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalEliminar" ><i class="fa fa-edit"></i></a>
                  
                  <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar" ><i class="fa fa-trash-o"></i></a>
                  </div>
                  </td>
                 <td hidden>'.$item["imagen"].'</td>
                </tr>
        
        ';
        }
        //-----------------FALTA AGREGAR IMAGEN<-------------<--------<-------
    }
    
    
}



    
