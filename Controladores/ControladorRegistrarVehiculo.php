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
                "ano"=>$_POST["ano"],
        "nombreimagen"=>$_FILES["imagen"]["name"],
        "imagen"=>$_FILES["imagen"]["tmp_name"],
        "nombreimagen2"=>$_FILES["imagen2"]["name"],
        "imagen2"=>$_FILES["imagen2"]["tmp_name"],
        "nombreimagen3"=>$_FILES["imagen3"]["name"],
        "imagen3"=>$_FILES["imagen3"]["tmp_name"],
        "nombreimagen4"=>$_FILES["imagen4"]["name"],
        "imagen4"=>$_FILES["imagen4"]["tmp_name"]);
           
   
      #---------------------------------------------------------------
            #Validamos que la placa ingresada no haya sido registrada antes 
            #---------------------------------------------------------------
            #Llamamos a la funcion en el modelo............................
$validarLicencia=VehiculosModel::validarPlaca(strtoupper($_POST["nplaca"]),"tvehiculos");
           
            if($validarLicencia=="error"){
                        echo' 
             
            <script type="text/javascript">
             

          alertify.error("La placa digitada ya ha sido registrada");




        
            </script>
            '; 
            }
            #Sino se cumple el if llamamos al else if para guardar
            else if($validarLicencia=="success"){
                
                
        $respuesta=VehiculosModel::registroVehiculoModel($datosController,"tvehiculos");
        
        if( $respuesta=="success"){
            echo' 
             
            <script type="text/javascript">
              

          alertify.success("Vehiculo Registrado    ✔");

        


        
            </script>
            ';
        }
            
            else {
               echo' 
             
            <script type="text/javascript">
             

          alertify.error("Algo salio mal en el servidor");




        
            </script>
            ';  
                
            }
                
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
        <td><a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalDetalle" ><i class="fa fa-info-circle"></i></a></td>
                  <td>'.$item["numero_de_placa"].'</td>
                  <td>'.$item["marca"].' '.$item["year"].'
                  
                  </td>
                  <td>'.$item["tipo"].'</td>
                  <td>'.$item["color"].'</td>
                  
                  <td>'.$item["tipocombustible"].'</td>
                  <td>Disponible</td>
                  <td>
                  <div class="btn-group" role="group">
                  
                  <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modalOpcion" ><i class="fa fa-location-arrow"></i></a>
                  
                   <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalEliminar" ><i class="fa fa-edit"></i></a>
                  
                  <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar" ><i class="fa fa-trash-o"></i></a>
                  </div>
                  </td>
                 <td hidden>'.$item["imagen"].'</td>
                 <td hidden>'.$item["imagen2"].'</td>
                 <td hidden>'.$item["imagen3"].'</td>
                 <td hidden>'.$item["imagen4"].'</td>
                 
                </tr>
        
        ';
        }
        //-----------------FALTA AGREGAR IMAGEN<-------------<--------<-------
    }
    
    #--------------------------Saul Reyes------------------------------------
    #------------------------------------------------------------------------
    #Funcion para mostrar los carros en la vista precios.php
    #------------------------------------------------------------------------
    #------------------------------------------------------------------------
    public function mostrarVehiculosPreciosController(){
        $respuesta=VehiculosModel::mostrarVehiculoModel("tvehiculos");
        
         foreach($respuesta as $row =>$item){
        
        echo'
        
        <tr>
        
                  <td>'.$item["numero_de_placa"].'</td>
                  <td>'.$item["marca"].' '.$item["year"].'</td>
                  <td>'.$item["tipo"].'</td>
                  <td>'.$item["color"].'</td>
                  
                  <td>'.$item["tipocombustible"].'</td>
                  <td>$400</td>
                  <td>
                  <div class="btn-group" role="group">
                  
                  <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modalPrecio" ><i class="fa fa-money" title="editar precio"></i></a>
                  
                  
                  </div>
                  </td>
                 
                 
                </tr>
        
        ';
        }
        //-----------------FALTA AGREGAR IMAGEN<-------------<--------<-------
    }
    
    
}



    
