<?php
session_start();


if (isset($_SESSION['usuario'])){

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Ingresar Persona</title>
</head>

<body>
    <div class="w3-sidebar w3-card" style="width:12%;margin-top:1%">
        <h3> Menu</h3>
        <a href="formularioPersona.php" class="w3-bar-item w3-button">Ingresar Persona</a>
        <a href="formularioAnimal.php" class="w3-bar-item w3-button">Ingresar Animal</a>
        <a href="obtener.php" class="w3-bar-item w3-button">Listar Registros</a>
        <br>
        <a href="index.php" class="w3-bar-item w3-button">Volver</a>
        <br>

        <a href="Cerrar.php" class="w3-bar-item w3-button">Cerrar Sesión</a>
    </div>

    <form method="post" action="agregarPersona.php">
        <div style="margin-left:1200px"><?php echo 'Bienvenido, ' . $_SESSION["usuario"];?></div>
        <div class="row" style="width: 900px;margin-left:300px;margin-right:300px;margin-top:3%">
            <div class="w3-sidebar w3-card" style="width:50%;height:50%">
                <div class="col-sm-4" style="margin-left:100px;margin-top:20px">
                    <label for="email">CI:</label>
                    <input type="text" class="form-control" name="ci">
                    <label for="pwd">Nombre:</label>
                    <input type="text" class="form-control" name="nombre">
                    <label for="pwd">Apellido:</label>
                    <input type="text" class="form-control" name="apellido">

                </div>

                <div class="col-sm-4" style="margin-right:80px;margin-top:20px">
                    <label for="pwd">Telefono:</label>
                    <input type="text" class="form-control" name="telefono">
                    <label for="pwd">Dirección:</label>
                    <input type="text" class="form-control" name="direccion">
                    <label for="pwd">Cantidad Animales:</label>
                    <input type="text" class="form-control" name="cantanimales">
                    <br>
                    <button type="submit" class="btn btn-default">Enviar</button>
                </div>

            </div>
        </div>



    </form>
</body>

</html>
<?php
}else{
    echo header("location: login.php");
    
}

?>