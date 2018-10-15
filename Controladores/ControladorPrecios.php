<?php 
#Made by Harvin Ramos<====<================================<=============<=<<====<===<=
#--------------------------------------------------------------------------------------
#Archivo php que se usa con ajax y sin ajax para mostrar los precios
#--------------------------------------------------------------------------------------
require_once"../Modelos/ModeloPrecios.php";
#--------------------------------------------------------------------------------------
class PreciosController{
    #---------------------------------------------------------------
    #Funcion para registrar el precio por primera vez
    #---------------------------------------------------------------
    public function registrarPrecioController($placa,$precio){
         $respuesta=PreciosModel::registrarPrecioModel($placa,$precio,"tprecios");
        if($respuesta=="success"){
            return "success";
            
        }else{
            return "error";
        }
        
    }
    #---------------------------------------------------------------
    #Funcion para actualizar el precio del auto
    #---------------------------------------------------------------
    public function actualizarPrecioController($placa,$precio){
         $respuesta=PreciosModel::actualizarPrecioModel($placa,$precio,"tprecios");
        if($respuesta=="success"){
            return "success";
            
        }else{
            return "error";
        }
    }
    #---------------------------------------------------------------
    #Funcion para mostrar en la tabla los precios de cada auto
    #---------------------------------------------------------------
    public function mostrarPreciosController(){}
    
}

?>