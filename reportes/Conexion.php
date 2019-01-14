<?php 

class Conexion{
    
    public function conectar(){
        $link =new PDO("mysql:host=localhost;dbname=sira_bd","root","");
        //para verificar manualmente la conexion en el navegador var_dump
        //var_dump($link);
        
        return $link;
    }
    
}
$a=new Conexion();
$a->conectar();
?>