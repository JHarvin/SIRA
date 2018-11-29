<?php
//Llama al modelo 
require_once"../Modelos/ModeloVentas.php";


class VentasController{
	//clas epara registrar las ventas a la tabla
	public function ventas()
	{//inicio ventas
		if(isset($_POST["codigo"]) && !empty($_POST["codigo"])&&
           isset($_POST["fecha"]) && !empty($_POST["fecha"]) &&
           isset($_POST["precio"]) && !empty($_POST["precio"])&&
           isset($_POST["tipo"]) && !empty($_POST["tipo"])&&
           isset($_POST["idproveedor"]) && !empty($_POST["idproveedor"])&&
           
           isset($_POST["garantia"]) && !empty($_POST["garantia"]))
          
	       {
	       //incio if
	       	$datosVentasController=$array = array( "codigo"=>strtoupper($_POST["codigo"]), 
	       	 "fecha"=>$_POST["fecha"],  "precio"=>$_POST["precio"],
	       	 "tipo"=>$_POST["tipo"],
	       	 "idproveedor"=>$_POST["idproveedor"],
	       	 
	       	 "garantia"=>$_POST["garantia"]);
	       	 
	       	$validarCodigo=DatosVentas::validarCodigo($_POST["codigo"],"tventas");
          
   if($validarCodigo=="error"){
        echo' 
             
            <script type="text/javascript">
              

          alertify.error("El codigo de la bateria ya ha sido vendido");
    
            </script>
            ';  
       
   }else{
       $respuesta=DatosVentas::registroVentasModel($datosVentasController,"tventas");
   
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

                
            
	        
	}//fin de clase

	




           public function mostrarBateriasvendidas(){
        
         $respuesta=DatosVentas::mostrarVentas("tventas","tproveedores");
        
        foreach($respuesta as $row =>$item){
        
        echo'
        
        <tr>
                  <td>'.$item["codigo"].'</td>
                   
                  <td>'.$item["fecha"].' </td>
                   <td>'.$item["precio"].'</td>
                  <td>'.$item["tipo"].'</td>
                                
                 
                  <td>'.$item["nombre"].'</td>
                  <td>'.$item["garantia"].'</td>
                  <td>'.$item["cliente"].'</td>
                  
                              
                  <td>
                   <div class="btn-group" role="group">
                  
                   <a href="#"  class="btn btn-danger" data-toggle="modal" data-target="#modalValidar" ><i class="fa fa-arrow-left"></i> </a>
            </td>

          </tr>
        ';
        }
        ?>          
              <?php 
        
    }
    
      public function mostrarDevoluciones(){
        
         $respuesta=DatosVentas::mostrarDev("tdevoluciones");
        
        foreach($respuesta as $row =>$item){
        
        echo'
        
        <tr>
                  <td>'.$item["codigo"].'</td>
                  <td>'.$item["tipo"].'</td>
                                
                 
                  
                  <td>'.$item["importe"].'</td>
                  <td>'.$item["fecha"].'</td>
                  <td>'.$item["estado"].'</td>
                              
                  <td>
                   <div class="btn-group" role="group">
                  
                   <a href="#"  class="btn btn-danger" data-toggle="modal" data-target="#modalValidar" ><i class="fa fa-arrow-left"></i> </a>
            </td>

          </tr>
        ';
        }
        ?>          
              <?php 
        
    }

	
}

?>