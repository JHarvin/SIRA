<?php
require_once"Conexion.php";

class BitacoraModel
{
  #Funcion que se encarga de guardar la bitacora por primera vez
  #Todas las veces que se inicie sesion, para luego llamar a la otra Funcion
  #de guardarBitacoraModel que se encargara de ir guardando las acciones posteriores
  public function guardarBitacoraInicioSesion($id,$comentario){
    #esta funcion se encarga de guardar el id posteriormente otra Funcion
    #se encargara de obtenerlo para ir insertando las acciones que haga el usuario en el sistema
    #--------------------------------------------------------------------
    $stmt =Conexion::conectar()->prepare("INSERT INTO tbitacora(acciones,idpersonal) VALUES (:comentarios,:idpersonal)");

    $stmt->bindParam(":idpersonal", $id, PDO::PARAM_INT);
    $stmt->bindParam(":comentarios", $comentario, PDO::PARAM_STR);

    $stmt->execute();



  }
  #Funcion para obtener el ultimo registro ingresado en la base de Datos
  #para obtener el id y luego insertar
  public function obtenerIdModel(){
    $stmt =Conexion::conectar()->prepare("SELECT MAX(tbitacora.idbitacora) as maximo,tbitacora.idpersonal as id FROM tbitacora");


    $stmt->execute();
    return $stmt->fetch();
    $stmt->close();
  }

    public function guardarBitacoraModel($id,$comentario)
    {
        $stmt =Conexion::conectar()->prepare("INSERT INTO tbitacora(acciones,idpersonal) VALUES (:comentarios,:idpersonal)");

        $stmt->bindParam(":idpersonal", $id, PDO::PARAM_INT);
        $stmt->bindParam(":comentarios", $comentario, PDO::PARAM_STR);

        $stmt->execute();


    }


    public function mostrarBitacoraModel($id)
    {
        $stmt =Conexion::conectar()->prepare("
        SELECT DATE_FORMAT(fecha,'%d/%m/%Y %h:%i:%s %p') as fecha,acciones,tpersonal.nombre as nombre
        from tbitacora,tpersonal
        where tbitacora.idpersonal=:id and DATE_FORMAT(tbitacora.fecha,'%d/%m/%Y') = date_format(now(), '%d/%m/%Y')
        GROUP BY tbitacora.fecha
        ");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }
    public function mostrarBitacoraNombre($id){
      $stmt =Conexion::conectar()->prepare("
    SELECT nombre from tpersonal, tbitacora WHERE tbitacora.idpersonal=:id
      ");
      $stmt->bindParam(":id", $id, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetch();
      $stmt->close();

    }
}
