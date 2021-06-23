<?php
include_once ('database.php');


//valido haber recibido los campos desde el html y que no esten vacios
if (isset($_POST['ci'],$_POST['nombre'],$_POST['apellido'],$_POST["usuario"],$_POST["password"],$_POST['tipo'])){
     //asigno el contenido de cada campo recogido en el html a variables locales
     $ci = $_POST['ci'];
     $nombre = $_POST['nombre'];
     $apellido = $_POST['apellido'];
     $usuario = $_POST['usuario'];
     $password = $_POST['password'];
     $tipo =$_POST['tipo'];
     




     $insercion = $conexion->query("INSERT INTO usuarios (ci, nombre, apellido, usuario, password, tipo) VALUES ('$ci','$nombre','$apellido','$usuario','$password','$tipo')");



     if ($insercion){
          echo "<p>Registro agregado.</p>";
          echo "<a href=admin.html>Volver</a>";
          } else {
          echo "<p>No se agregó...</p>";
          }


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
<div class="w3-sidebar w3-card" style="width:12%;margin-top:-2%">
    <h3 class="w3-bar-item">Menu</h3>
    <a href="admin.php" class="w3-bar-item w3-button">Nuevo Usuario</a>
    <a href="obtenerusuarios.php" class="w3-bar-item w3-button">Listar Usuarios</a>
    <br>
    <a href="admin.html" class="w3-bar-item w3-button">Volver</a>
    <br>
    <a href="login.html" class="w3-bar-item w3-button">Salir</a>
</div>

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