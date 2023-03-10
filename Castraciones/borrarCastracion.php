<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../css/sweetalert2.min.css">
  <script type="text/javascript" src="../js/sweetalert2@10.js"></script>
     <title>Document</title>
</head>
<body>
     
</body>
</html>
<?php

session_start();
include_once ('../database.php');


// Detects if there is someone logged in.

//if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == true){
if (isset($_SESSION['usuario'])){


if (isset($_GET['idC'])){
    $idC = intval($_GET['idC']);

    $consulta = $conexion->query("DELETE FROM castracion WHERE idC='$idC'");
    
if ($consulta){
    echo "<script>
    Swal.fire({
         title: 'Registro borrado con éxito'
       })
       setTimeout(() => {  window.location.href= '../Castraciones/obtenerCastraciones.php'; }, 2000);
</script>"; 
    
}else{
    echo "<script>
    Swal.fire({
         title: 'Error, el Registro no se borró'
       })
       setTimeout(() => {  window.location.href= '../Castraciones/obtenerCastraciones.php'; }, 2000);
</script>"; 
}
}
}else{
    echo header("location: login.php");
    
}
?>