<?php
require_once"../Modelos/ModeloVentas.php";
/**
 * para manejar las devoluciones y mostrar los datos
 */
class MostrarComboController
{

  public function mostrarComboSelect()
  {
    // code...
    $respuesta=DatosVentas::mostrarComboBaterias();
foreach ($respuesta as $row => $item) {
  // code...
  echo'
<option  value="'.$item["codigo"].'">Bateria para: '.$item["tipo"].'     Precio:'.$item["precio_venta"].'</option>
  ';
}

  }
}
