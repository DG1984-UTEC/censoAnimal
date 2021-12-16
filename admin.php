<?php
/*App de censo Animal

Versión 1.0
Autor: Técnico en TI Darío Gonzalez
*/

session_start();


if (isset($_SESSION['usuario'])){




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
        <div style="width:480px;margin:auto;margin-top: 12px;">
            <img src="\censoanimal\imagenes\logo grande.jpg" alt="logo"
                style="width:480px;margin:auto;margin-top: 12px;">
        </div>
        <div style="width:620px;margin:auto;margin-top: 12px;">
            <h1 class="w3-bar-item" style="text-align:center"><b>Panel de Control</b></h1>

        </div>



    </form>
</body>

</html>