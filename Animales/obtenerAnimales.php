<?php
include_once('../database.php');
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

        <script>
            $(document).ready(function() {
                $('#tAnimals').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": '../scripts/server_processing_animales_table.php',
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
        <title>Obtener animales</title>
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
                            <li><a class="dropdown-item" href="../cerrar.php">Salir</a></li>

                        </ul>
            </div>
        </nav>
        <!-- NavBar -->
        <br>
        <div id="borde" class="border border" style="padding: 20px;">
            <table id="tAnimals" class="table table-striped">
                <thead>
                    <tr>
                        <th>CI Dueño</th>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Sexo</th>
                        <th>Castrado</th>
                        <th>Requiere castración</th>
                        <th>Creado</th>
                        <th>Actualizado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    // if (isset($_GET['pageno'])) {
                    //     $pageno = $_GET['pageno'];
                    // } else {
                    //     $pageno = 1;
                    // }
                    // $no_of_records_per_page = 15;
                    // $offset = ($pageno - 1) * $no_of_records_per_page;

                    // $result = $conexion->query("SELECT COUNT(*) FROM animal");

                    // $total_rows = mysqli_fetch_array($result)[0];
                    // $total_pages = ceil($total_rows / $no_of_records_per_page);

                    // $consulta = $conexion->query("SELECT * FROM animal LIMIT $offset, $no_of_records_per_page");

                    // while ($fila = mysqli_fetch_array($consulta)) {

                    //     $id = $fila["id"];
                    //     $cidueno = $fila["cidueno"];
                    //     $nombre = $fila["nombre"];
                    //     $especie = $fila["especie"];
                    //     $sexo = $fila["sexo"];
                    //     $castrado = $fila["castrado"];
                    //     $reqcastracion = $fila["reqcastracion"];
                    //     $created_at = $fila["CREATED_AT"];
                    //     $updated_at = $fila["UPDATED_AT"];
                    ?>
                        <!-- <tr>
                            <td><?php echo $cidueno; ?></td>
                            <td><?php echo $nombre; ?></td>
                            <td><?php echo $especie; ?></td>
                            <td><?php echo $sexo; ?></td>
                            <td><?php echo $castrado; ?></td>
                            <td><?php echo $reqcastracion; ?></td>
                            <td><?php echo $created_at; ?></td>
                            <td><?php echo $updated_at; ?></td>
                            <td>
                                <a href="editarAnimal.php?id=<?php echo $id; ?>" class="edit">Editar</a>
                                <a href="borrarpersona.php?id=<?php echo $id; ?>" class="delete" title="Eliminar">Borrar</a>
                            </td>
                        </tr> -->
            <?php
                    // }
            ?>
             <!-- </tbody>
            <tfoot>
            <tr>
                        <th>CI Dueño</th>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Sexo</th>
                        <th>Castrado</th>
                        <th>Requiere castración</th>
                        <th>Creado</th>
                        <th>Actualizado</th>
                        <th>Acciones</th>

                    </tr>
            </tfoot>
            </table>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
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
        </nav> -->
                </tbody>
            </table>
        </div>
    </body>

    </html>

<?php

} else {
    echo header("location: login.php");
}
?>