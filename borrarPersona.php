<?php

$databaseHost = 'localhost';
$databaseName = 'censo';
$databaseUsername = 'root';
$databasePassword = '';

$conexion = new mysqli();
$conexion->connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

/*
    if(!$conexion){
        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
    }
    else
    {
        echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
    }
*/

    //$consulta= "SELECT * FROM users";
if (isset($_GET['id'])){
    $id = intval($_GET['id']);

    $consulta = $conexion->query("DELETE FROM persona WHERE id='$id'");
    
if ($consulta){
    echo "registro borrado con exito";
    
}else{
    echo "registro no borrado";
}
}
    //$fila = mysql_fetch_array ($consulta);

    //$fila = $conexion->fetch_array(MYSQLI_ASSOC);

?>