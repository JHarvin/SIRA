<?php 
//Eta clase sera creada para cambiar los datos de registro de baterias.
require_once "../Modelos/ModeloActualizarBaterias.php";
//Clase de Actualizar baterias que se encarga de odtener los datos a travez de una funcion por medio de su id.

/**
* 
*/
class  editarBateriasController
{
	
	public function EditarBateriasController()
	{
		$datos=$_GET["id"];
		$respuesta=EditarBateria::EditarBateriaModel($datos,"tproductos");
		return $respuesta;
	}

	//Para actualizar los datos de las baterias
	public function actualizarBateriasController()
	{
     if (isset($_POST["codigo"])) {
     $dato=array("id" =>$_POST["id"],
     	         "tipo" =>$_POST["tipo"],
     	         "codigo" =>$_POST["codigo"],
     	         "precio_unitario" =>$_POST["precio_unitario"],
     	         "idproveedor" =>$_POST["idproveedor"],
     	         "precio_venta" =>$_POST["precio_venta"],
     	         "fecha_venta" =>$_POST["fecha_venta"],
     	);
     //
     $respuesta=EditarBateria::actualizarBateriasModel($dato, "tproductos");
      if ($respuesta=="success") {
      	# code...
      	echo ' <script>
                alertify.set("notifier","position", "top-center");
               alertify.success("Datos actualizados exitosamente");
               </script>';
      }else{


      }//fin del es

     }//fin del primer if del post
	}
}//fin de la clase
//fin php
?>