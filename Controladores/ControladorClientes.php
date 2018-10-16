<?php 
#-------------------------------------------------------------------------------
#ESTA CLASE SERA LA ENCARGADA DE MANEJAR EL CRUD RESPECTO A LAS VISTAS
#QUE TENGAN QUE VER CON CLIENTES
#LAS CUALES SON: clientes.php y mostrarClientes.php. SE ESTA USANDO EL MVC
#ESTA ES LA CLASE CONTROLADOR
#-------------------------------------------------------------------------------
#--------------------INCIADO POR HARVIN RAMOS-----------------------------------
#-------------------------------------------------------------------------------
#---------Clase encarga de manejar e crud a nivel de controlador..............
require_once"../Modelos/ModeloClientes.php";
class ClientesController{
   
    #FUNCIÓN REGISTRAR

    public function registrarCliente(){
        
        #VALIDACION DE LOS DATOS--------
        if(isset($_POST["nombre"]) && !empty($_POST["nombre"]) && isset($_POST["telefono"]) && !empty($_POST["telefono"]) && isset($_POST["dui"]) && !empty($_POST["dui"]) &&
          isset($_POST["licencia"]) && !empty($_POST["licencia"]) &&
           isset($_POST["direccion"]) && !empty($_POST["direccion"] &&
        isset($_POST["sexo"]) && !empty($_POST["sexo"])                                      )
          ){
            
            # validacion que todo este correcto es decir caracteres y cantidad de estos lado servidor
            # preg_match realiza una comparacion de expresiones regulares
            #solo es una prueba
            if(preg_match('/^[a-zA-Z]+$/',$_POST["nombre"]) && preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/',$_POST["email"]) &&
              preg_match('/^[0-9]+$/',$_POST["telefono"])
              ){}
            if($_POST["sexo"]=="Masculino" ){
                $genero="M";
            }
            else if($_POST["sexo"]=="Femenino"){
                $genero="F";
            }
            #--strtoupper transforma todas las letras a mayusculas
        $datosClienteController =array("nombre"=>$_POST["nombre"], "telefono"=>$_POST["telefono"], 
        "dui"=>$_POST["dui"],
        "licencia"=>$_POST["licencia"],
        "direccion"=>$_POST["direccion"],
        "genero"=>$genero);
        
            #-----VAlidamos dui y lencia llamando a las dos funciones en el modelo
            #------------------------------------
            #--Validamos el dui que no se repita
            #-----------------------------------
            $validarDui=DatosCliente::validarDui($_POST["dui"],"tclientes");
            
            #-----------------------------------
            #--Validamos la licencia que no haya sido ingresada antes
            #---------------------------------------------------------
        $validarLicencia=DatosCliente::validarLicencia($_POST["licencia"],"tclientes");
            
            #Validamos el dui
            if($validarDui=="error" || $validarLicencia=="error"){
                
                 echo' 
             
            <script type="text/javascript">
             alertify.set("notifier","position", "top-center");

          alertify.error("Dui o Licencia ya han sido registrados");




        
            </script>
            ';  
                
            }
            
#----------------------------------------------------------------------------            
#Si no da error es decir si el fecht es igual a 0 entonces llamamos a la function y save
#_______________________________________________________________________________________    
        else if($validarDui=="success" && $validarLicencia=="success"){    
            
    $respuesta=DatosCliente::registroClienteModel($datosClienteController,"tclientes");
        
        if( $respuesta=="success"){
            echo' 
             
            <script type="text/javascript">
             alertify.set("notifier","position", "top-right");

          alertify.success("Registro Guardado    ✔");

        


        
            </script>
            ';
        }
            
            else {
               echo' 
             
            <script type="text/javascript">
             alertify.set("notifier","position", "top-right");

          alertify.error("Algo salio mal :(");




        
            </script>
            ';  
                
            }
        }
        
        
        }
        
    
        
    }
    #-------------------------------------------------------------------------
    #MOSTRAR CLIENTES
    #-------------------------------------------------------------------------
    public function mostrarCliente(){
        
         $respuesta=DatosCliente::mostrarClienteModel("tclientes where status=1");
        
        foreach($respuesta as $row =>$item){
            if($item["status"]==1){
            
        echo'
        
        <tr>
                  <td>'.$item["nombre"].'</td>
                  <td>'.$item["telefono"].'
                  </td>
                  <td>'.$item["direccion"].'</td>
                  <td>'.$item["dui"].'</td>
                  <td>'.$item["licencia_de_conducir"].'</td>
                 <td>Habilitado</td>
                
                 
                  
                  <td>
                   <div class="btn-group" role="group">
                  <a href="ModificarClientes.php?id='.$item["dui"].'" id="btnEditar" name="btnEditar" class="btn btn-info"   ><i class="fa fa-edit"></i></a>
                  <a href="#"  class="btn btn-danger" data-toggle="modal" data-target="#modalValidar" ><i class="fa fa-arrow-circle-down"></i></a>
                  </div>
                  </td>
                  
                </tr>
        
        ';
        }
        
    }
        
    }
    #-------------------------------------------------------------------------
    #ACTUALIZAR DATOS DE CLIENTE
    #FALTA HACER, QUITAR COMENTARIO CUANDO SE HAGA, IGUAL LA FUNCION DE BORRAR
    
