<?php
include_once ('database.php');
session_start();


if (isset($_SESSION['usuario'])){

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/w3.css">
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.6.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.js"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->

    <!-- <link rel="stylesheet" href="css/bootstrap.min(old).css"> -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-utilities.css">

    <title>Obtener Personas</title>
</head>

<body>
    <!-- NavBar -->
    <div class="dropdown">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Censo Animal</a>
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
                                <li><a class="dropdown-item" href="formularioPersona.php">Nuevo Propietario</a></li>
                                <li><a class="dropdown-item" href="obtener.php">Listar propietarios</a></li>
                                <li><a class="dropdown-item" href="obtener.php">Buscar propietarios</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Animales
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="formularioAnimal.php">Nuevo Animal</a></li>
                                <li><a class="dropdown-item" href="obtenerAnimales.php">Listar Animales</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
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
        <!-- <div class="w3-sidebar w3-card" style="width:12%;margin-top:1%">
        <h3 class="w3-bar-item">Menu</h3>
        <a href="formularioPersona.php" class="w3-bar-item w3-button">Ingresar Persona</a>
        <a href="formularioAnimal.php" class="w3-bar-item w3-button">Ingresar Animal</a>
        <a href="obtener.php" class="w3-bar-item w3-button">Listar Registros</a>
        <br>
        <a href="index.php" class="w3-bar-item w3-button">Volver</a>
        <br>

        <a href="Cerrar.php" class="w3-bar-item w3-button">Cerrar Sesión</a>
    </div>
    <div style="margin-left:1200px"><?php echo 'Bienvenido, ' . $_SESSION["usuario"];?></div> -->

        <div style="width:1050px;margin:auto;margin-top: 12px;">
            <table class="table table-striped" width='80%' style="text-align:center;">

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

                <!-- <form method="post" action="obtener.php">
                
            <div class="row">
                <p>Buscar por Fecha:</p>
                    <div class="col-xs-6" style="width:35%">
                    <input type="date"  class="form-control" name="buscarxfecha1">
                    </div>
                    
                    <div class="col-xs-6" style="width:35%">
                    <input type="date"  class="form-control" name="buscarxfecha2">
                    </div>
                </div>
                <button type="submit" class="btn btn-default" name="buscarxfechaP">Buscar</button>
               
            </form> -->


                <?php 
    
    
    // if (isset($_POST["buscarxfechaP"])){
    //     $fechaA = $_POST['buscarxfecha1'];
    //     $fechaB = $_POST['buscarxfecha2'];
       
       
        
        // if($fechaA == $fechaB){    
       
        //     $busquedaFecha = $conexion->query("SELECT * FROM persona WHERE CREATED_AT = '$fechaA'"); // BETWEEN '$fechaA' AND '$fechaB'");
        //     while ($fila2 =mysqli_fetch_array($busquedaFecha)){
                
        //         $id=$fila2 ["id"];
        //         $ci=$fila2["ci"];
        //         $nombre=$fila2["nombre"];
        //         $apellido=$fila2["apellido"];
        //         $telefono=$fila2["telefono"];
        //         $direccion=$fila2["direccion"];
        //         $cantanimales=$fila2["cantanimales"];
        //         $created_at=$fila2["CREATED_AT"];
        //         $updated_at=$fila2["UPDATED_AT"];
        //         $sesion=$fila2['sesion']; 

                
                ?>

                <!-- <tr>
                    <td><?php echo $ci;?></td>
                    <td><?php echo $nombre;?></td>
                    <td><?php echo $apellido;?></td>
                    <td><?php echo $telefono;?></td>
                    <td><?php echo $direccion;?></td>
                    <td><?php echo $cantanimales;?></td>
                    <td><?php echo $created_at;?></td>
                    <td><?php echo $updated_at;?></td>
                    <td><?php echo $sesion;?></td>

                    <td>
                        <a href="update.php?id=<?php echo $id;?>" class="edit">Editar</a>
                        <a href="borrarpersona.php?id=<?php echo $id;?>" class="delete" title="Eliminar">Borrar</a>
                    </td>
                </tr> -->

                <?php

        //     } 
        
        // }else{

        //     $busquedaFechaT = $conexion->query("SELECT * FROM persona WHERE CREATED_AT BETWEEN '$fechaA' AND '$fechaB'");
        //     while ($fila2 =mysqli_fetch_array($busquedaFechaT)){
                
        //         $id=$fila2 ["id"];
        //         $ci=$fila2["ci"];
        //         $nombre=$fila2["nombre"];
        //         $apellido=$fila2["apellido"];
        //         $telefono=$fila2["telefono"];
        //         $direccion=$fila2["direccion"];
        //         $cantanimales=$fila2["cantanimales"];
        //         $created_at=$fila2["CREATED_AT"];
        //         $updated_at=$fila2["UPDATED_AT"];
        //         $sesion=$fila2['sesion']; 

                ?>

                <!-- <tr>
                    <td><?php echo $ci;?></td>
                    <td><?php echo $nombre;?></td>
                    <td><?php echo $apellido;?></td>
                    <td><?php echo $telefono;?></td>
                    <td><?php echo $direccion;?></td>
                    <td><?php echo $cantanimales;?></td>
                    <td><?php echo $created_at;?></td>
                    <td><?php echo $updated_at;?></td>
                    <td><?php echo $sesion;?></td>

                    <td>
                        <a href="update.php?id=<?php echo $id;?>" class="edit">Editar</a>
                        <a href="borrarpersona.php?id=<?php echo $id;?>" class="delete" title="Eliminar">Borrar</a>
                    </td>
                </tr> -->
                <?php
    //         }
    //     }
        
    // }
?>

                <form method="post" action="obtener.php">
                    <input type="buscarci" style="width:33%" class="form-control" placeholder="Ingrese CI"
                        name="buscarci">
                    <button type="submit" class="btn btn-default">Buscar</button>
                    <button type="submit" class="btn btn-default" name="listar">Listar</button>
                </form>
                <?php 
                
                if (isset($_POST["buscarci"])){

                        $ci="";
                        $nombre="";
                        $apellido="";
                        $telefono="";
                        $direccion="";
                        $cantanimales="";
                        $created_at="";
                        $updated_at="";
                        $sesion="";
                        ?>
                    <tr>
                        <td><?php echo $ci;?></td>
                        <td><?php echo $nombre;?></td>
                        <td><?php echo $apellido;?></td>
                        <td><?php echo $telefono;?></td>
                        <td><?php echo $direccion;?></td>
                        <td><?php echo $cantanimales;?></td>
                        <td><?php echo $created_at;?></td>
                        <td><?php echo $updated_at;?></td>
                        <td><?php echo $sesion;?></td>

                        <td>
                
                <?php
                //Configuración buscar por ci y devolución de mesg en caso de retorno de query null
                    $buscarci = $_POST['buscarci'];
                    $consultaci = $conexion->query("SELECT * FROM persona WHERE ci = '$buscarci'");
                    // while     
                   if ($fila1 =mysqli_fetch_array($consultaci)){
                    // {

                        $id=$fila1 ["id"];
                        $ci=$fila1["ci"];
                        $nombre=$fila1["nombre"];
                        $apellido=$fila1["apellido"];
                        $telefono=$fila1["telefono"];
                        $direccion=$fila1["direccion"];
                        $cantanimales=$fila1["cantanimales"];
                        $created_at=$fila1["CREATED_AT"];
                        $updated_at=$fila1["UPDATED_AT"];
                        $sesion=$fila1['sesion'];
                        ?>
                <tr>
                    <td><?php echo $ci;?></td>
                    <td><?php echo $nombre;?></td>
                    <td><?php echo $apellido;?></td>
                    <td><?php echo $telefono;?></td>
                    <td><?php echo $direccion;?></td>
                    <td><?php echo $cantanimales;?></td>
                    <td><?php echo $created_at;?></td>
                    <td><?php echo $updated_at;?></td>
                    <td><?php echo $sesion;?></td>

                    <td>
                        <a href="update.php?id=<?php echo $id;?>" class="edit">Editar</a>
                        <a href="borrarpersona.php?id=<?php echo $id;?>" class="delete" title="Eliminar">Borrar</a>
                    </td>
                </tr>
                <?php  
            }else{
                echo "No existen registros";
            }

        }else{

                if (isset($_GET['pageno'])) {
                    $pageno = $_GET['pageno'];
                } else {
                    $pageno = 1;
                }
                $no_of_records_per_page = 10;
                $offset = ($pageno-1) * $no_of_records_per_page;
        
                $result = $conexion->query("SELECT COUNT(*) FROM persona"); 
                                    
                            $total_rows = mysqli_fetch_array($result)[0];
                            $total_pages = ceil($total_rows / $no_of_records_per_page);
                            
            $consulta = $conexion->query("SELECT * FROM persona LIMIT $offset, $no_of_records_per_page");
            while ($fila = mysqli_fetch_array($consulta)){
                    $id=$fila ["id"];
                    $ci=$fila["ci"];
                    $nombre=$fila["nombre"];
                    $apellido=$fila["apellido"];
                    $telefono=$fila["telefono"];
                    $direccion=$fila["direccion"];
                    $cantanimales=$fila["cantanimales"];
                    $created_at=$fila["CREATED_AT"];
                    $updated_at=$fila["UPDATED_AT"];
                    $sesion=$fila['sesion'];
                    ?>
                    <tr>
                        <td><?php echo $ci;?></td>
                        <td><?php echo $nombre;?></td>
                        <td><?php echo $apellido;?></td>
                        <td><?php echo $telefono;?></td>
                        <td><?php echo $direccion;?></td>
                        <td><?php echo $cantanimales;?></td>
                        <td><?php echo $created_at;?></td>
                        <td><?php echo $updated_at;?></td>
                        <td><?php echo $sesion;?></td>
                        <td>
                            <a href="editarpersona.php?id=<?php echo $id;?>" class="edit">Editar</a>
                            <a href="borrarpersona.php?id=<?php echo $id;?>" class="delete" title="Eliminar">Borrar</a>
                        </td>
                    </tr>
        <?php  
            }
        
        ?>
        <br>
        <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="?pageno=1">Primero</a></li>
            <li class="page-item" <?php if($pageno <= 1){ echo 'disabled'; } ?>>
                <a class="page-link"
                    href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Anterior</a>
            </li>
            <li class="page-item" <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>>
                <a class="page-link"
                    href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Siguiente</a>
            </li>
            <li><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Ultimo</a></li>
        </ul>
         <?php
                
            }
     
        }
            ?>
        </div>
