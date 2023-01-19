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
        <link rel="stylesheet" href="css/w3.css">
        <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
        <script type="text/javascript" src="../js/popper.min.js"></script>
        <script type="text/javascript" src="../js/jquery-3.6.1.js"></script>
        <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->

        <!-- <link rel="stylesheet" href="css/bootstrap.min(old).css"> -->
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/bootstrap-utilities.css">
        <link rel="stylesheet" href="../css/principal.css">

        <title>Ingresar Persona</title>
    </head>

    <body id="bod">
        <!-- NavBar -->
        <div class="dropdown">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="../index.php">Censo Animal</a>
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
                                    <li><a class="dropdown-item" href="../Propietarios/formularioPersona.php">Nuevo
                                            Propietario</a></li>
                                    <li><a class="dropdown-item" href="../Propietarios/obtener.php">Listar propietarios</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Animales
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="../Animales/formularioAnimal.php">Nuevo Animal</a>
                                    </li>
                                    <li><a class="dropdown-item" href="../Animales/obtenerAnimales.php">Listar Animales</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Castraciones
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="../Castraciones/formularioCastracion.php">Nueva
                                            castración</a></li>
                                    <li><a class="dropdown-item" href="../Castraciones/obtenerCastraciones.php">Listar
                                            Castraciones</a></li>
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
                                <li><a class="dropdown-item" href="../cerrar.php">Salir</a></li>

                            </ul>
                </div>
            </nav>
            <!-- NavBar -->

<br>
            <div class="container-fluid" style="width:650px">


                <form method="post" action="agregarPersona.php">

                    <div id="borde" class="border border" style="padding: 20px;">
                        <h1><strong> Datos del propietario</strong></h1>
                        <br>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="number" placeholder="Cédula" class="form-control" name="ciP" required="true" />
                        </div>
                        <br>
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="text" placeholder="Nombre" class="form-control" name="nombreP" required="true" />
                        </div>
                        <br>
                        <div class="form-outline mb-4">
                            <input type="text" placeholder="Apellido" class="form-control" name="apellidoP" required="true" />
                        </div>
                        <br>
                        <div class="form-outline mb-4">
                            <input type="number" placeholder="Teléfono" class="form-control" name="telefonoP" required="true" />
                        </div>
                        <br>
                        <div class="form-outline mb-4">
                            <input type="text" placeholder="Dirección" class="form-control" name="direccionP" required="true" />
                        </div>
                        <br>
                        <div class="form-outline mb-4">
                            <input type="number" placeholder="Cantidad Animales" class="form-control" name="cantanimales" required="true" />
                        </div>
                        <br>
                        <select class="form-select form-select-sm mb-1" aria-label="Default select example" id="location" name="location" onchange="locationSelectHandler(this)">
                            <option hidden selected>-- Seleccionar Localidad --</option>
                            <option value="Paysandu ciudad">Paysandu ciudad</option>
                            <option value="Quebracho">Quebracho</option>
                            <option value="Guichon">Guichon</option>
                            <option value="Chapicuy">Chapicuy</option>
                            <option value="La Tentacion">La Tentacion</option>
                            <option value="Porvenir">Porvenir</option>
                            <option value="Esperanza">Esperanza</option>
                            <option value="Constancia">Constancia</option>
                            <option value="Tambores">Tambores</option>
                            <option value="Piñera">Piñera</option>
                            <option value="Beisso">Beisso</option>
                            <option value="Piedra Sola">Piedra Sola</option>
                            <option value="Tiatucura">Tiatucura</option>
                            <option value="Cuchilla de Fuego">Cuchilla de Fuego</option>
                            <option value="Piedras Coloradas">Piedras Coloradas</option>
                            <option value="Colonia 19 de Abril">Colonia 19 de Abril</option>
                            <option value="Orgoroso">Orgoroso</option>
                            <option value="Arroyo Negro">Arroyo Negro</option>
                            <option value="Morato">Morato</option>
                            <option value="Merinos">Merinos</option>
                            <option value="Arbolito">Arbolito</option>
                            <option value="El Eucalipto">El Eucalipto</option>
                            <option value="Cañada Del Pueblo">Cañada Del Pueblo</option>
                            <option value="Buricayupi">Buricayupi</option>
                            <option value="Soto">Soto</option>
                            <option value="Lorenzo Geyres">Lorenzo Geyres</option>
                            <option value="Estacion Porvenir">Estacion Porvenir</option>
                        </select>
                        <br>
                        <select class="form-select form-select-sm mb-3" aria-label="Default select example" id="zone" name="zone">
                            <option value="" hidden selected>-- Seleccionar Zona --</option>
                            <option value="Norte">Norte</option>
                            <option value="Sur">Sur</option>
                            <option value="Centro">Centro</option>
                            <option value="Este">Este</option>
                            <option value="Oeste">Oeste</option>
                        </select>
                        <br>
                        <!-- Submit button -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block mb-4">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
    </body>

    </html>
    <script>
        function hide() {
            var zone = document.getElementById('zone');
            zone.style.visibility = 'hidden';
        }

        function show() {
            var zone = document.getElementById('zone');
            zone.style.visibility = 'visible';
        }

        function locationSelectHandler(select) {
            var zone = document.getElementById('zone');
            if (select.value == 'Paysandu ciudad') {
                show();
            } else {
                hide();
            }
        }
    </script>
<?php
} else {
    echo header("location: login.php");
}

?>