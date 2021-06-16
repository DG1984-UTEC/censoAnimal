<?php
include_once ('database.php');

if (isset($_GET['id'])){
    $id = intval($_GET['id']);

    $consulta = $conexion->query("DELETE FROM persona WHERE id='$id'");
    
if ($consulta){
    echo "registro borrado con exito";
    
}else{
    echo "registro no borrado";
}
}
   
?>