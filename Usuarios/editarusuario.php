<?php

session_start();


if (isset($_SESSION['usuario'])) {
include ("../headerAdmin.php");

    $id = !empty($_GET['id']) ? $_GET['id'] : 0;
    $linea = '';

    if ($id) {
        include('../database.php');
        $registro = "SELECT * FROM usuarios WHERE id = $id;";
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
    <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/jquery-3.6.1.js"></script>
    <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>


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

    <title>Actualizar Usuario</title>
</head>

<body>
   
        <div class="container-fluid" style="width:650px">
            <form method="post" action="actualizarusuario.php">
                <br>
                <div id="borde" class="border border" style="padding: 20px;">
                    <h1><strong> Actualizar usuario</strong></h1>
                    <br>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="hidden" placeholder="Cédula" class="form-control" name="id" value="<?php echo $id; ?>"  />
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" placeholder="Cédula" class="form-control" name="c1"
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
                        <input type="text" placeholder="Usuario" class="form-control" name="c4"
                            value="<?php echo $linea['usuario']; ?>" required="true" />
                    </div>
                    <br>
                    <div class="form-outline mb-4">
                        <input type="text" placeholder="Password" class="form-control" name="c5"
                            value="<?php echo $linea['password']; ?>" required="true" />
                    </div>
                    <br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="c6" value="ad"
                            <?php if ($linea['tipo'] == 'ad') print "checked=true" ?> id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Administrador
                        </label>
                    </div>
                    <br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="c6" value="us"
                            <?php if ($linea['tipo'] == 'us') print "checked=true" ?> id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Usuario
                        </label>
                    </div>
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