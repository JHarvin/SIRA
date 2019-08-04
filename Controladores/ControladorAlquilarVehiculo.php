<?php 
#-----------------------by Harvin Ramos---------------------------------------------
#En el archivo php que se incluye esta la funcion de registrar el alquiler en la bd
#------------------------------------------------------------------------------------
require_once"../Modelos/ModeloAlquiler.php";

class AlquilarVehiculoController{
    
    
    public function alquilarVehiculo($datosAlquilerController){
  
$respuesta=ModeloAlquilar::registrarAlquilerModel($datosAlquilerController,"talquiler");
        if($respuesta=="success"){
            return "success";
        }
        if($respuesta=="error"){
            return "error";
        }
        
        
    }
    
    public function mostrarAlquilerController(){
        
        $respuesta=ModeloAlquilar::mostrarAlquilerModel();
        foreach($respuesta as $row =>$item){
       
        echo'
        
        <tr>
                  <td>'.$item["placa"].'</td>
                  <td>'.$item["marca"].'
                  
                  </td>
                  <td>'.$item["dui"].'</td>
                  <td>'.$item["cliente"].'</td>
                 
                 
                
                  <td>
                  <div class="btn-group" role="group">
                  

                  <button   class="btn btn-danger" data-toggle="modal" data-target="#modalDevolver" ><i class="fa fa-arrow-down"></i></button>

                 
                  </div>
                  </td>
                 
                </tr>
        
        ';
        }
        
    }
    
}


?>