<?php

$databaseHost = 'localhost';
$databaseName = 'censo';
$databaseUsername = 'root';
$databasePassword = '';

$conexion = new mysqli();
$conexion->connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);


    if(!$conexion){
        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
    }
    else
    {
        echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
    }

//include ("database.php");
//$db= new Database();

//valido haber recibido los campos desde el html y que no esten vacios
if (isset($_POST["usuario"],$_POST["password"],$_POST['tipo'])){
     //asigno el contenido de cada campo recogido en el html a variables locales
     $usuario = $_POST['usuario'];
     $password = $_POST['password'];
     $tipo =$_POST['tipo'];
     




     $insercion = $conexion->query("INSERT INTO usuarios (usuario, password, tipo) VALUES ('$usuario','$password','$tipo')");



     if ($insercion){
          echo "<p>Registro agregado.</p>";
          echo "<a href=admin.html>Volver</a>";
          } else {
          echo "<p>No se agregó...</p>";
          }

}else{
     echo '<p>Por favor, complete el <a href="formularioanimal.php">formulario</a></p>';
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

<div class="row" style="width: 900px;margin-left:300px;margin-right:300px;margin-top:3%">
    <div class="w3-sidebar w3-card" style="width:50%;height:50%">
        <div class="col-sm-4" style="margin-left:100px;margin-top:20px">
            <label for="email">Usuario:</label>
            <input type="text" class="form-control" name="usuario">
            <label for="pwd">Contraseña:</label>
            <input type="text" class="form-control" name="password">
            <br>
            <label for="pwd">Tipo:</label>
            <br>
            <label><input type="radio" class="optradio" name="tipo" value="administrador"> Administrador </label>
            <label><input type="radio" class="optradio" name="tipo" value="usuario"> Usuario</label>
            
        </div>
       
            <br>
            <br>
            <button type="submit" class="btn btn-default">Enviar</button>
        </div>

    </div>
</div>



</form>
</body>
</html>