<?php
//Llama al modelo 
require_once"../Modelos/ModeloVentas.php";


class VentasController{
	//clas epara registrar las ventas a la tabla
	public function ventas()
	{//inicio ventas
		if(isset($_POST["cliente"]) && !empty($_POST["cliente"]) && 
           isset($_POST["direccion"]) && !empty($_POST["direccion"]) && 
           isset($_POST["fecha"]) && !empty($_POST["fecha"]) &&
           isset($_POST["codigo"]) && !empty($_POST["codigo"])&&
           isset($_POST["tipo"]) && !empty($_POST["tipo"])&&
           isset($_POST["idproveedor"]) && !empty($_POST["idproveedor"])&&
           isset($_POST["precio"]) && !empty($_POST["precio"])&&
           isset($_POST["garantia"]) && !empty($_POST["garantia"]))
          
	       {
	       //incio if
	       	$datosVentasController=$array = array("cliente" =>$_POST["cliente"],
	       	 "direccion"=>$_POST["direccion"], 
	       	 "fecha"=>$_POST["fecha"],  
	       	 "codigo"=>strtoupper($_POST["codigo"]),
	       	 "tipo"=>$_POST["tipo"],
	       	 "idproveedor"=>$_POST["idproveedor"],
	       	 "precio"=>$_POST["precio"],
	       	 "garantia"=>$_POST["garantia"]);
	       	 
	       	$validarCodigo=DatosVentas::validarCodigo($_POST["codigo"],"tventas");
          
   if($validarCodigo=="error"){
        echo' 
             
            <script type="text/javascript">
              

          alertify.error("El codigo de la bateria ya ha sido registrado");
    
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

	public function mostrarventas(){
		 $respuesta=DatosVentas::mostrarventas("tventas","tproveedores");

		 foreach ($respuesta as $row => $item) {
		 	echo'
	<tr>
		 	         <td>'.$item["cliente"].'</td>
		 	         <td>'.$item["direccion"].'</td>
		 	         <td>'.$item["fecha"].'</td>
		 	         <td>'.$item["codigo"].'</td>
		 	         <td>'.$item["tipo"].'</td>
		 	         <td>'.$item["nombre"].'</td>
		 	      
		 	<td>
                   <div class="btn-group" role="group">
                  <a href="" id="btnEditar" name="btnEditar" class="btn btn-info">
                  <i class="fa fa-money"></i></a>
            </td>

	</tr>
		 	   ';
        }
        ?>   
              <?php 
		} 
	
}

?>