<?php
session_start();


if (isset($_SESSION['usuario'])) {

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/jquery-3.6.1.js"></script>
    <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>

    <!-- <script>
            $(document).ready(function() {
                $('#tUsers').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": 'scripts/server_processing.php',
                });
            }); -->
    </script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->

    <!-- <link rel="stylesheet" href="css/bootstrap.min(old).css"> -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-utilities.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../css/principal.css">
    <title>Obtener animales</title>

    <title>Ingresar Castración</title>
</head>

<body id="bod">
   <!-- NavBar -->
   <div class="dropdown">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">Censo Animal</a>
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
                                <li><a class="dropdown-item" href="../Propietarios/formularioPersona.php">Nuevo Propietario</a></li>
                                <li><a class="dropdown-item" href="../Propietarios/obtener.php">Listar propietarios</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Animales
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="../Animales/formularioAnimal.php">Nuevo Animal</a></li>
                                <li><a class="dropdown-item" href="../Animales/obtenerAnimales.php">Listar Animales</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Castraciones
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="../Castraciones/formularioCastracion.php">Nueva castración</a></li>
                                <li><a class="dropdown-item" href="../Castraciones/obtenerCastraciones.php">Listar Castraciones</a></li>
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
            

            <form method="post" action="agregarCastracion.php">

                <div id= "borde" class="border border" style="padding: 20px;">
                <h1><strong> Datos de castración</strong></h1>
                    <br>
                    <div class="form-outline mb-4">
                        <input type="date" placeholder="Cédula dueño" class="form-control" name="fecastracion"
                            required="true" />
                    </div>
                    <br>
                    <div class="form-outline mb-4">
                        <input type="text" placeholder="CI del dueño" class="form-control" name="cidueno"
                            required="true" />
                    </div>
                    <br>
                    <div class="form-outline mb-4">
                        <input type="text" placeholder="Nombre" class="form-control" name="nombre" required="true" />
                    </div>
                    <br>
                    <div class="form-outline mb-4">
                        <input type="text" placeholder="Apellido" class="form-control" name="apellido"
                            required="true" />
                    </div>
                    <br>
                    <div class="form-outline mb-4">
                        <input type="text" placeholder="Nombre de la mascota" class="form-control" name="nmascota"
                            required="true" />
                    </div>
                    <br>
                    <div class="form-outline mb-4">
                        <input type="number" placeholder="Id chip" class="form-control" name="idchip" required="true" />
                    </div>
                    <br>
                    <table class="table table-responsive">
                        <th>
                            <label for="especie">Especie:</label>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Perro" name="especie"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Perro
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Gato" name="especie"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Gato
                                </label>
                            </div>
                            <br>
                        </th>
                        <th>
                            <label for="especie">Sexo:</label>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Macho" name="sexo"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Macho
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Hembra" name="sexo"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Hembra
                                </label>
                            </div>
                            <br>
                        </th>
                    </table>
                    <button type="submit" class="btn btn-primary btn-block mb-4">Enviar</button>
                </div>
            </form>
        </div>
</body>

</html>
<?php
} else {
    echo header("location: login.php");
}

?>