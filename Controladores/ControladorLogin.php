<?php

// clase
class MvcController{
    #funcion que llama al login
    public function plantilla(){
        include"Vistas/login.php";
    }



    #--Para inicio de sesion---------

    public function inicioSesionController(){
//desde aquiiiiii
        if(isset($_POST["usuarioLog"])){

            $datosControladorLogin =array(
                "usuarioLog"=>$_POST["usuarioLog"],
                "usuarioPass"=>$_POST["usuarioPass"]

        );

          $respuesta=LoginModel::verificar($datosControladorLogin,"tpersonal");

            #--variable username se obtiene de la bd cuando se retorna
            #--retorna con el nombre de la columna de la bd
            #--y el otro valor del post que  es el normal
            if(!empty($_POST["usuarioLog"]) and !empty($_POST["usuarioPass"])){
              
              $con=$_POST["usuarioPass"];
              $contra=$respuesta["password"];
           // echo $con.' '.$respuesta["username"];
              //$respuesta["username"]==$_POST["usuarioLog"] &&
              //$respuesta["password"]==$_POST["usuarioPass"]
              
                if (password_verify($con, $contra)) {
               session_start();
                $_SESSION["validar"]=true;
               $_SESSION["usuario"]=$respuesta["username"];
               $_SESSION["id"]=$respuesta["idpersonal"];
               $bitacora=new BitacoraController();
               $bitacora->guardarBitacoraSesionController($respuesta["idpersonal"],"Inicio de sesión");
                header("location:Vistas/inicio.php");

              }else{

                 echo '

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Contraseña incorrectaa
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


                ';


              }

            }
            else{

                 echo '

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Usuario o contraseña incorrectos.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


                ';


            }

        }
    }



}


?>
