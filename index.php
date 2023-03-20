<?php
/*App de censo Animal

Versión 1.0
Autor: Técnico en TI Darío Gonzalez
*/
session_start();
include_once('database.php');

if (isset($_SESSION['usuario'])) {
    include ('header.php');

    $totalP = $conexion->query("SELECT * FROM persona");
    $totalA = $conexion->query("SELECT * FROM animal");

    $totalesP = mysqli_num_rows($totalP);
    $totalesA = mysqli_num_rows($totalA);
    $si = "SI";
    $totalCastrados = $conexion->query("SELECT COUNT(*) FROM animal WHERE castrado ='$si'");
    $totalesC = mysqli_fetch_array($totalCastrados);
    $no = "NO";
    $totalCas = $conexion->query("SELECT COUNT(*) FROM animal WHERE castrado ='$no'");
    $totalesE = mysqli_fetch_array($totalCas);

    $totalChip = $conexion->query("SELECT COUNT(*) FROM castracion WHERE idchip != ''");
    $totalChipA = mysqli_fetch_array($totalChip);


    $reqsi = "SI";
    $totalSinCastrar = $conexion->query("SELECT COUNT(*) FROM animal WHERE reqcastracion ='$reqsi'");

    $totalesD = mysqli_fetch_array($totalSinCastrar);


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/jquery-3.6.1.js"></script>
        <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>

        
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->

        <!-- <link rel="stylesheet" href="css/bootstrap.min(old).css"> -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-utilities.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="css/principal.css">
        <link rel="stylesheet" href="css/header.css">
        




        <!-- <script type="text/javascript" src="js/bootstrap.js"></script> -->


        <title>Menú Principal</title>
    </head>
<?php

?>
    <body id="bod">
       
            <br>
            <div class="container">
                <div id="borde" class="border border" style="padding: 20px;">
                    <h1><strong>
                            <center>Sistema de Registro de Censo Animal</center>
                        </strong></h1>
                    
                </div>
            </div>
            <br>
            <div class="container">
                <div id="borde" class="border border" style="padding: 20px;">
                    <div class="row">
                        <div class="col-sm">
                            <div class="card">
                                <div class="card-body">
                                    Propietarios: <strong><span id="connected_users"><?php echo $totalesP ?></span></strong>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    Castraciones con chip: <strong><span id="connected_users"><?php echo $totalChipA[0] ?></span></strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card">
                                <div class="card-body">
                                    Animales: <strong><span id="daily_revenue"><?php echo $totalesA ?></span></strong>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    Animales Castrados: <strong><span id="connected_users"><?php echo $totalesC[0] ?></span></strong>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    Animales No Castrados: <strong><span id="connected_users"><?php echo $totalesE[0] ?></span></strong>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    Para castrar: <strong><span id="connected_users"><?php echo $totalesD[0] ?></span></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
<?php
} else {
    echo header("location: login.php");
}
?>