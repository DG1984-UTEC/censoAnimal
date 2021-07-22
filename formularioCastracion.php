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

    <title>Ingresar Castración</title>
</head>

<body>
    <div class="w3-sidebar w3-card" style="width:12%;margin-top:1%">
        <h3> Menu</h3>
        <a href="formularioCastracion.php" class="w3-bar-item w3-button">Nueva Castración</a>
        <a href="obtenerCastraciones.php" class="w3-bar-item w3-button">Listar Castraciones</a>
        <br>
        <a href="index.php" class="w3-bar-item w3-button">Volver</a>
        <br>

        <a href="Cerrar.php" class="w3-bar-item w3-button">Cerrar Sesión</a>
    </div>

    <form method="post" action="agregarCastracion.php">
        <div style="margin-left:1200px"><?php echo 'Bienvenido, ' . $_SESSION["usuario"];?></div>
        <div class="row" style="width: 900px;margin-left:300px;margin-right:300px;margin-top:3%">
            <div class="w3-sidebar w3-card" style="width:50%;height:50%">
                <div class="col-sm-4" style="margin-left:100px;margin-top:20px">
                    <label for="fecha castracion">Fecha Castración:</label>
                    <input type="date" class="form-control" name="fecastracion" required="true">
                    <label for="ci dueño">CI Dueño:</label>
                    <input type="text" class="form-control" name="cidueno" required="true">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" required="true">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control" name="apellido" required="true">
                   

                </div>

                <div class="col-sm-4" style="margin-right:80px;margin-top:20px">
                <label for="nombreMascota">Nombre mascota:</label>
                    <input type="text" class="form-control" name="nmascota" required="true">
                <label for="idchip">ID Chip:</label>
                    <input type="text" class="form-control" name="idchip" required="true">
                    <br>
                    <label for="especie">Especie:</label>
                    <br>
                    <label><input type="radio" class="optradio" name="especie" value="Perro" required="true"> Perro
                    </label>
                    <label><input type="radio" class="optradio" name="especie" value="Gato" required="true">
                        Gato</label>
                        <br>
                        <br>
                    <label for="sexo">Sexo:</label>
                    <br>
                        <label><input type="radio" class="optradio" name="sexo" value="Macho" required="true"> Macho
                    </label>
                    <label><input type="radio" class="optradio" name="sexo" value="Hembra" required="true">
                        Hembra</label>
                        <br>
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