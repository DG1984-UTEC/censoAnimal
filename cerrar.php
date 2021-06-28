
<?php
session_start();


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

    <form method="post" action="login.php">
    <div style="background-color:lightgrey;width:430px;height:350px;margin-left:auto;margin-right:auto">
        <div style="width:300px;margin-left:auto;margin-right:auto;margin-top:80px">
            <div style="width:180px;margin:auto;margin-top: 12px;">
                <img src="\censoanimal\imagenes\logo grande.jpg" alt="logo" style="width:180px;margin-left:auto;margin-right:auto;margin-top: 12px;">
            </div>
            <br>
            <br>
            <label style="margin-left:120px"><?php echo$_SESSION["usuario"];?></label>
            <br>
    <label style="margin-left:55px">UD A SALIDO EXITOSAMENTE</label>
    <br>
    <br>
    <br>
    <button style="margin-left:100px" href="login.php" class="btn btn-default">Regresar</button>
    
        </div>
    </form>
</body>

</html>
<?php


session_destroy();
?>