<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sweetalert2.min.css">
    <script type="text/javascript" src="../js/sweetalert2@10.js"></script>
    <title>Actualizar Propietario</title>
</head>

<body>

</body>

</html>
<?php
session_start();

// Detects if there is someone logged in.

//if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == true){
if (isset($_SESSION['usuario'])) {

  if (isset ($_POST['submit'])){

    
  

  $ciP = $_POST['c1'];
  $nombreP = $_POST['c2'];
  $apellidoP = $_POST['c3'];
  $telefonoP = $_POST['c4'];
  $direccionP = $_POST['c5'];
  $cantanimales = $_POST['c6'];
  $location = $_POST['c7'];
  $zone = $_POST['c8'];
  $idP = $_POST['idP'];
  $sesionP = $_SESSION['usuario'];


          // if ($location=="Paysandu ciudad"){
          //      $zone = NULL;
          // }else{
          //      $zone = $_POST['c8'];
          // }




  // if ($ci&&$nombre&&$apellido&&$telefono&&$direccion&&$cantanimales&&$location&&$zone) {
    include('../database.php');
    //$registro = "UPDATE persona set ci ='$ci', nombre='$nombre', apellido='$apellido', telefono='$telefono', direccion='$direccion', cantanimales='$cantanimales' 
    //WHERE id='$id'";
    // $resultado = mysqli_query($conexion,$registro);

    $update = $conexion->query("UPDATE persona SET ciP ='$ciP', nombreP='$nombreP', apellidoP='$apellidoP', telefonoP='$telefonoP', direccionP='$direccionP', cantanimales='$cantanimales', location='$location', zone='$zone', sesionP='$sesionP' 
   WHERE idP='$idP'");

    //  $resultado = mysqli_query($conexion,$update);
    if ($update) {
      echo "<script>
    Swal.fire({
         title: 'Propietario actualizado con éxito'
       })
       setTimeout(() => {  window.location.href= '../Propietarios/obtener.php'; }, 2000);
</script>";
    } else {
      echo "<script>
               Swal.fire({
                    title: 'Error, propietario no fue actualizado'
                  })
                  setTimeout(() => {  window.location.href= '../Propietarios/editarPersona.php'; }, 2000);
       </script>";
    }
  // } else {
  //   echo "<h1>ERROR!</H1>";
  // }
}else{
  echo "<h1>no se recibió nada</h1>";
}
  // header('Location: obtener.php');

} else {
  echo header("location: login.php");
}


?>