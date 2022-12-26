<?php
include_once('database.php');
session_start();


if (isset($_SESSION['usuario'])) {

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
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#tUsers').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": 'scripts/server_processing.php',
                });
            });
        </script>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->

        <!-- <link rel="stylesheet" href="css/bootstrap.min(old).css"> -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-utilities.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/jquery.dataTables.min.css">
        <title>Obtener Personas</title>
    </head>

    <body>
        <!-- NavBar -->
        <div class="dropdown">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php">Censo Animal</a>
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

            <table id="tUsers">

                <thead>
                    <tr>
                        <th>CI</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Cantidad Animales</th>
                        <th>Creado</th>
                        <th>Actualizado</th>
                        <th>Por</th>
                        <th></th>
                        <th></th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>CI</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Cantidad Animales</th>
                        <th>Creado</th>
                        <th>Actualizado</th>
                        <th>Por</th>
                        <th></th>
                        <th></th>

                    </tr>
                    <?php
                    // $consulta = $conexion->query("SELECT * FROM persona");
                    // while ($fila = mysqli_fetch_array($consulta)) {

                    //     $id = $fila["id"];
                    //     $ci = $fila["ci"];
                    //     $nombre = $fila["nombre"];
                    //     $apellido = $fila["apellido"];
                    //     $telefono = $fila["telefono"];
                    //     $direccion = $fila["direccion"];
                    //     $cantanimales = $fila["cantanimales"];
                    //     $created_at = $fila["CREATED_AT"];
                    //     $updated_at = $fila["UPDATED_AT"];
                    //     $sesion = $fila['sesion'];
                    ?>
                    <!-- <tr>
                            <td><?php echo $ci; ?></td>
                            <td><?php echo $nombre; ?></td>
                            <td><?php echo $apellido; ?></td>
                            <td><?php echo $telefono; ?></td>
                            <td><?php echo $direccion; ?></td>
                            <td><?php echo $cantanimales; ?></td>
                            <td><?php echo $created_at; ?></td>
                            <td><?php echo $updated_at; ?></td>
                            <td><?php echo $sesion; ?></td>
                            <td>
                                <a href="editarpersona.php?id=<?php echo $id; ?>" class="edit">Editar</a>
                                <a href="borrarpersona.php?id=<?php echo $id; ?>" class="delete" title="Eliminar">Borrar</a>
                            </td>
                        </tr> -->
                    <?php
                    // } 
                    ?>;
                </tfoot>
            </table>


            <!-- <div style="width:1050px;margin:auto;margin-top: 12px;">

                <table id="tUsers" class="table table-striped" width='80%' style="text-align:center;">

                    <tr>
                        <th>CI</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Cantidad Animales</th>
                        <th>Creado</th>
                        <th>Actualizado</th>
                        <th>Por</th>
                        <th>Acciones</th>


                    </tr>
                    <p><a href="obtenerAnimales.php">Lista de Animales</a></p>


                    <form method="post" action="buscarPersona.php">
                        <input type="buscarci" style="width:33%" class="form-control" placeholder="Ingrese CI" name="buscarci">
                        <button type="submit" class="btn btn-default">Buscar</button>
                        <button type="submit" class="btn btn-default" name="listar">Listar</button> -->
            <?php
            // if (isset($_GET['pageno'])) {
            //     $pageno = $_GET['pageno'];
            // } else {
            //     $pageno = 1;
            // }
            // $no_of_records_per_page = 10;
            // $offset = ($pageno - 1) * $no_of_records_per_page;

            // $result = $conexion->query("SELECT COUNT(*) FROM persona");

            // $total_rows = mysqli_fetch_array($result)[0];
            // $total_pages = ceil($total_rows / $no_of_records_per_page);

            // $consulta = $conexion->query("SELECT * FROM persona LIMIT $offset, $no_of_records_per_page");
            // while ($fila = mysqli_fetch_array($consulta)) {
            //     $id = $fila["id"];
            //     $ci = $fila["ci"];
            //     $nombre = $fila["nombre"];
            //     $apellido = $fila["apellido"];
            //     $telefono = $fila["telefono"];
            //     $direccion = $fila["direccion"];
            //     $cantanimales = $fila["cantanimales"];
            //     $created_at = $fila["CREATED_AT"];
            //     $updated_at = $fila["UPDATED_AT"];
            //     $sesion = $fila['sesion'];

            ?>
            <!-- <tr>
                                <td><?php echo $ci; ?></td>
                                <td><?php echo $nombre; ?></td>
                                <td><?php echo $apellido; ?></td>
                                <td><?php echo $telefono; ?></td>
                                <td><?php echo $direccion; ?></td>
                                <td><?php echo $cantanimales; ?></td>
                                <td><?php echo $created_at; ?></td>
                                <td><?php echo $updated_at; ?></td>
                                <td><?php echo $sesion; ?></td>
                                <td>
                                    <a href="editarpersona.php?id=<?php echo $id; ?>" class="edit">Editar</a>
                                    <a href="borrarpersona.php?id=<?php echo $id; ?>" class="delete" title="Eliminar">Borrar</a>
                                </td>
                            </tr>
                    </form> -->
            <?php
            // }
            ?>
            <?php

            // if (isset($_POST["buscarci"])) {

            //     $buscarci = $_POST['buscarci'];
            //     $consultaci = $conexion->query("SELECT * FROM persona WHERE ci = '$buscarci'");
            //     if ($fila1 = mysqli_fetch_array($consultaci)) {
            //         $id = $fila1["id"];
            //         $ci = $fila1["ci"];
            //         $nombre = $fila1["nombre"];
            //         $apellido = $fila1["apellido"];
            //         $telefono = $fila1["telefono"];
            //         $direccion = $fila1["direccion"];
            //         $cantanimales = $fila1["cantanimales"];
            //         $created_at = $fila1["CREATED_AT"];
            //         $updated_at = $fila1["UPDATED_AT"];
            //         $sesion = $fila1['sesion'];
            // 
            ?>
            <!-- <tr>
                            <td><?php echo $ci; ?></td>
                            <td><?php echo $nombre; ?></td>
                            <td><?php echo $apellido; ?></td>
                            <td><?php echo $telefono; ?></td>
                            <td><?php echo $direccion; ?></td>
                            <td><?php echo $cantanimales; ?></td>
                            <td><?php echo $created_at; ?></td>
                            <td><?php echo $updated_at; ?></td>
                            <td><?php echo $sesion; ?></td>
                            <td>
                                <a href="update.php?id=<?php echo $id; ?>" class="edit">Editar</a>
                                <a href="borrarpersona.php?id=<?php echo $id; ?>" class="delete" title="Eliminar">Borrar</a>
                            </td>
                        </tr> -->
            <?php
            //     } else {
            //         echo "<td>No existen registros</td>";
            //     }
            // }
            ?>

            <!-- <br>
                <div class="container" id="pag">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="?pageno=1">Primero</a></li>
                        <li class="page-item" <?php if ($pageno <= 1) {
                                                    echo 'disabled';
                                                } ?>>
                            <a class="page-link" href="<?php if ($pageno <= 1) {
                                                            echo '#';
                                                        } else {
                                                            echo "?pageno=" . ($pageno - 1);
                                                        } ?>">Anterior</a>
                        </li>
                        <li class="page-item" <?php if ($pageno >= $total_pages) {
                                                    echo 'disabled';
                                                } ?>>
                            <a class="page-link" href="<?php if ($pageno >= $total_pages) {
                                                            echo '#';
                                                        } else {
                                                            echo "?pageno=" . ($pageno + 1);
                                                        } ?>">Siguiente</a>
                        </li>
                        <li><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Ultimo</a></li>
                    </ul>
                </div>
            </div> -->
    </body>

    </html>

<?php
} else {
    echo header("location: login.php");
}
?>