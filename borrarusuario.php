<?php
session_start();
include_once ('database.php');


// Detects if there is someone logged in.

//if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == true){
if (isset($_SESSION['usuario'])){


// Detects if there is someone logged in.



    
if (isset($_GET['id'])){
    $id = intval($_GET['id']);

    $consulta = $conexion->query("DELETE FROM usuarios WHERE id='$id'");
    
if ($consulta){
    echo "<script>
    alert('registro borrado con exito')
    window.location.href='obtenerusuarios.php';
    </script>";
    
    
}else{
    echo "<script>
    alert('registro no borrado')
    window.location.href='obtenerusuarios.php';
    </script>";
}
}
    //$fila = mysql_fetch_array ($consulta);

    //$fila = $conexion->fetch_array(MYSQLI_ASSOC);
}else{
    echo header("location: login.php");
    
}
?>