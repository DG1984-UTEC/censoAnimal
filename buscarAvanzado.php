<?php
include_once('database.php');
session_start();
$_SESSION['id'] = "";
$_SESSION['ci'] = null;
$_SESSION['cidueno'] = null;
$_SESSION['errmsg'] = null;
$_SESSION['ciduenoA'] = null;
$_SESSION['ciduenoC'] = null;

if (isset($_SESSION['usuario'])) {

    $idP = null;
    $consultaci =null;
    $consultaAnimal = null;
    $consultaCastracion = null;
    // $ciP = "";
    // $nombreP = "";
    // $apellidoP = "";
    // $telefonoP = "";
    // $direccionP = "";
    // $cantanimalesP = "";
    // $created_atP = "";
    // $updated_atP = "";
    // $sesionP = "";
    // $consultaci = "";
    // $consultaAnimal = "";
    // $consultaCastracion = "";
    $idP && $ciP && $nombreP && $apellidoP && $telefonoP && $direccionP && $cantanimalesP && $created_atP && $updated_atP && $sesionP && $idA 
    && $ciduenoA && $nombreA && $especieA && $sexoA && $castradoA && $reqcastracionA && $created_atA && $updated_atA && $sesionA && $idC 
    && $fecastracionC && $ciduenoC && $nombreC && $apellidoC && $nmascotaC && $idchipC && $especieC && $sexoC && $created_atC && $updated_atC && $sesionC = null;
    
    // $idA = "";
    // $ciduenoA = "";
    // $nombreA = "";
    // $especieA = "";
    // $sexoA = "";
    // $castradoA = "";
    // $reqcastracionA = "";
    // $created_atA = "";
    // $updated_atA = "";
    // $sesionA = "";

    // $idC = "";
    // $fecastracionC = "";
    // $ciduenoC = "";
    // $nombreC = "";
    // $apellidoC = "";
    // $nmascotaC = "";
    // $idchipC = "";
    // $especieC = "";
    // $sexoC = "";
    // $created_atC = "";
    // $updated_atC = "";
    // $sesionC = "";

    if (isset($_POST["buscar"])) {


        $buscar = $_POST['buscar'];
        $comboSel = $_POST['comboSel'];
        //////////////BUSQUEDA POR CI/////////////////////////
       
        if ($comboSel == 'ci') {
            $consultaci = $conexion->query("SELECT * FROM persona WHERE ci = '$buscar'");
            // $consultaci = $conexion->query("SELECT * FROM persona INNER JOIN animal ON persona.ci = animal.cidueno INNER JOIN castracion ON persona.ci = castracion.cidueno WHERE ci = '$buscar'");
            $consultaAnimal = $conexion->query("SELECT * FROM animal WHERE cidueno = '$buscar'");
            $consultaCastracion = $conexion->query("SELECT * FROM castracion WHERE cidueno = '$buscar'");

            // SELECT column_name(s)
            // FROM table1
            // INNER JOIN table2
            // ON table1.column_name = table2.column_name;

            if ($fila1 = mysqli_fetch_array($consultaci)) {
                $_SESSION['id'] = $fila1["id"];
                $_SESSION['ci'] = $fila1["ci"];
                $idP = $fila1["id"];
                $ciP = $fila1["ci"];
                $nombreP = $fila1["nombre"];
                $apellidoP = $fila1["apellido"];
                $telefonoP = $fila1["telefono"];
                $direccionP = $fila1["direccion"];
                $cantanimalesP = $fila1["cantanimales"];
                $created_atP = $fila1["CREATED_AT"];
                $updated_atP = $fila1["UPDATED_AT"];
                $_SESSION['sesionP'] = $fila1['sesion'];
            

             }else{
                $_SESSION['ci'] = "99";
                $_SESSION['errmsg'] = "no se encontraron datos";

            }
            $sesionP = $_SESSION['sesionP'];

            if ($fila2 = mysqli_fetch_array($consultaAnimal)) {

                $idA = $fila2["id"];
                $ciduenoA = $fila2["cidueno"];
                $nombreA = $fila2["nombre"];
                $especieA = $fila2["especie"];
                $sexoA = $fila2["sexo"];
                $castradoA = $fila2["castrado"];
                $reqcastracionA = $fila2["reqcastracion"];
                $created_atA = $fila2["CREATED_AT"];
                $updated_atA = $fila2["UPDATED_AT"];
                // $sesion = $fila["sesion"];
            }
            else{
                $_SESSION['errmsg'] = "no se encontraron datos";

            }
            $sesionA = $_SESSION['sesionP'];
            if ($fila3 = mysqli_fetch_array($consultaCastracion)) {

                $idC = $fila3["id"];
                $fecastracionC = $fila3["fecastracion"];
                $ciduenoC = $fila3["cidueno"];
                $nombreC = $fila3["nombre"];
                $apellidoC = $fila3["apellido"];
                $nmascotaC = $fila3["nmascota"];
                $idchipC = $fila3["idchip"];
                $especieC = $fila3["especie"];
                $sexoC = $fila3["sexo"];
                $created_atC = $fila3["CREATED_AT"];
                $updated_atC = $fila3["UPDATED_AT"];
                $sesionC = $fila3['sesion'];
            }
            else{
                $_SESSION['errmsg'] = "no se encontraron datos";

            }
            //////////////BUSQUEDA POR CI/////////////////////////

            //////////////BUSQUEDA POR IDCHIP/////////////////////////
            
        } else if ($comboSel == 'idchip') {
            $consultaCastracion = $conexion->query("SELECT * FROM castracion WHERE idchip = '$buscar'");

            if ($fila3 = mysqli_fetch_array($consultaCastracion)) {

                $idC = $fila3["id"];
                $fecastracionC = $fila3["fecastracion"];
                $_SESSION['ciduenoC'] = $fila3["cidueno"];
                $nombreC = $fila3["nombre"];
                $apellidoC = $fila3["apellido"];
                $nmascotaC = $fila3["nmascota"];
                $idchipC = $fila3["idchip"];
                $especieC = $fila3["especie"];
                $sexoC = $fila3["sexo"];
                $created_atC = $fila3["CREATED_AT"];
                $updated_atC = $fila3["UPDATED_AT"];
                $sesionC = $fila3['sesion'];
            }
            else{
                $_SESSION['errmsg'] = "no se encontraron datos";

            }
            $buscarciC =  $_SESSION['ciduenoC'];
            $consultaci = $conexion->query("SELECT * FROM persona WHERE ci = '$buscarciC'");

            if ($fila1 = mysqli_fetch_array($consultaci)) {
                $_SESSION['id'] = $fila1["id"];
                $_SESSION['ci'] = $fila1["ci"];
                $idP = $fila1["id"];
                $ciP = $fila1["ci"];
                $nombreP = $fila1["nombre"];
                $apellidoP = $fila1["apellido"];
                $telefonoP = $fila1["telefono"];
                $direccionP = $fila1["direccion"];
                $cantanimalesP = $fila1["cantanimales"];
                $created_atP = $fila1["CREATED_AT"];
                $updated_atP = $fila1["UPDATED_AT"];
                $_SESSION['sesionA'] = $fila1['sesion'];
            }
            else{
                $_SESSION['errmsg'] = "no se encontraron datos";

            }
            $buscarciA =  $_SESSION['ciduenoC'];
            $consultaAnimal = $conexion->query("SELECT * FROM animal WHERE cidueno = '$buscarciA'");
            if ($fila2 = mysqli_fetch_array($consultaAnimal)) {
                $_SESSION['ciduenoA'] = $fila2["cidueno"];
                $idA = $fila2["id"];
                $ciduenoA = $fila2["cidueno"];
                $nombreA = $fila2["nombre"];
                $especieA = $fila2["especie"];
                $sexoA = $fila2["sexo"];
                $castradoA = $fila2["castrado"];
                $reqcastracionA = $fila2["reqcastracion"];
                $created_atA = $fila2["CREATED_AT"];
                $updated_atA = $fila2["UPDATED_AT"];
            }
            else{
                $_SESSION['errmsg'] = "no se encontraron datos";

            }
            //////////////BUSQUEDA POR IDCHIP/////////////////////////
        } else {
            $_SESSION['errmsg'] = "no se encontraron datos";
        }
    }else {
        $_SESSION['errmsg'] = "no se encontraron datos";
    }



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
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
        <!-- <link rel="stylesheet" href="css/bootstrap.min(old).css"> -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-utilities.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    
        <link rel="stylesheet" href="bootstrap/booticons/icons/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/principal.css">
        <!-- <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap-icons.css"> -->
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> -->
        <!-- Bootstrap Font Icon CSS -->
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
         -->
        <title>Búsqueda Avanzada</title>
    </head>

    <body id="bod">
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
                                    <li><a class="dropdown-item" href="Propietarios/formularioPersona.php">Nuevo Propietario</a></li>
                                    <li><a class="dropdown-item" href="Propietarios/obtener.php">Listar propietarios</a></li>
                                    <li><a class="dropdown-item" href="buscarAvanzado.php">Búsqueda avanzada</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Animales
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="Animales/formularioAnimal.php">Nuevo Animal</a></li>
                                    <li><a class="dropdown-item" href="Animales/obtenerAnimales.php">Listar Animales</a></li>
                                    <li><a class="dropdown-item" href="buscarAvanzado.php">Búsqueda avanzada</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Castraciones
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="Castraciones/formularioCastracion.php">Nueva castración</a></li>
                                    <li><a class="dropdown-item" href="Castraciones/obtenerCastraciones.php">Listar Castraciones</a></li>
                                    <li><a class="dropdown-item" href="buscarAvanzado.php">Búsqueda avanzada</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="dropdown" style="margin-right:20px">
                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION["usuario"];?>
                    </button>
                    <ul class="dropdown-menu" style="margin-right: 200px" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item"  href="cerrar.php">Cerrar Sesión</a></li>
                    </ul> 
                </div>
                <!-- <div class="position-relative">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo  $_SESSION["usuario"]; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="cerrar.php">Salir</a></li>

                            </ul>
                </div> -->
            </nav>
            <!-- NavBar -->
            <br>
            <div class="container">
            <div id="borde" class="border border" style="padding: 5px;">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="container-fluid">
                            <form class="d-flex" method="post" action="buscarAvanzado.php">
                                <div class="container-fluid">
                                    <div class="form-floating">
                                        <select class="form-select" id="comboSel" aria-label="Floating label select example" name="comboSel">
                                            <option value='' selected="true">----</option>
                                            <option value='idchip'>Id Chip</option>
                                            <option value='ci'>CI asociado</option>
                                        </select>
                                        <label for="floatingSelect">Buscar por</label>
                                    </div>
                                </div>
                                <input class="form-control me-2" type="buscar" placeholder="Buscar" aria-label="Search" name="buscar">
                                <button title="Buscar" class="btn btn-success" type="submit">Buscar</button>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
            </div>
            <br>
            <div class="container">
            <div id="borde" class="border border" style="padding: 20px;">
                <div class="container">
                    <h2>Propietario</h2>
                    <table class="table table-striped">
                        <tr align="center">
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
                        <tbody>

                        </tbody>
                        <?php
                        if ($consultaci){
                        if (mysqli_num_rows($consultaci) !== 0){
                        //  if($consultaci){
                        ?>
                        <tr align="center">
                            <td align="center"><?php echo $ciP; ?></td>
                            <td align="center"><?php echo $nombreP; ?></td>
                            <td align="center"><?php echo $apellidoP; ?></td>
                            <td align="center"><?php echo $telefonoP; ?></td>
                            <td align="center"><?php echo $direccionP; ?></td>
                            <td align="center"><?php echo $cantanimalesP; ?></td>
                            <td align="center"><?php echo $created_atP; ?></td>
                            <td align="center"><?php echo $updated_atP; ?></td>
                            <td align="center"><?php echo $sesionP; ?></td>
                            <td align="right">
                                <!-- <a href="./Propietarios/editarPersona.php?id=<?php echo $id; ?>" class="edit">Editar</a> -->
                                <!-- <a href="borrarpersona.php?id=<?php echo $id; ?>" class="delete" title="Eliminar">Borrar</a> -->
                                <button title="Editar" onclick="location.href='../censoanimal/Propietarios/editarPersona.php?id=<?php echo $_SESSION['id']; ?>'" type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                <button title="Borrar" onclick="location.href='../censoanimal/Propietarios/borrarpersona.php?id=<?php echo $_SESSION['id']; ?>'" type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                <!-- <button title="Generar reporte" onclick="location.href='../censoanimal/Reportes/Propietarios/reportePersPersona.php?id=<?php echo $_SESSION['id']; ?>&ci=<?php echo $_SESSION['ci']; ?>'" type="submit" class="btn btn-success"><i class="bi bi-file-earmark-pdf"></i></button> -->

                            </td>
                        </tr>
                        <?php
                        }else{
                            ?>
                            <td align="center"><?php echo $_SESSION['errmsg'] ?></td>
                            <?php
                            }
                            ?>
                            <?php
                        }else{
                            ?>
                            <td align="center"><?php echo $_SESSION['errmsg'] ?></td>
                            <?php
                            }
                            ?>
                           
                    </table>
                   
                </div>
                <br>
                <div class="container">
                    <h2>Animales</h2>
                    <table class="table table-striped">
                        <tr align="center">
                            <th>CI Dueño</th>
                            <th>Nombre</th>
                            <th>Especie</th>
                            <th>Sexo</th>
                            <th>Castrado</th>
                            <th>Requiere castración</th>
                            <th>Creado</th>
                            <th>Actualizado</th>
                            <th>Por</th>
                            <th>Acciones</th>
                        </tr>

                        <tr>
                            <?php 
                            if($consultaAnimal){
                             if (mysqli_num_rows($consultaAnimal) !== 0){
                            // if($consultaAnimal){
                            ?>
                            <td align="center"><?php echo $ciduenoA; ?></td>
                            <td align="center"><?php echo $nombreA; ?></td>
                            <td align="center"><?php echo $especieA; ?></td>
                            <td align="center"><?php echo $sexoA; ?></td>
                            <td align="center"><?php echo $castradoA; ?></td>
                            <td align="center"><?php echo $reqcastracionA; ?></td>
                            <td align="center"><?php echo $created_atA; ?></td>
                            <td align="center"><?php echo $updated_atA; ?></td>
                            <td align="center"><?php echo $sesionA; ?></td>
                            <td align="right">
                                <!-- <a href="editaranimal.php?id=<?php echo $id; ?>" class="edit" title="Editar">Editar</a>
                                            <a href="borraranimal.php?id=<?php echo $id; ?>" class="delete" title="Eliminar">Borrar</a> -->
                                <button title="Editar" onclick="location.href='../censoanimal/Propietarios/editarPersona.php?id=<?php echo $_SESSION['id']; ?>'" type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                <button title="Borrar" onclick="location.href='../censoanimal/Propietarios/borrarpersona.php?id=<?php echo $_SESSION['id']; ?>'" type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                <!-- <button title="Generar reporte" onclick="location.href='../censoanimal/Reportes/Propietarios/reportePersPersona.php?id=<?php echo $_SESSION['id']; ?>&ci=<?php echo $_SESSION['ci']; ?>'" type="submit" class="btn btn-success"><i class="bi bi-file-earmark-pdf"></i></button> -->
                            </td>
                            <?php
                            }else{
                            ?>
                            <td align="center"><?php echo $_SESSION['errmsg'] ?></td>
                            <?php
                            }
                            ?>
                             <?php
                            }else{
                            ?>
                            <td align="center"><?php echo $_SESSION['errmsg'] ?></td>
                            <?php
                            }
                            ?>

                           
                            

                            

                    </table>
                </div>
                <br>

                <div class="container">
                    <h2>Castraciones</h2>
                    <table class="table table-striped">
                        <tr>
                            <th>Fecha Castración</th>
                            <th>CI Dueño</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Nombre Mascota</th>
                            <th>ID Chip</th>
                            <th>Especie</th>
                            <th>Sexo</th>
                            <th>Creado</th>
                            <th>Actualizado</th>
                            <th>Por</th>
                            <th>Acciones</th>
                        </tr>
                        <?php
                        if($consultaCastracion){
                         if (mysqli_num_rows($consultaCastracion) !== 0){
                        //  if($consultaCastracion){
                        ?>
                        <tr>
                            <td align="center"><?php echo $fecastracionC; ?></td>
                            <td align="center"><?php echo $_SESSION['ciduenoC'] ?></td>
                            <td align="center"><?php echo $nombreC; ?></td>
                            <td align="center"><?php echo $apellidoC; ?></td>
                            <td align="center"><?php echo $nmascotaC; ?></td>
                            <td align="center"><?php echo $idchipC; ?></td>
                            <td align="center"><?php echo $especieC; ?></td>
                            <td align="center"><?php echo $sexoC; ?></td>
                            <td align="center"><?php echo $created_atC; ?></td>
                            <td align="center"><?php echo $updated_atC; ?></td>
                            <td align="center"><?php echo $sesionC; ?></td>
                            <td align="right">
                                <!-- <a href="editaranimal.php?id=<?php echo $id; ?>" class="edit" title="Editar">Editar</a>
                                        <a href="borraranimal.php?id=<?php echo $id; ?>" class="delete" title="Eliminar">Borrar</a> -->
                                <button title="Editar" onclick="location.href='../censoanimal/Propietarios/editarPersona.php?id=<?php echo $_SESSION['id']; ?>'" type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                                <button title="Borrar" onclick="location.href='../censoanimal/Propietarios/borrarpersona.php?id=<?php echo $_SESSION['id']; ?>'" type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                <!-- <button title="Generar reporte" onclick="location.href='../censoanimal/Reportes/Propietarios/reportePersPersona.php?id=<?php echo $_SESSION['id']; ?>&ci=<?php echo $_SESSION['ci']; ?>'" type="submit" class="btn btn-success"><i class="bi bi-file-earmark-pdf"></i></button> -->
                            </td>


                </div>
                <?php
                            }else{
                            ?>
                            <td align="center"><?php echo $_SESSION['errmsg'] ?></td>
                            <?php
                            }
                            ?>
                             <?php
                            }else{
                            ?>
                            <td align="center"><?php echo $_SESSION['errmsg'] ?></td>
                            <?php
                            }
                            ?>
                </table>
                <div class="d-grid gap-2">
                    <!-- <button title="Imprimir reporte" target="_blank" class="btn btn-primary btn-block mb-4" onclick="location.href='../censoAnimal/Reportes/Propietarios/reportePersPersona.php?id=<?php echo $_SESSION['id']; ?>&ci=<?php echo $_SESSION['ci']; ?>'">Imprimir</button> -->
                    <a class="btn btn-primary btn-block mb-4" href="./Reportes/Propietarios/reportePersPersona.php?id=<?php echo $_SESSION['id']; ?>&ci=<?php echo $_SESSION['ci']; ?>&ciduenoC=<?php echo $_SESSION['ciduenoC']; ?>" onclick="" target="blank_">Generar reporte</a>
                    <!-- <button type="submit" class="btn btn-primary btn-block mb-4">Enviar</button> -->
                </div>
            </div>
            </div>


    </body>

    </html>
    <?php



    ?>

<?php

} else {
    echo header("location: login.php");
}
?>