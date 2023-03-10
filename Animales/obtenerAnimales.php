<?php
include_once('../database.php');
session_start();


if (isset($_SESSION['usuario'])) {
include ("../header.php");
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
        <link rel="stylesheet" href="../css/header.css">
        <title>Obtener animales</title>
    </head>

    <body id="bod">

      <!-- NavBar -->
      
            <!-- NavBar -->
        <br>
        <div id="borde" class="border border" style="padding: 20px;">
            <table id="tAnimals" class="display compact" style="width:100%">
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
                </tbody>
            </table>
        </div>
       <br>
       <br>
       <br>
    </body>

    </html>

<?php

} else {
    echo header("location: login.php");
}
?>