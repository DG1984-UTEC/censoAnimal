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
include_once('../database.php');
session_start();


if (isset($_SESSION['usuario'])){



if (isset($_POST["fecastracion"], $_POST["ciduenoC"], $_POST["nombreC"], $_POST["apellidoC"], $_POST["nmascota"], $_POST["idchip"], $_POST["especieC"], $_POST["sexoC"]) and 
$_POST["fecastracion"] !="" and $_POST["ciduenoC"] !="" and $_POST["nombreC"] !="" and $_POST["apellidoC"] !="" and $_POST["nmascota"] !="" and $_POST["idchip"] !="" and $_POST["especieC"] !="" and $_POST["sexoC"] !=""){
     
     $fecastracion = mysqli_real_escape_string ($conexion, $_POST['fecastracion']);
     $ciduenoC = mysqli_real_escape_string ($conexion, $_POST['ciduenoC']);
     $nombreC = mysqli_real_escape_string ($conexion,$_POST['nombreC']);
     $apellidoC = mysqli_real_escape_string ($conexion, $_POST['apellidoC']);
     $nmascota = mysqli_real_escape_string ($conexion, $_POST['nmascota']);
     $idchip = mysqli_real_escape_string ($conexion, $_POST['idchip']);
     $especieC = mysqli_real_escape_string ($conexion,$_POST['especieC']);
     $sexoC = mysqli_real_escape_string ($conexion,$_POST['sexoC']);
     $sesionC = $_SESSION['usuario'];
     $_SESSION['idchip'] = $idchip;

$consultaChip = $conexion->query("SELECT * FROM castracion WHERE idchip ='$idchip'");
$checking = mysqli_fetch_array($consultaChip);
if($checking){
if ($checking['idchip'] == $_SESSION['idchip']){
     echo "<script>
          Swal.fire({
               title: 'El chip ya está registrado en la base de datos'
             })
             setTimeout(() => {  window.location.href= '../Castraciones/formularioCastracion.php'; }, 2000);
  </script>"; 
}
}else{

     $insercion = $conexion->query("INSERT INTO castracion (fecastracion, ciduenoC, nombreC, apellidoC, nmascota, idchip, especieC, sexoC, sesionC) VALUES ('$fecastracion','$ciduenoC','$nombreC','$apellidoC','$nmascota','$idchip','$especieC','$sexoC','$sesionC')");



     if ($insercion){
          echo "<script>
          Swal.fire({
               title: 'Castración registrada con éxito'
             })
             setTimeout(() => {  window.location.href= '../Castraciones/obtenerCastraciones.php'; }, 2000);
  </script>"; 
        
        
          } else {
               echo "<script>
               Swal.fire({
                    title: 'Error, la castración no se registró'
                  })
                  setTimeout(() => {  window.location.href= 'index.php'; }, 2000);
       </script>"; 
          }

     }
}else{
     echo '<p>Por favor, complete el <a href="../Castraciones/formularioCastracion.php">formulario</a></p>';
}
}else{
    echo header("location: login.php");
    
}
?>