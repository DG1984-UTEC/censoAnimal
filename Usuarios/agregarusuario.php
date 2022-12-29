<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../css/sweetalert2.min.css">
  <script type="text/javascript" src="../js/sweetalert2@10.js"></script>
     <title>Agregar Usuario</title>
</head>
<body>
     
</body>
</html>
<?php
include('../database.php');
session_start();


if (isset($_SESSION['usuario'])) {

if (isset($_SESSION['submit'])){


    if (isset($_POST['ci'], $_POST['nombre'], $_POST['apellido'], $_POST["usuario"], $_POST["password"], $_POST['tipo'])) {

        $ci = mysqli_real_escape_string($conexion, $_POST['ci']);
        $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
        $apellido = mysqli_real_escape_string($conexion, $_POST['apellido']);
        $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
        $password = mysqli_real_escape_string($conexion, $_POST['password']);
        $tipo = mysqli_real_escape_string($conexion, $_POST['tipo']);





        $insercion = $conexion->query("INSERT INTO usuarios (ci, nombre, apellido, usuario, password, tipo) VALUES ('$ci','$nombre','$apellido','$usuario','$password','$tipo')");


        if ($insercion) {
            echo "<script>
            Swal.fire({
                 title: 'Usuario dado de alta con éxito'
               })
               setTimeout(() => {  window.location.href= '../Usuarios/obtenerusuarios.php'; }, 2000);
    </script>";
        } else {
            echo "<script>
            Swal.fire({
                 title: 'Error, El Usuario no fue dado de alta'
               })
               setTimeout(() => {  window.location.href= '../Propietarios/agregarusuario.php'; }, 2000);
    </script>";
        }
    } else {
        echo '<p>Por favor, complete el <a href="formulario.php">formulario</a></p>';
    }
}

} else {
    echo header("location: ../login.php");
}
?>
