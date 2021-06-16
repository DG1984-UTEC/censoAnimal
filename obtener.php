<?php
include_once ('database.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div class="w3-sidebar w3-card" style="width:12%;margin-top:0.01%">
        <h3 class="w3-bar-item">Menu</h3>
        <a href="formularioPersona.php" class="w3-bar-item w3-button">Ingresar Persona</a>
        <a href="formularioAnimal.php" class="w3-bar-item w3-button">Ingresar Animal</a>
        <a href="obtener.php" class="w3-bar-item w3-button">Listar Registros</a>
        <br>
        <a href="index.php" class="w3-bar-item w3-button">Volver</a>
        <br>

        <a href="login.php" class="w3-bar-item w3-button">Salir</a>
    </div>
    <div style="width:980px;margin:auto;margin-top: 12px;">
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
                <th>Acciones</th>
            </tr>
            <p><a href="obtenerAnimales.php">Lista de Animales</a></p>
            <form method="post" action="obtener.php">
                <input type="buscarci" class="form-control" placeholder="Ingrese CI" name="buscarci">
                <button type="submit" class="btn btn-default">Buscar</button>
                <button type="submit" class="btn btn-default" name="listar">Listar</button>
            </form>
            <?php 
                
                if (isset($_POST["buscarci"])){

                    $buscarci = $_POST['buscarci'];
                    $consultaci = $conexion->query("SELECT * FROM persona WHERE ci = '$buscarci'");
                    while ($fila1 =mysqli_fetch_array($consultaci)){

                        $id=$fila1 ["id"];
                        $ci=$fila1["ci"];
                        $nombre=$fila1["nombre"];
                        $apellido=$fila1["apellido"];
                        $telefono=$fila1["telefono"];
                        $direccion=$fila1["direccion"];
                        $cantanimales=$fila1["cantanimales"];
                        $created_at=$fila1["CREATED_AT"];
                        $updated_at=$fila1["UPDATED_AT"];
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
                <td>
                    <a href="update.php?id=<?php echo $id;?>" class="edit">Editar</a>
                    <a href="borrarpersona.php?id=<?php echo $id;?>" class="delete" title="Eliminar">Borrar</a>
                </td>
            </tr>
            <?php  
           

            }
     
            }
            ?>
    </div>
</body>

</html>



<?php

if (isset($_POST["listar"])){
    $consulta = $conexion->query("SELECT * FROM persona");
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
    <td>
        <a href="editarpersona.php?id=<?php echo $id;?>" class="edit">Editar</a>
        <a href="borrarpersona.php?id=<?php echo $id;?>" class="delete" title="Eliminar">Borrar</a>
    </td>
</tr>



<?php  
                

}


}
?>