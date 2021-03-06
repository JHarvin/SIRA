<?php
#Clase para registrar un nuevo proveedor
require_once"../Modelos/ModeloRegistroBaterias.php";
require_once"../Controladores/ControladorBitacora.php";
require_once"../Modelos/ModeloBitacora.php";

 class RegistrarBateriasController
 {
  public function registrarBaterias(){

    if(isset($_POST["tipo"]) && !empty($_POST["tipo"]) &&
          isset($_POST["codigo"]) && !empty($_POST["codigo"]) &&
          isset($_POST["idproveedor"]) && !empty($_POST["idproveedor"]) &&
           isset($_POST["precio_venta"]) && !empty($_POST["precio_venta"])&&
           isset($_POST["fecha_venta"]) && !empty($_POST["fecha_venta"])&&
           isset($_POST["precio_unitario"]) && !empty($_POST["precio_unitario"])
          ){

   $datosBateriasController =array("tipo"=>$_POST["tipo"],
          "codigo"=>strtoupper($_POST["codigo"]),
        "idproveedor"=>$_POST["idproveedor"],
        "precio_venta"=>$_POST["precio_venta"],
        "fecha_venta"=>$_POST["fecha_venta"],
        "precio_unitario"=>$_POST["precio_unitario"]);

#Para validar codigo de la bateria
 $validarCodigo=DatosBaterias::validarCodigo($_POST["codigo"],"tproductos");
   if($validarCodigo=="error"){
        echo'

            <script type="text/javascript">


          alertify.error("El codigo de la bateria ya ha sido registrado");

            </script>
            ';

   }else{
       $respuesta=DatosBaterias::registroBateriasModel($datosBateriasController,"tproductos");
     $bitacora=new BitacoraController();
    $bitacora->guardarBitacoraController("Se realizó el registro de una bateria ");
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



           public function mostrarBaterias(){

         $respuesta=DatosBaterias::mostrarBateriasModel("tproductos","tproveedores");

        foreach($respuesta as $row =>$item){

        echo'

        <tr>
                  <td>'.$item["tipo"].'</td>
                  <td>'.$item["codigo"].' </td>
                  <td>'.$item["nombre"].'</td>
                  <td>'.$item["precio_unitario"].'</td>
                  <td>'.$item["precio_venta"].'</td>
                  <td>'.date("d/m/Y", strtotime($item["fecha_venta"])).'</td>

                  <td>
                   <div class="btn-group" role="group">
                  <a href="actualizarbaterias.php?id='.$item["idproducto"].'" id="btnEditar" name="btnEditar" class="btn btn-info"   >
                  <i class="fa fa-edit"></i></a>
                  <a href="generarVentas.php?id='.$item["idproducto"].'" class="btn btn-danger" onclick=""><i class="icon fa fa-cart-plus fa-3x"></i></a>
                  </td>

          </tr>
        ';
        }
        ?>
              <?php

    }


     public function Baterias(){
$datos=$_GET["id"];
$respuesta=DatosBaterias::ventasBateriasModel($datos,"tproductos");
return $respuesta;

     }

}
?>
