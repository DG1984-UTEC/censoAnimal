<?php
session_start();


if (isset($_SESSION['usuario'])){
include ("../headerAdmin.php")
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
    <link rel="stylesheet" href="../css/header.css">
    <title>Nuevo usuario</title>
</head>

<body>

    
        <div class="container-fluid" style="width:650px">
            <form method="post" action="agregarusuario.php">
                <br>
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
                    <div class="d-grid gap-2">
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