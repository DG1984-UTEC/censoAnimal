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
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/jquery-3.6.1.js"></script>
    <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="../js/sweetalert2@10.js"></script>

    <script>
    $(document).ready(function() {
        $('#tAdmin').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": '../scripts/server_processing_usuarios_table.php',
            "language": {
                "emptyTable": "No hay datos disponibles en la tabla",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 entradas",
                "infoFiltered": "(filtrado desde _MAX_ registros totales)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ registros",
                "loadingRecords": "cargando...",
                "processing": "",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron resultados",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
            }
        });
    });
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
    <link rel="stylesheet" href="../css/sweetalert2.min.css">
    <title>Nuevo usuario</title>
</head>

<body>

    <!-- NavBar -->
    <div class="dropdown">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="./admin.php">Censo Animal</a>
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
                                Administración de Usuarios
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="../Usuarios/agregarusuario.php">Nuevo Usuario</a>
                                </li>
                                <li><a class="dropdown-item" href="../Usuarios/obtenerusuarios.php">Listar Usuarios</a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item dropdown">
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
                        </li> -->
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
            <form method="post" action="agregarusuario.php">
                <div id="borde" class="border border" style="padding: 20px;">
                    <h1><strong> Datos del usuario</strong></h1>
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
                        <input type="text" placeholder="Apellido" class="form-control" name="apellido"
                            required="true" />
                    </div>
                    <br>
                    <div class="form-outline mb-4">
                        <input type="text" placeholder="Usuario" class="form-control" name="usuario" required="true" />
                    </div>
                    <br>
                    <div class="form-outline mb-4">
                        <input type="text" placeholder="Password" class="form-control" name="password"
                            required="true" />
                    </div>
                    <br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="ad" name="tipo" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Administrador
                        </label>
                    </div>
                    <br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="us" name="tipo" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Usuario
                        </label>
                    </div>
                    <br>
                    <!-- Submit button -->
                    <button type="submit" name= "submit" class="btn btn-primary btn-block mb-4">Enviar</button>
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