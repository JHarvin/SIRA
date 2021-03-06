<?php

#CLASE CONTROLADOR PARA REGISTRAR EL VEHICULO
#--------------------------------------------------
#-----------------------------------------------------------------------------
require_once"../Modelos/ModeloVehiculos.php";
#-----------------------------------------------------------------------------
require_once"../Modelos/ModeloAlquiler.php";
#-----------------------------------------------------------------------------
require_once"../Modelos/ModeloPrecios.php";
#-----------------------------------------------------------------------------
require_once"../Modelos/ModeloBitacora.php";
#-----------------------------------------------------------------------------
require_once"ControladorBitacora.php";


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
        $bitacora=new BitacoraController();
        $bitacora->guardarBitacoraController("Se registro el vehiculo placas: ".$_POST["nplaca"]);
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
    
    public function mostrarVehiculosController(){
        #Botones de la tabla
         #---------------------------------------------------------------------------------------
        #Variable para mostrar si el auto esta disponible -> se consulta el placa si es igual a la que esta en la tabla primaria y si esta en la secundaria se pondra alquilado
        #----------------------------------------------------------------------------------------

        $respuesta=VehiculosModel::mostrarVehiculoModel("tvehiculos");

         foreach($respuesta as $row =>$item){
             #Se consulta la placa del auto como se dijo en el comentario arriba de la variable status
             $estado=ModeloAlquilar::verificarEstadoAlquilerModel($item["numero_de_placa"],"talquiler");
             $mantenimiento=VehiculosModel::verificarMantenimiento($item["numero_de_placa"]);
             #-------------------------------------------------------------------------------------------
             #Se verifica si la columna status tenga 0 ya que si tiene 0 el auto esta en alquiler, si es 1 esta disponible y si es 2 es que ya fue alquilado y devuelto
             #-------------------------------------------------------------------------------------------
        if($estado=="success"){
            $status="En alquiler";
            #Se mustran los botones desabilitados de la tabla
            #----------------------------------------------------------
            echo'

        <tr class="table-info">
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

                  <button class="btn btn-secondary" disabled><i class="fa fa-location-arrow" disabled></i></button>

                   <button href="#" class="btn btn-info" disabled><i class="fa fa-edit" disabled></i></button>

                  <button class="btn btn-danger" disabled><i class="fa fa-trash-o" disabled></i></button>
                  </div>
                  </td>
                 <td hidden>'.$item["imagen"].'</td>
                 <td hidden>'.$item["imagen2"].'</td>
                 <td hidden>'.$item["imagen3"].'</td>
                 <td hidden>'.$item["imagen4"].'</td>
                <td hidden>'.$item["numerochasis"].'</td>
                <td hidden>'.$item["numeromotor"].'</td>
                </tr>

        ';
        }
             if($mantenimiento["estado"]==0 && $mantenimiento["placa"]==$item["numero_de_placa"]){
                 $status="En mantenimiento";
                             echo'

        <tr class="table-warning">
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

                  <button class="btn btn-secondary" disabled><i class="fa fa-location-arrow" disabled></i></button>

                   <button href="#" class="btn btn-info" disabled><i class="fa fa-edit" disabled></i></button>

                  <button class="btn btn-danger" disabled><i class="fa fa-trash-o" disabled></i></button>
                  </div>
                  </td>
                 <td hidden>'.$item["imagen"].'</td>
                 <td hidden>'.$item["imagen2"].'</td>
                 <td hidden>'.$item["imagen3"].'</td>
                 <td hidden>'.$item["imagen4"].'</td>
                <td hidden>'.$item["numerochasis"].'</td>
                <td hidden>'.$item["numeromotor"].'</td>
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
                 <td hidden>'.$item["numerochasis"].'</td>
                <td hidden>'.$item["numeromotor"].'</td>
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
             $precio=PreciosModel::obtenerPrecioModel($item["numero_de_placa"],"tprecios");
             if($precio["contador"]==1){
                 echo'

        <tr>

                  <td>'.$item["numero_de_placa"].'</td>
                  <td>'.$item["marca"].' '.$item["year"].'</td>
                  <td>'.$item["tipo"].'</td>
                  <td>'.$item["color"].'</td>

                  <td>'.$item["tipocombustible"].'</td>
                  <td>'.$precio["precio"].'</td>
                  <td>
                  <div class="btn-group" role="group">

                  <button disabled class="btn btn-primary" data-toggle="modal" data-target="#modalPrecio" ><i class="fa fa-money" title="registrar precio"></i></button>
                  <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#modalPrecioEditar" ><i class="fa fa-edit" title="editar precio"></i></a>



                  </div>
                  </td>


                </tr>

        ';
                 
             }else{
                 
                 echo'

        <tr>

                  <td>'.$item["numero_de_placa"].'</td>
                  <td>'.$item["marca"].' '.$item["year"].'</td>
                  <td>'.$item["tipo"].'</td>
                  <td>'.$item["color"].'</td>

                  <td>'.$item["tipocombustible"].'</td>
                  <td>Sin precio</td>
                  <td>
                  <div class="btn-group" role="group">

                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalPrecio" ><i class="fa fa-money" title="registrar precio"></i></a>
                  <button disabled class="btn btn-secondary" data-toggle="modal" data-target="#modalPrecioEditar" ><i class="fa fa-edit" title="editar precio"></i></button>



                  </div>
                  </td>


                </tr>

        ';
             }
        
        }
        
    }
    public function actualizarImgController($img,$posicion,$placa){
        
        $nombreI=$img["imagen"]["name"];
        $archivo=$img["imagen"]["tmp_name"];
        if($posicion==0){$posicion="imagen";}
        else if($posicion==2){$posicion="imagen2";}
        else if($posicion==3){$posicion="imagen3";}
        else{$posicion="imagen4";}
        #Borra la imagen del direcctorio
         //$editar=VehiculosModel::borrarImgModel($nombreI,$archivo,$posicion,$placa,"tvehiculos");
    #Actualiza la imagen con el nuevo direcctorio
         $respuesta=VehiculosModel::actualizarImgModel($nombreI,$archivo,$posicion,$placa,"tvehiculos");
        if($respuesta=="success"){
            return "success";
        }else{return "error";}
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

    #Para actualizar datos sin imagenes
    public function actualizarVehiculoController(){
        #Para validar
        if(isset($_POST["n_dplaca"])){

            $datosController=array(
             "placa"=>strtoupper($_POST["n_dplaca"]),
                "marca"=>$_POST["marcac"],
        "tipo"=>$_POST["tipoc"],
        "color"=>$_POST["colorc"],
        "nmotor"=>$_POST["nmotor"],
        "chasis"=>$_POST["chasisn"],
        "tcombustible"=>$_POST["tcombustiblec"],
                "year"=>$_POST["year"]
            );






        $respuesta=VehiculosModel::actualizarVehiculoModel($datosController,"tvehiculos");
        $bitacora=new BitacoraController();
         $bitacora->guardarBitacoraController("Se actualizaron los datos del vehiculo placas: ".$_POST["n_dplaca"]);
       
        if( $respuesta=="success"){
            echo'

            <script type="text/javascript">


          alertify.success("Datos actualizados   ✔");





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
        #----------------------------------------------------------------------------
        #Cierre del if del primer if donde se valida que traigan datos las variables
        #----------------------------------------------------------------------------

    }

    #----------------------------------------------------------
    #Funcion para mostrar los datos de mantenimiento del carro----Me costo dos dias y medio terminar esta funcion by harvin ramos
    #----------------------------------------------------------
   public function mantenimientoController(){
         $respuesta=VehiculosModel::mostrarVehiculoModel("tvehiculos");
             foreach($respuesta as $row =>$item){
                 $km="00";
                 $mes="00/00/0000";
                 $colortd="";
                 $fechaProxima="sin definir";
$estado=ModeloAlquilar::verificarEstadoAlquilerModel($item["numero_de_placa"],"talquiler");   
$mantenimiento=VehiculosModel::verificarMantenimiento($item["numero_de_placa"]);
$kilometraje=VehiculosModel::verKmModel($item["numero_de_placa"]); 
$mante=VehiculosModel::verificarMantenimientoTodos($item["numero_de_placa"]);                 
                 if($kilometraje["placa"]==$item["numero_de_placa"]){
                         $km=$kilometraje["km"];
                     $mes=$kilometraje["mes"];
                     $fecha=$kilometraje["fecha"];
                     #Para sumar meses y validar
                     //este se muesra en la tabla
                     $fechaProxima=date("d/m/Y",strtotime($fecha."+ $mes month"));
                     // y este para colorear
                     $fechaMesProximo=date("M",strtotime($fecha."+ $mes month"));
                     
                     $fechaActual=date("M");
                   if($fechaActual===$fechaMesProximo){
                       $colortd="#CC4B79; color:white;";
                       
                   }
                     
                     }
                 // if para ver si el carro a sido alquilado
                 
                 if($estado=="success"){
                     
                      echo'

        <tr class="table-info">

                  <td>'.$item["numero_de_placa"].'</td>
                  <td>'.$item["marca"].' '.$item["year"].'</td>
                  <td>'.$item["tipo"].'</td>
                 
                   <td style="background-color:'.$colortd.'">'.$fechaProxima.'</td>
                    <td>
                  <div class="btn-group" role="group">

                  <a href="historial.php?placa='.$item["numero_de_placa"].'" class="btn btn-primary" ><i class="fa fa-eye" title="ver detalles"></i></a>
                  



                  </div>
                  </td>
                
                  
                  <td>
                  <div class="btn-group" role="group">

                  <button disabled href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalMantenimiento" ><i class="fa fa-wrench" title="mantenimiento"></i></button>
                  <button disabled class="btn btn-secondary" data-toggle="modal" data-target="#modalEditar" ><i class="fa fa-edit" title="fecha de revision"></i></button>
                  
     


                  </div>
                  </td>


                </tr>

        '; 

                 }
                 //--if para verificar si el carro esta en mantenimiento
                 if( $mantenimiento["estado"]==0 && $mantenimiento["placa"]==$item["numero_de_placa"]){
                    
                     echo'

        <tr class="table-warning">

                  <td>'.$item["numero_de_placa"].'</td>
                  <td>'.$item["marca"].' '.$item["year"].'</td>
                  <td>'.$item["tipo"].'</td>
                  
                   <td style="background-color:'.$colortd.'">'.$fechaProxima.'</td>
                    <td>
                  <div class="btn-group" role="group">

                  <a href="historial.php?placa='.$item["numero_de_placa"].'" class="btn btn-primary" ><i class="fa fa-eye" title="ver detalles"></i></a>
                  <button id="habilitarCarro" class="btn btn-warning" data-toggle="modal" data-target="#modalQuitarH" >
<li class="fa fa-arrow-up"></li>
</button>



                  </div>
                  </td>
                
                  
                  <td>
                  <div class="btn-group" role="group">

                  <button disabled href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalMantenimiento" ><i class="fa fa-wrench " title="mantenimiento"></i></button>
                  <button disabled  class="btn btn-secondary" data-toggle="modal" data-target="#modalEditar" ><i class="fa fa-edit" title="fecha revision"></i></button>
                  
     


                  </div>
                  </td>


                </tr>

        '; 
                     
                 }
                 //////

                 else if($mantenimiento["placa"]!=$item["numero_de_placa"] && $mante["placa"]!=$item["numero_de_placa"] && $mante["estado"]==1){
                      echo'

        <tr>

                  <td>'.$item["numero_de_placa"].'</td>
                  <td>'.$item["marca"].' '.$item["year"].'</td>
                  <td>'.$item["tipo"].'</td>
                  
                   <td style="background-color:'.$colortd.'">'.$fechaProxima.'</td>
                    <td>
                  <div class="btn-group" role="group">

                  <a href="historial.php?placa='.$item["numero_de_placa"].'" class="btn btn-primary" ><i class="fa fa-eye" title="ver detalles"></i></a>
                  



                  </div>
                  </td>
                
                  
                  <td>
                  <div class="btn-group" role="group">

                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalMantenimiento" ><i class="fa fa-wrench" title="mantenimiento"></i></a>
                  <button  class="btn btn-secondary" data-toggle="modal" data-target="#modalEditar" ><i class="fa fa-edit" title="fecha revision"></i></button>
                  
     


                  </div>
                  </td>


                </tr>

        '; 

                 }
                 else if($estado=="error" && $estado!="success"){
                         echo'

        <tr>

                  <td>'.$item["numero_de_placa"].'</td>
                  <td>'.$item["marca"].' '.$item["year"].'</td>
                  <td>'.$item["tipo"].'</td>
                  
                   <td style="background-color:'.$colortd.'">'.$fechaProxima.'</td>
                    <td>
                  <div class="btn-group" role="group">

                  <a href="historial.php?placa='.$item["numero_de_placa"].'" class="btn btn-primary" ><i class="fa fa-eye" title="ver detalles"></i></a>
                  



                  </div>
                  </td>
                
                  
                  <td>
                  <div class="btn-group" role="group">

                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalMantenimiento" ><i class="fa fa-wrench" title="mantenimiento"></i></a>
                  <button  class="btn btn-secondary" data-toggle="modal" data-target="#modalEditar" ><i class="fa fa-edit" title="fecha revision"></i></button>
                  
     


                  </div>
                  </td>


                </tr>

        '; 
                     
                 }
                 //--if para kilometraje
                 

                 
                  
        
        
        }
    }
}
