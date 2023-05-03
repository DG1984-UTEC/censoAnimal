<?php
session_start();

// Detects if there is someone logged in.

//if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == true){
if (isset($_SESSION['usuario'])){
    include ('../header.php');
$idC = !empty($_GET['idC']) ? $_GET['idC'] : 0;
$linea='';
if($idC){
    include('../database.php');
	$registro = "SELECT * FROM castracion WHERE idC = $idC;";
	$resultado = mysqli_query($conexion,$registro);
	$linea = mysqli_fetch_array($resultado);
}
}else{
    echo header("location: login.php");
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <link rel="stylesheet" href="../css/header.css">
    <title>Editar castración</title>
</head>
<body id="bod">
   
        <div class="container-fluid" style="width:650px">
            
<br>
            <form method="post" action="actualizarCastracion.php">

                <div id="borde" class="border border" style="padding: 20px;">
                <h1><strong> Editar datos de castración</strong></h1>
                <div class="form-outline mb-4">
                            <input type="hidden" placeholder="Cédula dueño" class="form-control" name="idC" value=<?php echo $_GET['idC'];?> required="true" />
                        </div>
                    <br>
                    <div class="form-outline mb-4">
                        <input type="date" placeholder="Cédula dueño" class="form-control" name="fecastracion" value=<?php echo $linea['fecastracion'];?>
                            required="true" />
                    </div>
                    <br>
                    <div class="form-outline mb-4">
                        <input type="text" placeholder="CI del dueño" class="form-control" name="ciduenoC" value=<?php echo $linea['ciduenoC'];?>
                            required="true" />
                    </div>
                    <br>
                    <div class="form-outline mb-4">
                        <input type="text" placeholder="Nombre" class="form-control" name="nombreC" value=<?php echo $linea['nombreC'];?> required="true" />
                    </div>
                    <br>
                    <div class="form-outline mb-4">
                        <input type="text" placeholder="Apellido" class="form-control" name="apellidoC" value=<?php echo $linea['apellidoC'];?>
                            required="true" />
                    </div>
                    <br>
                    <div class="form-outline mb-4">
                        <input type="text" placeholder="Nombre de la mascota" class="form-control" name="nmascota" value=<?php echo $linea['nmascota'];?>
                            required="true" />
                    </div>
                    <br>
                    <div class="form-outline mb-4">
                        <input type="text" placeholder="Id chip"  size="23" maxlength="23" minlength="23" class="form-control" name="idchip" value=<?php echo $linea['idchip'];?> required="true" />
                    </div>
                    <br>
                    <table class="table table-responsive">
                        <th>
                            <label for="especie">Especie:</label>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Perro" name="especieC" value="Perro" <?php if($linea['especieC']=='Perro') print "checked=true"?>
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Perro
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Gato" name="especieC" value="Gato" <?php if($linea['especieC']=='Gato') print "checked=true"?>
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
                                <input class="form-check-input" type="radio" value="Macho" name="sexoC" value="Macho" <?php if($linea['sexoC']=='Macho') print "checked=true"?>
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Macho
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Hembra" name="sexoC" value="Hembra" <?php if($linea['sexoC']=='Hembra') print "checked=true"?>
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Hembra
                                </label>
                            </div>
                            <br>
                        </th>
                    </table>
                    <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block mb-4">Actualizar</button>
                        </div>
                </div>
            </form>
        </div>


</body>
</html>