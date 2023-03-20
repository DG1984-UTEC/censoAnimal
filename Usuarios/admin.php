<?php
/*App de censo Animal

Versión 1.0
Autor: Técnico en TI Darío Gonzalez
*/

session_start();


if (isset($_SESSION['usuario'])){
    include ('../headerAdmin.php');

    $totalU = $conexion->query("SELECT * FROM usuarios");
    $totalesU = mysqli_num_rows($totalU);

    $totalUadmin = $conexion->query("SELECT * FROM usuarios WHERE tipo = 'us'");
    $totalesUadmin = mysqli_num_rows($totalUadmin);

    $totalUusuario = $conexion->query("SELECT * FROM usuarios WHERE tipo = 'ad'");
    $totalesUusuario = mysqli_num_rows($totalUusuario);


}else{
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
        <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
        <script type="text/javascript" src="../js/popper.min.js"></script>
        <script type="text/javascript" src="../js/jquery-3.6.1.js"></script>
        <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
        <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#tUsers').DataTable({
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
        <link rel="stylesheet" href="../css/header.css">
    <title>Administración</title>
</head>

<body id="bod">
<div class="container">
                <div id="borde" class="border border" style="padding: 20px;">
                    <h1><strong>
                            <center>Panel de control</center>
                        </strong></h1>
                    
                </div>
            </div>
       
            <div class="container">
                <div id="borde" class="border border" style="padding: 20px;">
                <div class="row">
                        <div class="col-sm">
                            <div class="card">
                                <div class="card-body">
                                   Total: <strong><span id="connected_users"><?php echo $totalesU ?></span></strong>
                                </div>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-body">
                                   Administradores: <strong><span id="connected_users"><?php echo $totalesUadmin ?></span></strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card">
                                <div class="card-body">
                                    Usuarios: <strong><span id="daily_revenue"><?php echo $totalesUusuario ?></span></strong>
                                </div>
                            </div>
                            <br>
                            
                        </div>
                    </div>
                </div>
            </div>
       


    </form>
</body>

</html>