<?php
include 'ConexionBackup.php';
$restorePoint=SGBD::limpiarCadena($_FILES['upload']['name']);
$sql=explode(";",file_get_contents($restorePoint));
$totalErrors=0;
set_time_limit (60);
$con=mysqli_connect(SERVER, USER, PASS, BD);
$con->query("SET FOREIGN_KEY_CHECKS=0");
for($i = 0; $i < (count($sql)-1); $i++){
    if($con->query($sql[$i].";")){  }else{ $totalErrors++; }
}
$con->query("SET FOREIGN_KEY_CHECKS=1");
$con->close();
if($totalErrors<=0){
     
    header("location:../Vistas/BackupRestore.php?ok=ok");
	
}else{
	echo "Ocurrio un error inesperado, no se pudo hacer la restauración completamente";
}
