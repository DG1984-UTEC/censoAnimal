<?php
session_start();


if (isset($_SESSION['usuario'])){

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/w3.css">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.6.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->

    <!-- <link rel="stylesheet" href="css/bootstrap.min(old).css"> -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-utilities.css">


    <title>Ingresar Persona</title>
</head>

<body>
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
                                <li><a class="dropdown-item" href="formularioPersona.php">Nuevo Propietario</a></li>
                                <li><a class="dropdown-item" href="obtener.php">Listar propietarios</a></li>
                                <li><a class="dropdown-item" href="buscar.php">Buscar propietarios</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Animales
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="formularioAnimal.php">Nuevo Animal</a></li>
                                <li><a class="dropdown-item" href="obtenerAnimales.php">Listar Animales</a></li>
                                <li><a class="dropdown-item" href="buscar.php">Buscar animales</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Castraciones
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="formularioCastracion.php">Nueva castración</a></li>
                                <li><a class="dropdown-item" href="obtenerCastraciones.php">Listar Castraciones</a></li>
                                <li><a class="dropdown-item" href="buscar.php">Buscar Por Id chip</a></li>
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


        <div class="container-fluid" style="width:650px">

            <h1><strong> Datos del propietario</strong></h1>
            <form method="post" action="agregarPersona.php">
               
            <div class="border border" style="padding: 20px;">
                <br>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="number" placeholder="Cédula" class="form-control" name="ci" required="true" />
                </div>
                <br>
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="text" placeholder="Nombre" class="form-control" name="nombre" required="true" />
                </div>
                <br>
                <div class="form-outline mb-4">
                    <input type="text" placeholder="Apellido" class="form-control" name="apellido" required="true" />
                </div>
                <br>
                <div class="form-outline mb-4">
                    <input type="number" placeholder="Teléfono" class="form-control" name="telefono" required="true" />
                </div>
                <br>
                <div class="form-outline mb-4">
                    <input type="text" placeholder="Dirección" class="form-control" name="direccion" required="true" />
                </div>
                <br>
                <div class="form-outline mb-4">
                    <input type="number" placeholder="Cantidad Animales" class="form-control" name="cantanimales"
                        required="true" />
                </div>
                <br>
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Enviar</button>
                </div>
            </form>
        </div>
</body>

</html>
<?php
}else{
    echo header("location: login.php");
    
}

?>