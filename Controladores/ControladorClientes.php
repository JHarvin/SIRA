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
        $datosClienteController =array("nombre"=>strtoupper($_POST["nombre"]), "telefono"=>$_POST["telefono"], 
        "dui"=>$_POST["dui"],
        "licencia"=>$_POST["licencia"],
        "genero"=>$genero);
        
        
        $respuesta=DatosCliente::registroClienteModel($datosClienteController,"tclientes");
        
        if( $respuesta=="success"){
            echo' 
             
            <script type="text/javascript">
             alertify.set("notifier","position", "top-center");

          alertify.success("Registro Guardado    ✔");

        


        
            </script>
            ';
        }
            
            else {
               echo' 
             
            <script type="text/javascript">
             alertify.set("notifier","position", "top-center");

          alertify.error("Algo salio mal :(");




        
            </script>
            ';  
                
            }
        
        
        
        
        }
        
    
        
    }
    #-------------------------------------------------------------------------
    #MOSTRAR CLIENTES
    #-------------------------------------------------------------------------
    public function mostrarCliente(){
        
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
                 
                  
                  <td><a href="actualizarDatosUsuario.php?id='.$item["idcliente"].'" id="btnEditar" name="btnEditar" class="btn btn-info"   ><i class="fa fa-edit"></i></a>
                  <a href="usuarios.php?idb='.$item["idcliente"].'" class="btn btn-danger" onclick=""><i class="fa fa-trash-o"></i></a>
                  </td>
                 
                </tr>
        
        ';
        }
        
        
    }
    #-------------------------------------------------------------------------
    #ACTUALIZAR DATOS DE CLIENTE
    #FALTA HACER, QUITAR COMENTARIO CUANDO SE HAGA, IGUAL LA FUNCION DE BORRAR
    public function actualizarCliente(){}
    #-------------------------------------------------------------------------
    #BORRAR CLIENTE
    public function borrarCliente(){}
    
    
}


?>