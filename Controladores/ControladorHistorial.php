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
            <td><button id="btnVer" class="btn btn-warning">ver</button></td>
            </tr>
            ';
        }
     }
    
}