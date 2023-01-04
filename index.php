<?php
/*App de censo Animal

Versión 1.0
Autor: Técnico en TI Darío Gonzalez
*/
session_start();
include_once('database.php');

if (isset($_SESSION['usuario'])) {

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
    



    <!-- <script type="text/javascript" src="js/bootstrap.js"></script> -->


    <title>Menú Principal</title>
</head>

<body id="bod">
    <!-- NavBar -->
    <div class="dropdown">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Censo Animal</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Propietarios
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="Propietarios/formularioPersona.php">Nuevo Propietario</a></li>
                                <li><a class="dropdown-item" href="Propietarios/obtener.php">Listar propietarios</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Animales
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="Animales/formularioAnimal.php">Nuevo Animal</a></li>
                                <li><a class="dropdown-item" href="Animales/obtenerAnimales.php">Listar Animales</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Castraciones
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="Castraciones/formularioCastracion.php">Nueva castración</a></li>
                                <li><a class="dropdown-item" href="Castraciones/obtenerCastraciones.php">Listar Castraciones</a></li>
                            </ul>
                        </li>
                        
                        <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php echo  $_SESSION["usuario"]; ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="cerrar.php">Cerrar sesión</a></li>

                                </ul>
                            </li> -->
                    </ul>
                </div>
            </div>
            <div class="position-relative">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?php echo  $_SESSION["usuario"]; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="cerrar.php">Salir</a></li>

                        </ul>
            </div>
        </nav>
        <!-- NavBar -->
        <div class="container">
        <div id="borde" class="border border" style="padding: 20px;">
        <h1><strong><center>Sistema de Registro de Censo Animal</center></strong></h1>
        <h3><center>Versión 2.0</center></h3>
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