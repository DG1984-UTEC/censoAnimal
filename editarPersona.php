<?php
$id = !empty($_GET['id']) ? $_GET['id'] : 0;
$linea='';
//Si hay una linea que modificar "$nlinea", entonces.
if($id){
    include('database.php');
	$registro = "SELECT * FROM persona WHERE id = $id;";
	$resultado = mysqli_query($conexion,$registro);
	$linea = mysqli_fetch_array($resultado);
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

    <title>Actualizar Persona</title>
</head>

<body>
    <div class="w3-sidebar w3-card" style="width:12%;margin-top:-2.1%">
        <h3> Menu</h3>
        <a href="formularioPersona.php" class="w3-bar-item w3-button">Ingresar Persona</a>
        <a href="formularioAnimal.php" class="w3-bar-item w3-button">Ingresar Animal</a>
        <a href="obtener.php" class="w3-bar-item w3-button">Listar Registros</a>
        <br>
        <a href="index.php" class="w3-bar-item w3-button">Volver</a>
        <br>

        <a href="login.php" class="w3-bar-item w3-button">Salir</a>
    </div>

    <form method="post" action="actualizarpersona.php">

        <div class="row" style="width: 900px;margin-left:300px;margin-right:300px;margin-top:3%">
            <div class="w3-sidebar w3-card" style="width:50%;height:50%">
                <div class="col-sm-4" style="margin-left:100px;margin-top:20px">
                    <label for="ci">CI:</label>
                    <input type="text" id="i1" class="form-control" name="c1" value="<?php echo $linea['ci'];?>">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="i2" class="form-control" name="c2" value="<?php echo $linea['nombre'];?>">
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="i3" class="form-control" name="c3" value="<?php echo $linea['apellido'];?>">

                </div>

                <div class="col-sm-4" style="margin-right:80px;margin-top:20px">
                    <label for="telefono">Telefono:</label>
                    <input type="text" id="i4" class="form-control" name="c4" value="<?php echo $linea['telefono'];?>">
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="i5" class="form-control" name="c5" value="<?php echo $linea['direccion'];?>">
                    <label for="cantanimales">Cantidad Animales:</label>
                    <input type="text" id="i6" class="form-control" name="c6" value="<?php echo $linea['cantanimales'];?>">
                    <br>
                    <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
                   
                    <button type="submit" value = "actualizar" name= "actualizar" class="btn btn-default">Actualizar</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>



<!--
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingreso de datos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="contenedor">
    <div class="cabecera">Actualización de datos</div>
    <div class="contenido">
    <form class="contact" action="actualizarpersona.php" method='post'>
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <label for="i1">CI</label>
            <input type="text" id="i1" name="c1" value="<?php echo $linea['ci'];?>">
            <br>
            <label for="i2">Nombre</label>
            <input type="text" id="i2" name="c2" value="<?php echo $linea['nombre'];?>">
            <br>
            <label for="i3">Apellido</label>
            <input type="text" id="i3" name="c3" value="<?php echo $linea['apellido'];?>">
            <br>
            <label for="i4">Telefono|</label>
            <input type="text" id="i4" name="c4" value="<?php echo $linea['telefono'];?>">
            <br>
            <label for="i4">Direccion</label>
            <input type="text" id="i5" name="c5" value="<?php echo $linea['direccion'];?>">
            <br>
            <label for="i4">Cantidad de animales</label>
            <input type="text" id="i6" name="c6" value="<?php echo $linea['cantanimales'];?>">
            <br>
            <input class="boton" type="submit" value="actualizar">
    </form>
    </div>
    </div>
</body>
</html>
-->