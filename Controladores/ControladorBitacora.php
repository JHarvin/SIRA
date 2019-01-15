<?php

/**
 *
 */
class BitacoraController
{
#Funcion que solo se llamara al iniciar sesion, luego se llamara a otra
  public function guardarBitacoraSesionController($id,$comentario)
  {
    BitacoraModel::guardarBitacoraInicioSesion($id,$comentario);

  }
  #---------------------------------------------------
  #En esta funcion se iran guardando las demas acciones que haga el usuario
  public function guardarBitacoraController($comentario){
    $respuesta=BitacoraModel::obtenerIdModel();
    BitacoraModel::guardarBitacoraModel($respuesta["id"],$comentario);
  }
  #funcion para mostrar la Bitacora
  public function mostrarBitacoraController($id){
    $respuesta=BitacoraModel::mostrarBitacoraModel($id);

    foreach ($respuesta as $row => $item) {
      echo'
      <tr>
      <td>
      <div class="timeline-post">

          <div class="content">

            <p class="text-muted"><small>'.$item["fecha"].'</small></p>
          </div>

        <div class="post-content">
          <p>'.$item["acciones"].'</p>
        </div>

      </div>
      </td>
      </tr>
      ';
    }
  }

  #funcion para obtener el nombre de que usuario es la Bitacora
  public function obtenerNombreController($id){
    $respuesta=BitacoraModel::mostrarBitacoraNombre($id);
    return $respuesta;
  }
}
