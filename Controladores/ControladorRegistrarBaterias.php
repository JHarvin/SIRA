<?php 
#Clase para registrar un nuevo proveedor
require_once"../Modelos/ModeloRegistroBaterias.php";

 class RegistrarBateriasController
 {
    public function registrarBaterias(){  

   
    if(isset($_POST["tipo"]) && !empty($_POST["tipo"]) && 
          isset($_POST["codigo"]) && !empty($_POST["codigo"]) && 
          isset($_POST["en_existencias"]) && !empty($_POST["en_existencias"]) &&
           isset($_POST["precio_unitario"]) && !empty($_POST["precio_unitario"]) &&
            isset($_POST["idproveedor"]) && !empty($_POST["idproveedor"]) &&
             isset($_POST["precio_venta"]) && !empty($_POST["precio_venta"]) &&
             isset($_POST["fecha_venta"]) && !empty($_POST["fecha_venta"])  
           
          ){


   $datosBateriasController =array("tipo"=>strtoupper($_POST["tipo"]), 
          "codigo"=>$_POST["codigo"], 
          "en_existencias"=>$_POST["en_existencias"],
          "precio_unitario"=>$_POST["precio_unitario"],
          "idproveedor"=>$_POST["idproveedor"],
          "precio_venta"=>$_POST["precio_venta"],
          "fecha_venta"=>$_POST["fecha_venta"]);


    
        
  $respuesta=DatosBaterias::registroBateriasModel($datosBateriasController,"tproductos");

   
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

         public function mostrarBaterias(){
        
         $respuesta=DatosBaterias::mostrarBateriasModel("tproductos");
        
        foreach($respuesta as $row =>$item){
        
        echo'
        
        <tr>
                  <td>'.$item["tipo"].'</td>
                  <td>'.$item["codigo"].' </td>
                  <td>'.$item["en_existencias"].'</td>
                  <td>'.$item["precio_unitario"].'</td>
                  <td>'.$item["idproveedor"].'</td>
                       <td>'.$item["precio_venta"].'</td>
                         <td>'.$item["fecha_venta"].'</td>
                 
                  
                  <td><a href="actualizarDatosUsuario.php?id='.$item["idproducto"].'" id="btnEditar" name="btnEditar" class="btn btn-info"   ><i class="fa fa-edit"></i></a>
                  <a href="usuarios.php?idb='.$item["idproducto"].'" class="btn btn-danger" onclick=""><i class="fa fa-trash-o"></i></a>
                  </td>
                 
                </tr>
        
        ';
        }
        
        
    }

}
?>

