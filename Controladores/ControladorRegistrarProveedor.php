<?php 
//require_once "../Controladores/ControladorRegistrarProveedor.php";
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
        #Para validar email y nombre de proveedor-----------------<--------<---<----
        
        $validarNombre=DatosProveedor::validarNombre($_POST["nombre"],"tproveedores");
        $validarEmail=DatosProveedor::validarEmail($_POST["email"],"tproveedores");

        if($validarNombre=="error" || $validarEmail=="error"){
             echo' 
             
            <script type="text/javascript">
              

          alertify.error("El nombre ingresado ya ha sido registrado");
    
            </script>
            ';  
        }
        else if($validarNombre=="success" || $validarEmail=="success"){
            
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


	       
        }
     public function mostrarCombo(){
       $respuesta=DatosProveedor::mostrarProveedoresModel("tproveedores");   
         foreach($respuesta as $row =>$item){
             
             echo'
             
             <option value="'.$item["idproveedor"].'">'.$item["nombre"].'</option>
             ';
             
         }
     }

     public function mostrarproveedor(){
       $respuesta=DatosProveedor::mostrarProveedoresModel("tproveedores");   
         foreach($respuesta as $row =>$item){
             
             echo'
             
             <option value="'.$item["idproveedor"].'">'.$item["nombre"].'</option>
             ';
             
         }
     }


        //Mostrar los proveedores habilitados
        public function mostrarProveedores(){
        
         $respuesta=DatosProveedor::mostrarProveedoresModel("tproveedores where status=1");
        
        foreach($respuesta as $row =>$item){
        if ($item["status"]==1) {
         
        echo'
        <tr>
                  <td>'.$item["nombre"].'</td>
                  <td>'.$item["telefono"].' </td>
                  <td>'.$item["email"].'</td>
                  <td>'.$item["direccion"].'</td>
                  <td>Habilitado</td>
                   
                  <td>
                  <div class="btn-group" role="group">
                  <a href="actualizarProveedores.php?id='.$item["idproveedor"].'" id="btnEditar" name="btnEditar" class="btn btn-info"  ><i class="fa fa-edit"></i></a>
                  <a href="mostrarProveedores.php"  class="btn btn-danger" data-toggle="modal" data-target="#modalValidar" ><i i class="fa fa-arrow-circle-down"></i></a>
                  </td>
                  </div>
                  </td>
                  <td hidden>'.$item["idproveedor"].'</td>
        </tr>
        
        ';
        }
      }  
    }
//Funcion que miestra los proveedores que estas inahabilitados
     public function provInahabilitadosController(){
        
        $respuesta= DatosProveedor::mostrarProveedoresModel("tproveedores where status=0");
        
        foreach($respuesta as $row =>$item){
        if($item["status"]==0){//inicio if
         
        echo'
        
        <tr>
                  <td>'.$item["nombre"].'</td>
                  <td>'.$item["telefono"].'</td>
                  <td>'.$item["direccion"].'</td>
                  <td>'.$item["email"].'</td>
                   <td></td>
                  <td>Inhabilitado</td>
                
                  <td>
                  <div class="btn-group" role="group">
                  <button id="btnEditar" name="btnEditar" class="btn btn-info" disabled><i class="fa fa-edit"></i></button>
                 
                  <a href="mostrarproveedor.php"  class="btn btn-danger" data-toggle="modal" data-target="#modalValidar" ><i class="fa fa-arrow-circle-up"></i></a>
                  </div>
                  </td>
                 <td hidden>'.$item["idproveedor"].'</td>
       </tr>
        
        ';
        }//fin de if
    }//fin de foreach
  }


   //para habilitar a los proveedores
    public function habilitarProvController($id){
         $respuesta=DatosProveedor::habilitarProvModel($id,"tproveedores");
        
        if($respuesta=="success"){
            return "success";
            
        }else { return "error";}
    }

    //para inabilitar a los proveedores
    public function inhabilitarController($id){
         
        $respuesta=DatosProveedor::inhabilitarProvModel($id,"tproveedores");
        
        if($respuesta=="success"){
            return "success";
            
        }else { return "error";}
        
    }
}//fin de la clase
?>

