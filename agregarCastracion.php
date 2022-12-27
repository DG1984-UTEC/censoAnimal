<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/sweetalert2.min.css">
  <script type="text/javascript" src="js/sweetalert2@10.js"></script>
     <title>Document</title>
</head>
<body>
     
</body>
</html>
<?php
include_once('database.php');
session_start();


if (isset($_SESSION['usuario'])){



if (isset($_POST["fecastracion"], $_POST["cidueno"], $_POST["nombre"], $_POST["apellido"], $_POST["nmascota"], $_POST["idchip"], $_POST["especie"], $_POST["sexo"]) and 
$_POST["fecastracion"] !="" and $_POST["cidueno"] !="" and $_POST["nombre"] !="" and $_POST["apellido"] !="" and $_POST["nmascota"] !="" and $_POST["idchip"] !="" and $_POST["especie"] !="" and $_POST["sexo"] !=""){
     
     $fecastracion = mysqli_real_escape_string ($conexion, $_POST['fecastracion']);
     $cidueno = mysqli_real_escape_string ($conexion, $_POST['cidueno']);
     $nombre = mysqli_real_escape_string ($conexion,$_POST['nombre']);
     $apellido = mysqli_real_escape_string ($conexion, $_POST['apellido']);
     $nmascota = mysqli_real_escape_string ($conexion, $_POST['nmascota']);
     $idchip = mysqli_real_escape_string ($conexion, $_POST['idchip']);
     $especie = mysqli_real_escape_string ($conexion,$_POST['especie']);
     $sexo = mysqli_real_escape_string ($conexion,$_POST['sexo']);
     $sesion = $_SESSION['usuario'];
     




     $insercion = $conexion->query("INSERT INTO castracion (fecastracion, cidueno, nombre, apellido, nmascota, idchip, especie, sexo, sesion) VALUES ('$fecastracion','$cidueno','$nombre','$apellido','$nmascota','$idchip','$especie','$sexo','$sesion')");



     if ($insercion){
          echo "<script>
          Swal.fire({
               title: 'Castración registrada con éxito'
             })
             setTimeout(() => {  window.location.href= 'obtenerCastraciones.php'; }, 2000);
  </script>"; 
        
        
          } else {
               echo "<script>
               Swal.fire({
                    title: 'Error, la castración no se registró'
                  })
                  setTimeout(() => {  window.location.href= 'index.php'; }, 2000);
       </script>"; 
          }


}else{
     echo '<p>Por favor, complete el <a href="formulariocastracion">formulario</a></p>';
}
}else{
    echo header("location: login.php");
    
}
?>