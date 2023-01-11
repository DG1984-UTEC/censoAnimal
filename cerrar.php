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
    <link rel="stylesheet" href="css/principal.css">
    <!-- <link rel="stylesheet" href="css/w3.css"> -->
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.6.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->

    <!-- <link rel="stylesheet" href="css/bootstrap.min(old).css"> -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-utilities.css">
    <title>Salir</title>
</head>

<body>
<!-- 



    <form method="post" action="login.php">
        <div style="background-color:lightgrey;width:430px;height:350px;margin-left:auto;margin-right:auto">
            <div style="width:300px;margin-left:auto;margin-right:auto;margin-top:80px">
                <div style="width:180px;margin:auto;margin-top: 12px;">
                    <img src="\censoanimal\imagenes\logo grande.jpg" alt="logo"
                        style="width:180px;margin-left:auto;margin-right:auto;margin-top: 12px;">
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

</html> -->
<?php


session_destroy();
header("location: login.php");
?>