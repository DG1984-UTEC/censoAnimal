<?php

session_start();


if (isset($_SESSION['usuario'])){




if (isset($_POST['ci'],$_POST['nombre'],$_POST['apellido'],$_POST["usuario"],$_POST["password"],$_POST['tipo'])){
    
     $ci = mysqli_real_escape_string ($conexion,$_POST['ci']);
     $nombre = mysqli_real_escape_string ($conexion,$_POST['nombre']);
     $apellido = mysqli_real_escape_string ($conexion,$_POST['apellido']);
     $usuario = mysqli_real_escape_string ($conexion,$_POST['usuario']);
     $password = mysqli_real_escape_string ($conexion,$_POST['password']);
     $tipo = mysqli_real_escape_string ($conexion,$_POST['tipo']);
     




     $insercion = $conexion->query("INSERT INTO usuarios (ci, nombre, apellido, usuario, password, tipo) VALUES ('$ci','$nombre','$apellido','$usuario','$password','$tipo')");



     if ($insercion){
        echo "<script>
        alert('Registro Agregado')
        window.location.href='obtenerusuarios.php';
        </script>";
          } else {
          echo "<p>No se agregó...</p>";
          }


}
}else{
    echo header("location: login.php");
    
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <form method="post" action="admin.php">
        <div class="w3-sidebar w3-card" style="width:12%;margin-top:1%">
            <h3 class="w3-bar-item">Menu</h3>
            <a href="agregarusuario.php" class="w3-bar-item w3-button">Nuevo Usuario</a>
            <a href="obtenerusuarios.php" class="w3-bar-item w3-button">Listar Usuarios</a>
            <br>
            <a href="admin.php" class="w3-bar-item w3-button">Volver</a>
            <br>
            <a href="cerrar.php" class="w3-bar-item w3-button">Cerrar Sesión</a>
        </div>
        <div style="margin-left:1200px"><?php echo 'Bienvenido, ' . $_SESSION["usuario"];?></div>
        <div class="row" style="width: 900px;margin-left:300px;margin-right:300px;margin-top:3%">
            <div class="w3-sidebar w3-card" style="width:50%;height:50%">
                <div class="col-sm-4" style="margin-left:100px;margin-top:20px">
                    <label for="ci">CI:</label>
                    <input type="text" class="form-control" name="ci">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control" name="apellido">
                </div>

                <div class="col-sm-4" style="margin-right:80px;margin-top:20px">
                    <label for="usuario">Usuario:</label>
                    <input type="text" class="form-control" name="usuario">
                    <label for="pwd">Contraseña:</label>
                    <input type="text" class="form-control" name="password">

                    <br>
                    <label for="tipo">Tipo:</label>
                    <br>
                    <label><input type="radio" class="optradio" name="tipo" value="ad"> Administrador </label>
                    <label><input type="radio" class="optradio" name="tipo" value="us"> Usuario</label>
                    <button type="submit" class="btn btn-default">Enviar</button>

                </div>
            </div>

            <br>
            <br>

        </div>

        </div>
        </div>



    </form>
</body>

</html>