</body>

</html>



<?php

    if (isset($_POST["listar"])){
        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $result = $conexion->query("SELECT COUNT(*) FROM persona"); 
                            
                    $total_rows = mysqli_fetch_array($result)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);
                    
    $consulta = $conexion->query("SELECT * FROM persona LIMIT $offset, $no_of_records_per_page");
    while ($fila = mysqli_fetch_array($consulta)){
            $id=$fila ["id"];
            $ci=$fila["ci"];
            $nombre=$fila["nombre"];
            $apellido=$fila["apellido"];
            $telefono=$fila["telefono"];
            $direccion=$fila["direccion"];
            $cantanimales=$fila["cantanimales"];
            $created_at=$fila["CREATED_AT"];
            $updated_at=$fila["UPDATED_AT"];
            $sesion=$fila['sesion'];
            ?>
            <tr>
                <td><?php echo $ci;?></td>
                <td><?php echo $nombre;?></td>
                <td><?php echo $apellido;?></td>
                <td><?php echo $telefono;?></td>
                <td><?php echo $direccion;?></td>
                <td><?php echo $cantanimales;?></td>
                <td><?php echo $created_at;?></td>
                <td><?php echo $updated_at;?></td>
                <td><?php echo $sesion;?></td>
                <td>
                    <a href="editarpersona.php?id=<?php echo $id;?>" class="edit">Editar</a>
                    <a href="borrarpersona.php?id=<?php echo $id;?>" class="delete" title="Eliminar">Borrar</a>
                </td>
            </tr>



<?php  
    // }
?>
<br>
<ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="?pageno=1">Primero</a></li>
    <li class="page-item" <?php if($pageno <= 1){ echo 'disabled'; } ?>>
        <a class="page-link"
            href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Anterior</a>
    </li>
    <li class="page-item" <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>>
        <a class="page-link"
            href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Siguiente</a>
    </li>
    <li><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Ultimo</a></li>
</ul>



<?php

}
}else{
    echo header("location: login.php");
    
}
?>