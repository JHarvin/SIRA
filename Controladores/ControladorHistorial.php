<?php
require_once"../Modelos/ModeloMantenimiento.php";
class HistorialController{
     public function verHistorial($placa){
         
         $respuesta=MantenimientoModel::verHistorialModel($placa);
        
                   foreach($respuesta as $row => $item){
                                
            echo'<tr>
            <td hidden>'.$placa.'</td>
            <td>'.$item["entrada"].'</td>
            <td>'.$item["salida"].'</td>
            <td><button id="btnVer" class="btn btn-info">
            <li class="fa fa-eye"></li>ver</button></td>
            </tr>
            ';
        }
     }

     public function mostrarMarca($placa){

         $respuesta=MantenimientoModel::mostrarMacaModel($placa);
         return $respuesta;
     }
    
}