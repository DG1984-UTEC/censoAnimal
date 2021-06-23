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