<?php
//Llama al modelo 
require_once"../Modelos/ModeloVentas.php";
require_once"../Modelos/ModeloRegistroBaterias.php";
class VentasController{
	//clas epara registrar las ventas a la tabla
	public function ventas()
	{//inicio ventas
		if(isset($_POST["cliente"]) && !empty($_POST["cliente"]) && 
           isset($_POST["direccion"]) && !empty($_POST["direccion"]) && 
           isset($_POST["fecha"]) && !empty($_POST["fecha"]) &&
           isset($_POST["codigo"]) && !empty($_POST["codigo"])&&
           isset($_POST["tipo"]) && !empty($_POST["tipo"])&&
           isset($_POST["proveedor"]) && !empty($_POST["proveedor"])&&
           isset($_POST["precio"]) && !empty($_POST["precio"])
           )
          
	       {
	       //incio if
	       	$datosVentasController=$array = array("nombre" =>strtoupper($_POST["nombre"]),
	       	 "direccion"=>$_POST["direccion"], 
	       	 "fecha"=>$_POST["fecha"],  
	       	 "codigo"=>$_POST["codigo"],
	       	 "tipo"=>$_POST["tipo"],
	       	 "proveedor"=>$_POST["proveedor"],
	       	 "precio"=>$_POST["precio"]);
	       	 
	       	
            //fin if
	        }
	}//fin de clase

	public function mostrarventas(){
		 $respuesta=DatosVentas::mostrarventas("tventas");

		 foreach ($respuesta as $row => $item) {
		 	echo'
		 	<tr>
		 	         <td>'.$item["cliente"].'</td>
		 	         <td>'.$item["direccion"].'</td>
		 	         <td>'.$item["fecha"].'</td>
		 	         <td>'.$item["codigo"].'</td>
		 	         <td>'.$item["tipo"].'</td>
		 	         <td>'.$item["proveedor"].'</td>
		 	       
		 	         

		 	      <td>
                   <div class="btn-group" role="group">
                  <a href="" id="btnEditar" name="btnEditar" class="btn btn-info"   >
                  <i class="fa fa-money"></i>
                  </a>
                 
                  </td>

		 	       

		 	</tr>
		 	   ';
        }
        ?>   
              <?php 
		} 
	
}

?>