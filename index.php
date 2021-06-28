<?php
session_start();


if (isset($_SESSION['usuario'])){


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
        <img src="\censoanimal\imagenes\logo grande.jpg" alt="logo" style="width:480px;margin:auto;margin-top: 12px;">
    </div>
    <div style="width:620px;margin:auto;margin-top: 12px;">
        <h1 class="w3-bar-item" style="text-align:center"><b>Censo Animal</b></h1>
        
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