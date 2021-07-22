<?php
session_start();
include_once('database.php');

if (isset($_SESSION['usuario'])){

$totalP = $conexion->query("SELECT * FROM persona");
$totalA =$conexion->query("SELECT * FROM animal");

$totalesP=mysqli_num_rows($totalP);
$totalesA=mysqli_num_rows($totalA);
$si = "SI";
$totalCastrados = $conexion->query("SELECT COUNT(*) FROM animal WHERE castrado ='$si'");
$totalesC=mysqli_fetch_array($totalCastrados);

$reqsi ="SI";
$totalSinCastrar = $conexion->query("SELECT COUNT(*) FROM animal WHERE reqcastracion ='$reqsi'");

$totalesD =mysqli_fetch_array($totalSinCastrar);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Menú Principal</title>
</head>

<body>


    <div class="w3-sidebar w3-card" style="width:12%;margin-top:1%">
        <h3 class="w3-bar-item">Menu</h3>
        <a href="formularioPersona.php" class="w3-bar-item w3-button">Ingresar Persona</a>
        <a href="formularioAnimal.php" class="w3-bar-item w3-button">Ingresar Animal</a>
        <a href="formularioCastracion.php" class="w3-bar-item w3-button">Castraciones</a>
        <a href="obtener.php" class="w3-bar-item w3-button">Listar Registros</a>
        <br>
        <a href="index.php" class="w3-bar-item w3-button">Volver</a>
        <br>
        <a href="Cerrar.php" class="w3-bar-item w3-button">Cerrar Sesión</a>
        <br>
        <br>
        <br>

    </div>
    <div style="margin-left:1200px"><?php echo 'Bienvenido, ' . $_SESSION["usuario"];?></div>
    <div style="width:480px;margin:auto;margin-top: 12px;">
        <img src="\censoanimal\imagenes\logo grande.jpg" alt="logo" style="width:280px;margin:auto;margin-top: 12px;">
    </div>
    <div style="width:620px;margin:auto;margin-top: 12px;">
        <h1 class="w3-bar-item" style="text-align:center"><b>Censo Animal</b></h1>

        <h1 class="w3-bar-item" style="text-align:center"><b>Registros de Personas: <?php echo $totalesP?></b></h1>
        <h1 class="w3-bar-item" style="text-align:center"><b>Registro de Animales: <?php echo $totalesA?></b></h1>
        <h1 class="w3-bar-item" style="text-align:center"><b>Total Castrados: <?php echo $totalesC[0]?></b></h1>
        <h1 class="w3-bar-item" style="text-align:center"><b>Total Sin Castrar: <?php echo $totalesD[0]?></b></h1>


    </div>



    <?php
echo '<p><a href="formulario.php">Ingresar Registro</a></p>';
echo '<p><a href="obtener.php">Listar Registros</a></p>';
echo '<p><a href="index.php">Volver</a></p>';


?>

</body>

</html>
<?php
 }else{
     echo header("location: login.php");
     
 }
 ?>