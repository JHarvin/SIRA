<?php 
#Clase para registrar un nuevo proveedor
require_once"../Modelos/ModeloProveedores.php";

 class RegistrarProveedorController
 {
	public function registrarProveedor(){
   
    if(isset($_POST["nombre"]) && !empty($_POST["nombre"]) && 
          isset($_POST["telefono"]) && !empty($_POST["telefono"]) && 
          isset($_POST["email"]) && !empty($_POST["email"]) &&
           isset($_POST["direccion"]) && !empty($_POST["direccion"])
          ){


       
            
   $datosProveedorController =array("nombre"=>strtoupper($_POST["nombre"]), 
          "telefono"=>$_POST["telefono"], 
        "email"=>$_POST["email"],
        "direccion"=>$_POST["direccion"]);

     
  $respuesta=DatosProveedor::registroProveedorModel($datosProveedorController,"tproveedores");
   
   if( $respuesta=="success"){
            echo' 
             
            <script type="text/javascript">
              

          alertify.success("Registro Guardado    ✔");
   
            </script>
            ';
        }
          else {
               echo' 
             
            <script type="text/javascript">
              

          alertify.error("Algo salio mal :(");
    
            </script>
            ';  
                
            }
        
        
        
        
        }


	       
        }
        
        public function mostrarProveedores(){
        
         $respuesta=DatosProveedor::mostrarProveedoresModel("tproveedores");
        
        foreach($respuesta as $row =>$item){
        
        echo'
        
        <tr>
                  <td>'.$item["nombre"].'</td>
                  <td>'.$item["telefono"].' </td>
                  <td>'.$item["email"].'</td>
                  <td>'.$item["direccion"].'</td>
                 
                  
                  <td>
                  <div class="btn-group" role="group">
                  <a href="actualizarDatosUsuario.php?id='.$item["idproveedor"].'" id="btnEditar" name="btnEditar" class="btn btn-info"   ><i class="fa fa-edit"></i></a>
                  <a href="usuarios.php?idb='.$item["idproveedor"].'" class="btn btn-danger" onclick=""><i class="fa fa-trash-o"></i></a>
                  </div>
                  </td>
                 
                </tr>
        
        ';
        }
        
        
    }
        
    
}
?>

