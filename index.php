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
        <link rel="stylesheet" href="css/w3.css">
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

    <body>
        <!-- NavBar -->
        <div class="dropdown">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Censo Animal</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Propietarios
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="formularioPersona.php">Nuevo Propietario</a></li>
                                    <li><a class="dropdown-item" href="obtener.php">Listar propietarios</a></li>
                                    <li><a class="dropdown-item" href="buscarPersona.php">Buscar propietarios</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Animales
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="formularioAnimal.php">Nuevo Animal</a></li>
                                    <li><a class="dropdown-item" href="obtenerAnimales.php">Listar Animales</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Castraciones
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="formularioAnimal.php">Nueva castración</a></li>
                                    <li><a class="dropdown-item" href="obtenerAnimales.php">Listar Castraciones</a></li>
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
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo  $_SESSION["usuario"]; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="cerrar.php">Salir</a></li>

                        </ul>
                        </div>
            </nav>
            <!-- NavBar -->


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
            <!-- <div style="margin-left:1200px"><?php echo 'Bienvenido, ' . $_SESSION["usuario"]; ?></div> -->
            <div style="width:480px;margin:auto;margin-top: 12px;">
                <img src="\censoanimal\imagenes\logo grande.jpg" alt="logo" style="width:280px;margin:auto;margin-top: 12px;">
            </div>


            <div style="width:620px;margin:auto;margin-top: 12px;">
                <h1 class="w3-bar-item" style="text-align:center"><b>Censo Animal</b></h1>

                <h1 class="w3-bar-item" style="text-align:center"><b>Registros de Personas: <?php echo $totalesP ?></b></h1>
                <h1 class="w3-bar-item" style="text-align:center"><b>Registro de Animales: <?php echo $totalesA ?></b></h1>
                <h1 class="w3-bar-item" style="text-align:center"><b>Total Castrados: <?php echo $totalesC[0] ?></b></h1>
                <h1 class="w3-bar-item" style="text-align:center"><b>No Castrados: <?php echo $totalesE[0] ?></b></h1>
                <h1 class="w3-bar-item" style="text-align:center"><b>Total Requieren Castración: <?php echo $totalesD[0] ?></b></h1>
                <h1 class="w3-bar-item" style="text-align:center"><b>Con Chip: <?php echo $totalChipA[0] ?></b></h1>


            </div>



            <?php
            echo '<p><a href="formulario.php">Ingresar Registro</a></p>';
            echo '<p><a href="obtener.php">Listar Registros</a></p>';
            echo '<p><a href="index.php">Volver</a></p>';


            ?>
        </div>
    </body>

    </html>
<?php
} else {
    echo header("location: login.php");
}
?>