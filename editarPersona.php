<?php
session_start();


if (isset($_SESSION['usuario'])) {

    $id = !empty($_GET['id']) ? $_GET['id'] : 0;
    $linea = '';

    if ($id) {
        include('database.php');
        $registro = "SELECT * FROM persona WHERE id = $id;";
        $resultado = mysqli_query($conexion, $registro);
        $linea = mysqli_fetch_array($resultado);
    }
} else {
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

    <title>Actualizar Persona</title>
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
        <h1><strong> Editar propietario</strong></h1>
        <form method="post" action="actualizarpersona.php">

            <div class="border border" style="padding: 20px;">
                <br>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="number" placeholder="Cédula" class="form-control" name="c1"
                        value="<?php echo $linea['ci']; ?>" required="true" />
                </div>
                <br>
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="text" placeholder="Nombre" class="form-control" name="c2"
                        value="<?php echo $linea['nombre']; ?>" required="true" />
                </div>
                <br>
                <div class="form-outline mb-4">
                    <input type="text" placeholder="Apellido" class="form-control" name="c3"
                        value="<?php echo $linea['apellido']; ?>" required="true" />
                </div>
                <br>
                <div class="form-outline mb-4">
                    <input type="number" placeholder="Teléfono" class="form-control" name="c4"
                        value="<?php echo $linea['telefono']; ?>" required="true" />
                </div>
                <br>
                <div class="form-outline mb-4">
                    <input type="text" placeholder="Dirección" class="form-control" name="c5"
                        value="<?php echo $linea['direccion']; ?>" required="true" />
                </div>
                <br>
                <div class="form-outline mb-4">
                    <input type="number" placeholder="Cantidad Animales" class="form-control" name="c6"
                        value="<?php echo $linea['cantanimales']; ?>" required="true" />
                </div>
                <br>
                <div class="form-outline mb-4">
                    <input type="hidden" placeholder="Dirección" class="form-control" name="id"
                        value="<?php echo $id; ?>" required="true" />
                </div>
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Actualizar</button>
            </div>


            <!-- <div class="row" style="width: 900px;margin-left:300px;margin-right:300px;margin-top:3%">
            <div class="w3-sidebar w3-card" style="width:50%;height:50%">
                <div class="col-sm-4" style="margin-left:100px;margin-top:20px">
                    <label for="ci">CI:</label>
                    <input type="text" id="i1" class="form-control" name="c1" value="<?php echo $linea['ci']; ?>">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="i2" class="form-control" name="c2" value="<?php echo $linea['nombre']; ?>">
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="i3" class="form-control" name="c3" value="<?php echo $linea['apellido']; ?>">

                </div>

                <div class="col-sm-4" style="margin-right:80px;margin-top:20px">
                    <label for="telefono">Telefono:</label>
                    <input type="text" id="i4" class="form-control" name="c4" value="<?php echo $linea['telefono']; ?>">
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="i5" class="form-control" name="c5" value="<?php echo $linea['direccion']; ?>">
                    <label for="cantanimales">Cantidad Animales:</label>
                    <input type="text" id="i6" class="form-control" name="c6"
                        value="<?php echo $linea['cantanimales']; ?>">
                    <br>
                    <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">

                    <button type="submit" value="actualizar" name="actualizar"
                        class="btn btn-default">Actualizar</button>
                </div>
            </div> -->
        </div>
        </form>
    </div>  
</body>

</html>