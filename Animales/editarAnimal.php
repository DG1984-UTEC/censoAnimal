<?php
session_start();

// Detects if there is someone logged in.

//if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == true){
if (isset($_SESSION['usuario'])){
    
$id = !empty($_GET['id']) ? $_GET['id'] : 0;
$linea='';
if($id){
    include('../database.php');
	$registro = "SELECT * FROM animal WHERE id = $id;";
	$resultado = mysqli_query($conexion,$registro);
	$linea = mysqli_fetch_array($resultado);
}
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
    <title>Actualizar animal</title>
</head>

<body>
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

        <div class="container-fluid" style="width:650px">
               

                <form method="post" action="actualizaranimal.php">

                    <div class="border border" style="padding: 20px;">
                    <h1><strong> Datos del animal</strong></h1>
                    <br>
                    <div class="form-outline mb-4">
                            <input type="hidden" placeholder="Cédula dueño" class="form-control" name="id" value=<?php echo $_GET['id'];?> required="true" />
                        </div>
                        <br>
                        <div class="form-outline mb-4">
                            <input type="number" placeholder="Cédula dueño" class="form-control" name="cidueno" value="<?php echo $linea['cidueno'];?>" required="true" />
                        </div>
                        <br>
                        <div class="form-outline mb-4">
                            <input type="text" placeholder="Nombre del animal" class="form-control" name="nombre" value="<?php echo $linea['nombre'];?>" required="true" />
                        </div>
                        <br>
                        
                        <table class="table table-responsive">
                            <th>
                            <label for="especie">Especie:</label>
                            <br>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Perro" <?php if($linea['especie']=='Perro') print "checked=true"?> name="especie" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Perro
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Gato" <?php if($linea['especie']=='Gato') print "checked=true"?> name="especie" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Gato
                                </label>
                            </div>
                            <br>
                            <label for="especie">Sexo:</label>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Macho" <?php if($linea['sexo']=='Macho') print "checked=true"?> name="sexo" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Macho
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="Hembra"  <?php if($linea['sexo']=='Hembra') print "checked=true"?> name="sexo" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Hembra
                                </label>
                            </div>
                            <br>
                            </th>
                            <th>
                            <label for="especie">Castrado:</label>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="SI"  <?php if($linea['castrado']=='SI') print "checked=true"?> name="castrado" id="siCas" onClick="valueChanged()">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Sí
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="NO"  <?php if($linea['castrado']=='NO') print "checked=true"?>  name="castrado" id="noCas" onClick="valueChanged()">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    No
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="NULL" <?php if($linea['castrado']=='NULL') print "checked=true"?> name="castrado" onClick="valueChanged()">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Ns/Nc
                                </label>
                            </div>
                            <br>
                            <label for="especie">Desea castrar:</label>
                            <br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="SI" <?php if($linea['reqcastracion']=='SI') print "checked=true"?> name="reqcastracion" id="neCas">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Sí
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="NO" <?php if($linea['reqcastracion']=='NO') print "checked=true"?>  name="reqcastracion" ">
                        <label class=" form-check-label" for="flexRadioDefault1">
                                No
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="NULL" <?php if($linea['reqcastracion']=='NULL') print "checked=true"?>  name="reqcastracion" ">
                        <label class=" form-check-label" for="flexRadioDefault1">
                                Ns/Nc
                                </label>
                            </div>
                            </th>
                        </table>
                        <button type="submit" class="btn btn-primary btn-block mb-4">Actualizar</button>
                    </div>
                </form>
            </div>






    <!-- <form method="post" action="actualizaranimal.php">

        <div class="row" style="width: 900px;margin-left:300px;margin-right:300px;margin-top:3%">
            <div class="w3-sidebar w3-card" style="width:50%;height:50%">
                <div class="col-sm-4" style="margin-left:100px;margin-top:20px">
                    <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                    <label for="cidueño">CI Dueño:</label>
                    <input type="text" class="form-control" name="cidueno" value="<?php echo $linea['cidueno'];?>">
                    <label for="pwd">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $linea['nombre'];?>">
                    <br>
                    <label><input type="radio" class="optradio" name="especie" value="Perro"
                            <?php if($linea['especie']=='Perro') print "checked=true"?> /> Perro </label>
                    <label><input type="radio" class="optradio" name="especie" value="Gato"
                            <?php if($linea['especie']=='Gato') print "checked=true"?> /> Gato</label>
                    <br>
                    <label for="pwd">Sexo:</label>
                    <br>

                    <label><input type="radio" class="optradio" name="sexo" value="Macho"
                            <?php if($linea['sexo']=='Macho') print "checked=true"?> />Macho</label>
                    <label><input type="radio" class="optradio" name="sexo" value="Hembra"
                            <?php if($linea['sexo']=='Hembra') print "checked=true"?> />Hembra</label>
                    <label><input type="radio" class="optradio" name="sexo" value="NULL"
                            <?php if($linea['sexo']=='NULL') print "checked=true"?> />
                        Ns/Nc</label>

                </div>

                <div class="col-sm-4" style="margin-right:80px;margin-top:20px">
                    <label for="pwd">Castrado:</label>
                    <br>


                    <label><input type="radio" class="optradio" name="castrado" value="Si"
                            <?php if($linea['castrado']=='SI') print "checked=true"?> />Si</label>
                    <label><input type="radio" class="optradio" name="castrado" value="No"
                            <?php if($linea['castrado']=='NO') print "checked=true"?> />No</label>
                    <label><input type="radio" class="optradio" name="castrado" value="NULL"
                            <?php if($linea['castrado']=='NULL') print "checked=true"?> />Ns/Nc</label>

                    <br>
                    <br>
                    <br>
                    <label for="pwd">¿Requiere castración?</label>
                    <br>
                    <label><input type="radio" class="optradio" name="reqcastracion" value="SI"
                            <?php if($linea['reqcastracion']=='SI') print "checked=true"?> />Si</label>
                    <label><input type="radio" class="optradio" name="reqcastracion" value="NO"
                            <?php if($linea['reqcastracion']=='NO') print "checked=true"?> />No</label>
                    <label><input type="radio" class="optradio" name="reqcastracion" value="NULL"
                            <?php if($linea['reqcastracion']=='NULL') print "checked=true"?> />Ns/Nc</label>

                    <br>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-default">Enviar</button>
                </div>

            </div>
        </div>



    </form> -->
</body>

</html>