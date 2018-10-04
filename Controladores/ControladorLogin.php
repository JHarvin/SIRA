<?php

// clase 
class MvcController{
    #funcion que llama al login 
    public function plantilla(){
        include"Vistas/login.php";
    }
    
    
    
    #--Para inicio de sesion---------
    
    public function inicioSesionController(){
        
        if(isset($_POST["usuarioLog"])){
            
            $datosControladorLogin =array(
                "usuarioLog"=>$_POST["usuarioLog"], 
                "usuarioPass"=>$_POST["usuarioPass"] 
                
        );
            
          $respuesta=LoginModel::verificar($datosControladorLogin,"tpersonal");
            
            #--variable username se obtiene de la bd cuando se retorna
            #--retorna con el nombre de la columna de la bd
            #--y el otro valor del post que  es el normal
            if($respuesta["username"]==$_POST["usuarioLog"] &&
              $respuesta["password"]==$_POST["usuarioPass"]
              ){
                
               session_start();
                $_SESSION["validar"]=true;
               
                header("location:Vistas/inicio.php"); 
                
                
                
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