    public function actualizarCliente(){}
    #-------------------------------------------------------------------------
    #BORRAR CLIENTE
    public function borrarCliente(){}
    #-------------------------------------------------------------------------
    #Función para mostrar los clientes al momento de alquilar un auto
    #-------------------------------------------------------------------------
    public function mostrarClienteAlquiler(){
        $respuesta=DatosCliente::mostrarClienteModel("tclientes");
        
        foreach($respuesta as $row =>$item){
        
        echo'
        
        <tr>
                  <td>'.$item["nombre"].'</td>
                  <td>'.$item["telefono"].'
                  
                  </td>
                  <td>'.$item["direccion"].'</td>
                  <td>'.$item["dui"].'</td>
                  <td>'.$item["licencia_de_conducir"].'</td>
                  
                  
                  
                  <td>'.$item["genero"].'</td>
                 <td>C.Vigente</td>
                  
                  <td>
                  
                   <div class="btn-group" role="group">
                  <a href="#" id="btnAlquilar" name="btnEditar" class="btn btn-success"   data-toggle="modal" data-target="#modalTiempo"><i class="fa fa-plane"></i></a>
                  
                  </div>
                  </td>
                 
                </tr>
        
        ';
        }
    }
    public function editarClientesController(){
        
        $datos=$_GET["id"];
        $respuesta=DatosCliente::editarClientesModel($datos,"tclientes");
      //  echo'<script> alert("entra '.$datos.'");</script>';
        return $respuesta;
        
    }
    
    #-------------------Funcion que se encarga de actualizar los datos----
    
    public function actualizarClientesController(){
        #---se valida que un campo venga lleno ya que si uno esta lleno lo estaran todos
        #---------------
        if(isset($_POST["Nombreu"])){
            #----arrray de dato, sin s, el anterior lleva s, xd
            $dato=array(
                    "dui"=>$_POST["dui"],
                    "nombre"=>$_POST["Nombre"],
                    "telefono"=>$_POST["Telefono"],
                    "direccion"=>$_POST["Direccion"],

                    
                    "licencia"=>$_POST["licencia"],


                    
                   


                    "status"=>$_POST["status"]
                );
                echo'<script>
                alert(""+'.$_POST["duiu"].');
                </script>';
            
            $respuesta=Datoscliente::actualizarClientesModel($dato,"tclientes");
            
            if($respuesta=="success"){
                 echo '
                
               <script>
                alertify.set("notifier","position", "top-center");
               alertify.success("Datos actualizados correctamente");
               
            
               </script>
                
                
                ';
               // header("location:clientes.php");
               // header("location:..Vistas/clientes.php?ok=1");
                
            }
            else{
                echo '
                
               <script>
                alertify.set("notifier","position", "top-center");
               alertify.error("algo salio mal");
               
            
               </script>
                
                
                ';  
                
            }
            
        }
         
        
    } 
      #para inabilitar
      public function inhabilitarController($dui){
         
        $respuesta=DatosCliente::inhabilitarModel($dui,"tclientes");
        
        if($respuesta=="success"){
            return "success";
            
        }else { return "error";}
        
    }
    #para habilitar
    public function habilitarController($dui){
         $respuesta=DatosCliente::habilitarModel($dui,"tclientes");
        
        if($respuesta=="success"){
            return "success";
            
        }else { return "error";}
    }  
    
}


?>