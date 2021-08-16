<?php
include_once ('database.php');
session_start();


if (isset($_SESSION['usuario'])){

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Obtener animales</title>
</head>

<body>
    <div class="w3-sidebar w3-card" style="width:12%;margin-top:1%">
        <h3 class="w3-bar-item">Menu</h3>
        <a href="formularioPersona.php" class="w3-bar-item w3-button">Ingresar Persona</a>
        <a href="formularioAnimal.php" class="w3-bar-item w3-button">Ingresar Animal</a>
        <a href="obtener.php" class="w3-bar-item w3-button">Listar Registros</a>
        <br>
        <a href="index.php" class="w3-bar-item w3-button">Volver</a>
        <br>

        <a href="Cerrar.php" class="w3-bar-item w3-button">Cerrar Sesión</a>
    </div>
    <div style="margin-left:1200px"><?php echo 'Bienvenido, ' . $_SESSION["usuario"];?></div>
    <div style="width:1050px;margin:auto;margin-top: 12px;">
        <table class="table table-striped" width='80%' style="text-align:center;">

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
            <p><a href="obtener.php">Lista de Personas</a></p>

            <form method="post" action="obtenerAnimales.php">
                <div class="row">
                <p>Buscar por Fecha:</p>
                    <div class="col-xs-6" style="width:35%">
                    <input type="date"  class="form-control" name="buscarxfecha1">
                    </div>
                    
                    <div class="col-xs-6" style="width:35%">
                    <input type="date"  class="form-control" name="buscarxfecha2">
                    </div>
                </div>
                <button type="submit" class="btn btn-default" name="buscarxfechaA">Buscar</button>
               
            </form>
            <?php 
    
    
    if (isset($_POST["buscarxfechaA"])){
        $fechaA = $_POST['buscarxfecha1'];
        $fechaB = $_POST['buscarxfecha2'];
       
       
        
        if($fechaA == $fechaB){    
       
            $busquedaFecha = $conexion->query("SELECT * FROM animal WHERE CREATED_AT = '$fechaA'"); // BETWEEN '$fechaA' AND '$fechaB'");
            while ($fila2 =mysqli_fetch_array($busquedaFecha)){
                
                $id=$fila ["id"];
                $cidueno=$fila["cidueno"];
                $nombre=$fila["nombre"];
                $especie=$fila["especie"];
                $sexo=$fila["sexo"];
                $castrado=$fila["castrado"];
                $reqcastracion=$fila["reqcastracion"];
                $created_at=$fila["CREATED_AT"];
                $updated_at=$fila["UPDATED_AT"];

                
                ?>

            <tr>
            <td><?php echo $cidueno;?></td>
                <td><?php echo $nombre;?></td>
                <td><?php echo $especie;?></td>
                <td><?php echo $sexo;?></td>
                <td><?php echo $castrado;?></td>
                <td><?php echo $reqcastracion;?></td>
                <td><?php echo $created_at;?></td>
                <td><?php echo $updated_at;?></td>

                <td>
                    <a href="update.php?id=<?php echo $id;?>" class="edit">Editar</a>
                    <a href="borrarpersona.php?id=<?php echo $id;?>" class="delete" title="Eliminar">Borrar</a>
                </td>
            </tr>

            <?php

            } 
        
        }else{

            $busquedaFechaT = $conexion->query("SELECT * FROM animal WHERE CREATED_AT BETWEEN '$fechaA' AND '$fechaB'");
            while ($fila =mysqli_fetch_array($busquedaFechaT)){
                
                        $id=$fila ["id"];
                        $cidueno=$fila["cidueno"];
                        $nombre=$fila["nombre"];
                        $especie=$fila["especie"];
                        $sexo=$fila["sexo"];
                        $castrado=$fila["castrado"];
                        $reqcastracion=$fila["reqcastracion"];
                        $created_at=$fila["CREATED_AT"];
                        $updated_at=$fila["UPDATED_AT"];

                ?>

            <tr>
            <td><?php echo $cidueno;?></td>
                <td><?php echo $nombre;?></td>
                <td><?php echo $especie;?></td>
                <td><?php echo $sexo;?></td>
                <td><?php echo $castrado;?></td>
                <td><?php echo $reqcastracion;?></td>
                <td><?php echo $created_at;?></td>
                <td><?php echo $updated_at;?></td>

                <td>
                    <a href="update.php?id=<?php echo $id;?>" class="edit">Editar</a>
                    <a href="borrarpersona.php?id=<?php echo $id;?>" class="delete" title="Eliminar">Borrar</a>
                </td>
            </tr>
            <?php
            }
        }
        
    }
?>








            <form method="post" action="obteneranimales.php">
                <input type="buscarci" style="width:33%" class="form-control" placeholder="Ingrese CI" name="buscarci">
                <button type="submit" class="btn btn-default">Buscar</button>
                <button type="submit" class="btn btn-default" name="listar">Listar</button>
            </form>

            <?php 
                
                if (isset($_POST["buscarci"])){

                    $buscarci = $_POST['buscarci'];
                    $consultaci = $conexion->query("SELECT * FROM animal WHERE cidueno = '$buscarci'");
                    while ($fila =mysqli_fetch_array($consultaci)){
                       
                        $id=$fila ["id"];
                        $cidueno=$fila["cidueno"];
                        $nombre=$fila["nombre"];
                        $especie=$fila["especie"];
                        $sexo=$fila["sexo"];
                        $castrado=$fila["castrado"];
                        $reqcastracion=$fila["reqcastracion"];
                        $created_at=$fila["CREATED_AT"];
                        $updated_at=$fila["UPDATED_AT"];

                        ?>
            <tr>

                <td><?php echo $cidueno;?></td>
                <td><?php echo $nombre;?></td>
                <td><?php echo $especie;?></td>
                <td><?php echo $sexo;?></td>
                <td><?php echo $castrado;?></td>
                <td><?php echo $reqcastracion;?></td>
                <td><?php echo $created_at;?></td>
                <td><?php echo $updated_at;?></td>

                <td>
                    <a href="editaranimal.php?id=<?php echo $id;?>" class="edit" title="Editar">Editar</a>
                    <a href="borraranimal.php?id=<?php echo $id;?>" class="delete" title="Eliminar">Borrar</a>
                </td>
                <?php  
                

            }
            
            
            }
            ?>
            <?php
//if (isset($_POST["listar"])){

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $no_of_records_per_page = 10;
    $offset = ($pageno-1) * $no_of_records_per_page;

    $result = $conexion->query("SELECT COUNT(*) FROM animal"); 
                        
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);


    $consulta = $conexion->query("SELECT * FROM animal LIMIT $offset, $no_of_records_per_page");
    while ($fila = mysqli_fetch_array($consulta)){
  

$id=$fila ["id"];
$cidueno=$fila["cidueno"];
$nombre=$fila["nombre"];
$especie=$fila["especie"];
$sexo=$fila["sexo"];
$castrado=$fila["castrado"];
$reqcastracion=$fila["reqcastracion"];
$created_at =$fila["CREATED_AT"];
$updated_at =$fila["UPDATED_AT"];

?>
<tr>
    <td><?php echo $cidueno;?></td>
    <td><?php echo $nombre;?></td>
    <td><?php echo $especie;?></td>
    <td><?php echo $sexo;?></td>
    <td><?php echo $castrado;?></td>
    <td><?php echo $reqcastracion;?></td>
    <td><?php echo $created_at;?></td>
    <td><?php echo $updated_at;?></td>

    <td>
        <a href="editaranimal.php?id=<?php echo $id;?>" class="edit" title="Editar">Editar</a>
        <a href="borraranimal.php?id=<?php echo $id;?>" class="delete" title="Eliminar">Borrar</a>
    </td>
</tr>



<?php  
                

}
?>
<br>
 <ul class="pagination justify-content-center">
                <li class="page-item"><a class="page-link" href="?pageno=1">Primero</a></li>
                <li class="page-item" <?php if($pageno <= 1){ echo 'disabled'; } ?>>
                    <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Anterior</a>
                </li>
                <li class="page-item" <?php if($pageno >= $total_pages){ echo 'disabled'; } ?>>
                    <a class="page-link"
                        href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Siguiente</a>
                </li>
                <li><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Ultimo</a></li>
            </ul>

<?php

//}
}else{
    echo header("location: login.php");
    
}
?>

    </div>
    
</body>

</html>



