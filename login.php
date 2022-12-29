<?php
session_start();
include_once('database.php');






if (isset(
    $_POST["usuario"],
    $_POST["password"]
)) {


    $usuario = $_POST['usuario'];
    $password = $_POST['password'];


    $users = $conexion->query("SELECT tipo FROM usuarios WHERE usuario = '$usuario' AND password = '$password'");

    $tipo = mysqli_fetch_array($users);





    if ($users) {
        $_SESSION['usuario'] = $usuario;


        if ($tipo['tipo'] == "ad") {
            header("location: ./Usuarios/admin.php");
        } else if ($tipo['tipo'] == "us") {
            header("location: index.php");
        } else {
            echo "<script>
        alert('El usuario no existe en la base de datos, por favor contacte un Administrador')
     
        </script>";
        }
    } else {
        echo " no funciona la query";
    }
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/jquery-3.6.1.js"></script>
        <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->

        <!-- <link rel="stylesheet" href="css/bootstrap.min(old).css"> -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-utilities.css">
        <link rel="stylesheet" href="css/principal.css">
    <title>Ingreso al sistema</title>
</head>

<body id="bod">

    <!-- <form method="post" action="login.php">
        <div style="background-color:lightgrey;width:430px;height:350px;margin-left:auto;margin-right:auto">
            <div style="width:300px;margin-left:auto;margin-right:auto;margin-top:80px">
                <div style="width:180px;margin:auto;margin-top: 12px;">
                    <img src="\censoanimal\imagenes\logo grande.jpg" alt="logo" style="width:180px;margin-left:auto;margin-right:auto;margin-top: 12px;">
                </div>
                <label for="usuario">Usuario:</label>
                <input type="usuario" class="form-control" name="usuario" required="True">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" name="password" required="True">

                <button type="submit" class="btn btn-default">Ingresar</button>
            </div>
    </form> -->

    <div class="container-fluid" style="width:650px">
                <h1><strong></strong></h1>
                <br>
    <div class="container" style="width:500px">
        <form method="post" action="login.php">
        <div id="borde" class="border border" style="padding: 20px;">
            <div style="width:380px;margin:auto;margin-top: 12px;">
                <img src="\censoanimal\imagenes\membrete-01.png" alt="logo" style="width:380px;margin-left:auto;margin-right:auto;margin-top: 12px;">
            </div>
            <div class="container-fluid">
            <h3><strong><center>Sistema de Censo Animal</center></strong></h3>
            </div>
            <br>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="usuario" placeholder="Usuario" class="form-control" name="usuario" required ="true"/>
            </div>
<br>
            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password"  placeholder="Contraseña"  class="form-control" name="password" required ="true"/>
            </div>
            <br>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Ingresar</button>
    </div>
    <!-- Register buttons -->
    <!-- <div class="text-center">
            <p>Not a member? <a href="#!">Register</a></p>
            <p>or sign up with:</p>
            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-google"></i>
            </button>

            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-github"></i>
            </button>
        </div> -->
    </form>
    </div>
    </div>
</body>

</html>