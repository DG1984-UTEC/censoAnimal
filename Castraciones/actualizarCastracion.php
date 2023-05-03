<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/..css/sweetalert2.min.css">
    <script type="text/javascript" src="../js/sweetalert2@10.js"></script>
    <title>Document</title>
</head>

<body>

</body>

</html>
<?php
session_start();

// Detects if there is someone logged in.

//if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == true){
if (isset($_SESSION['usuario'])){

$fecastracion = $_POST['fecastracion'];
$ciduenoC =$_POST['ciduenoC'];
$nombreC =$_POST['nombreC'];
$apellidoC =$_POST['apellidoC'];
$nmascota =$_POST['nmascota'];
$idchip =$_POST['idchip'];
$especieC=$_POST['especieC'];
$sexoC =$_POST['sexoC'];

  $sesionC = $_SESSION['usuario'];
$idC = $_POST['idC'];
if($ciduenoC&&$nombreC&&$apellidoC&&$nmascota&&$idchip&&$especieC&&$sexoC){
	include('../database.php');
	//$registro = "UPDATE persona set ci ='$ci', nombre='$nombre', apellido='$apellido', telefono='$telefono', direccion='$direccion', cantanimales='$cantanimales' 
	//WHERE id='$id'";
  // $resultado = mysqli_query($conexion,$registro);

   $update = $conexion->query("UPDATE castracion SET fecastracion ='$fecastracion', ciduenoC ='$ciduenoC', nombreC='$nombreC', apellidoC='$apellidoC', nmascota='$nmascota', idchip='$idchip', especieC='$especieC', sexoC='$sexoC', sesionC='$sesionC' WHERE idC='$idC'");
	
  //  $resultado = mysqli_query($conexion,$update);
  if ($update) {
    echo "<script>
  Swal.fire({
       title: 'Registro actualizado con éxito'
     })
     setTimeout(() => {  window.location.href= '../Castraciones/obtenerCastraciones.php'; }, 2000);
</script>";
  } else {
    echo "<script>
             Swal.fire({
                  title: 'Error, Registro no fue actualizado'
                })
                setTimeout(() => {  window.location.href= '../Castraciones/editarCastracion.php'; }, 2000);
     </script>";
  }
}
echo "<script>
  Swal.fire({
       title: 'Registro actualizado con éxito'
     })
     setTimeout(() => {  window.location.href= '../Castraciones/obtenerCastraciones.php'; }, 2000);
</script>";
// header('Location: obtenerCastraciones.php');

}else{
  echo header("location: login.php");
  
}


?>