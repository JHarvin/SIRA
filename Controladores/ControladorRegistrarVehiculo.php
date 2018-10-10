<?php 

#CLASE CONTROLADOR PARA REGISTRAR EL VEHICULO
#--------------------------------------------------
#-----------------------------------------------------------------------------
require_once"../Modelos/ModeloVehiculos.php";
#-----------------------------------------------------------------------------
require_once"../Modelos/ModeloAlquiler.php";
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
        #Botones de la tabla
         #---------------------------------------------------------------------------------------
        #Variable para mostrar si el auto esta disponible -> se consulta el placa si es igual a la que esta en la tabla primaria y si esta en la secundaria se pondra alquilado
        #----------------------------------------------------------------------------------------
        
        $respuesta=VehiculosModel::mostrarVehiculoModel("tvehiculos");
        
         foreach($respuesta as $row =>$item){
             #Se consulta la placa del auto como se dijo en el comentario arriba de la variable status
             $estado=ModeloAlquilar::verificarEstadoAlquilerModel($item["numero_de_placa"],"talquiler");
             #-------------------------------------------------------------------------------------------
             #Se verifica si la columna status tenga 0 ya que si tiene 0 el auto esta en alquiler, si es 1 esta disponible y si es 2 es que ya fue alquilado y devuelto
             #-------------------------------------------------------------------------------------------
        if($estado=="success"){
            $status="En alquiler";
            #Se mustran los botones desabilitados de la tabla
            #----------------------------------------------------------
            echo'
        
        <tr>
        <td><a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalDetalle" ><i class="fa fa-info-circle"></i></a></td>
                  <td>'.$item["numero_de_placa"].'</td>
                  <td>'.$item["marca"].' '.$item["year"].'
                  
                  </td>
                  <td>'.$item["tipo"].'</td>
                  <td>'.$item["color"].'</td>
                  
                  <td>'.$item["tipocombustible"].'</td>
                  <td>'.$status.'</td>
                  <td>
                  
                  <div class="btn-group" role="group" disabled>
                  
                  <a href="#" class="btn btn-secondary" disabled><i class="fa fa-location-arrow"></i></a>
                  
                   <a href="#" class="btn btn-info" disabled><i class="fa fa-edit"></i></a>
                  
                  <a href="#" class="btn btn-danger" disabled><i class="fa fa-trash-o"></i></a>
                  </div>
                  </td>
                 <td hidden>'.$item["imagen"].'</td>
                 <td hidden>'.$item["imagen2"].'</td>
                 <td hidden>'.$item["imagen3"].'</td>
                 <td hidden>'.$item["imagen4"].'</td>
                 
                </tr>
        
        ';
        }
        else if($estado=="error"){
            $status="Disponible";
        echo'
        
        <tr>
        <td><a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalDetalle" ><i class="fa fa-info-circle"></i></a></td>
                  <td>'.$item["numero_de_placa"].'</td>
                  <td>'.$item["marca"].' '.$item["year"].'
                  
                  </td>
                  <td>'.$item["tipo"].'</td>
                  <td>'.$item["color"].'</td>
                  
                  <td>'.$item["tipocombustible"].'</td>
                  <td>'.$status.'</td>
                  <td>
                  
                  <div class="btn-group" role="group">
                  
                  <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modalOpcion" ><i class="fa fa-location-arrow"></i></a>
                  
                   <a href="actualizarAuto.php?id='.$item["numero_de_placa"].'" class="btn btn-info" ><i class="fa fa-edit"></i></a>
                  
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
        }
        //-----------------FALTA AGREGAR IMAGEN<-------------<--------<-------
    }
    
    #--------------------------------------------------------------
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
    
    #---------------------------------------------
    #Editar vehiculo---funcion que obtiene el id por el get para consultar los datos en la bd para mostrarlos en la vista de actualizar
    #-------------------------------------------
    public function editarVehiculoController(){
        #El id sera la placa del carro
        if(isset($_GET["id"]) && !empty($_GET["id"])){
            
           $respuesta=VehiculosModel::editarVehiculoModel($_GET["id"],"tvehiculos"); 
            return $respuesta;
            
        }
        
    }
    
}



    
