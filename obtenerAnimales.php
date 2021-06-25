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
    <div style="width:980px;margin:auto;margin-top: 12px;">
        <table class="table table-striped" width='80%' border=0>

            <tr bgcolor='#CCCCCC'>
                <th>CI Dueño</th>
                <th>Nombre</th>
                <th>Sexo</th>
                <th>Castrado</th>
                <th>Requiere castración</th>
                <th>Creado</th>
                <th>Actualizado</th>
                <th>Acciones</th>

            </tr>
            <p><a href="obtener.php">Lista de Personas</a></p>
            <form method="post" action="obteneranimales.php">
                <input type="buscarci" class="form-control" placeholder="Ingrese CI" name="buscarci">
                <button type="submit" class="btn btn-default">Buscar</button>
                <button type="submit" class="btn btn-default" name="listar">Listar</button>
            </form>

            <?php 
                
                if (isset($_POST["buscarci"])){

                    $buscarci = $_POST['buscarci'];
                    $consultaci = $conexion->query("SELECT * FROM animal WHERE cidueno = '$buscarci'");
                    while ($fila1 =mysqli_fetch_array($consultaci)){
                       
                        $id=$fila1 ["id"];
                        $cidueno=$fila1["cidueno"];
                        $nombre=$fila1["nombre"];
                        $sexo=$fila1["sexo"];
                        $castrado=$fila1["castrado"];
                        $reqcastracion=$fila1["reqcastracion"];
                        $created_at=$fila1["CREATED_AT"];
                        $updated_at=$fila1["UPDATED_AT"];

                        ?>
            <tr>

                <td><?php echo $cidueno;?></td>
                <td><?php echo $nombre;?></td>
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
    </div>
</body>

</html>



<?php
if (isset($_POST["listar"])){
    $consulta = $conexion->query("SELECT * FROM animal");
    while ($fila = mysqli_fetch_array($consulta)){
  

$id=$fila ["id"];
$cidueno=$fila["cidueno"];
$nombre=$fila["nombre"];
$sexo=$fila["sexo"];
$castrado=$fila["castrado"];
$reqcastracion=$fila["reqcastracion"];
$created_at =$fila["CREATED_AT"];
$updated_at =$fila["UPDATED_AT"];

?>
<tr>
    <td><?php echo $cidueno;?></td>
    <td><?php echo $nombre;?></td>
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


}
}else{
    echo header("location: login.php");
    
}
?>