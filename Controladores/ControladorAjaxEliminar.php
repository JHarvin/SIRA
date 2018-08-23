<?php
require_once "../Modelos/MostrarModel.php";


        if(isset($_POST["idb"])){
            
            
            
            
            $idController=$_POST["idb"];
            
            $respuesta=MostrarUsuarios::borrarUsarioModel($idController,"tpersonal");
            
            if($respuesta=="success"){echo 1;}else{echo 0;}
        }
  


    


?>