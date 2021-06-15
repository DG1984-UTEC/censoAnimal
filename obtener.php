<?php

$databaseHost = 'localhost';
$databaseName = 'censo';
$databaseUsername = 'root';
$databasePassword = '';

$conexion = new mysqli();
$conexion->connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

/*
    if(!$conexion){
        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
    }
    else
    {
        echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
    }
*/

    
    //$consulta= "SELECT * FROM users";

    $consulta = $conexion->query("SELECT * FROM persona");
    

    //$fila = mysql_fetch_array ($consulta);

    //$fila = $conexion->fetch_array(MYSQLI_ASSOC);

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
    <div class="w3-sidebar w3-card" style="width:12%">
        <h3 class="w3-bar-item">Menu</h3>
        <a href="formularioPersona.php" class="w3-bar-item w3-button">Ingresar Persona</a>
        <a href="formularioAnimal.php" class="w3-bar-item w3-button">Ingresar Animal</a>
        <a href="obtener.php" class="w3-bar-item w3-button">Listar Registros</a>
        <br>
        <a href="index.php" class="w3-bar-item w3-button">Volver</a>
        <br>

        <a href="login.php" class="w3-bar-item w3-button">Salir</a>
    </div>
    <div style="width:820px;margin:auto;margin-top: 12px;">
        <table class="table table-striped" width='80%' style="text-align:center;">

            <tr>
                <th>CI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Cantidad Animales</th>
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
                        $id = $fila1 ["id"];
                        echo "<tr>";
                        echo "<td>".$fila1 ["ci"]."</td>";
                        echo "<td>".$fila1 ["nombre"]."</td>";
                        echo "<td>".$fila1 ["apellido"]."</td>";
                        echo "<td>".$fila1 ["telefono"]."</td>";
                        echo "<td>".$fila1 ["direccion"]."</td>";
                        echo "<td>".$fila1 ["cantanimales"]."</td>";
                        echo "<td>".'<a href="editar.php">Editar </a>','<a href="borrarpersona.php?id=<?php echo $id;?>">
            Borrar</a>'."</td>";
            echo "</tr>";

            }
            }





            ?>
    </div>
</body>

</html>



<?php

if (isset($_POST["listar"])){
    while ($fila = mysqli_fetch_array($consulta)){
/*
      
        echo "<tr>";
        
        echo "<td>".$fila ["ci"]."</td>";
        echo "<td>".$fila ["nombre"]."</td>";
        echo "<td>".$fila ["apellido"]."</td>";
        echo "<td>".$fila ["telefono"]."</td>";
        echo "<td>".$fila ["direccion"]."</td>";
        echo "<td>".$fila ["cantanimales"]."</td>";
        echo "<td>".'<a href="editar.php">Editar </a>','<a href="borrarpersona.php?id=<?php echo $id;?>" name="borrar">
Borrar</a>'."</td>";
// echo "<td>".'<a href="$link_borrar">Borrar</a>'."</td>";
echo "</tr>";

}

} */

//while ($fila=mysqli_fetch_object($consulta)){
$id=$fila ["id"];
$ci=$fila["ci"];
$nombre=$fila["nombre"];
$apellido=$fila["apellido"];
$telefono=$fila["telefono"];
$direccion=$fila["direccion"];
$cantanimales=$fila["cantanimales"];
?>
<tr>
    <td><?php echo $ci;?></td>
    <td><?php echo $nombre;?></td>
    <td><?php echo $apellido;?></td>
    <td><?php echo $telefono;?></td>
    <td><?php echo $direccion;?></td>
    <td><?php echo $cantanimales;?></td>
    <td>
        <a href="update.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip"><i
                class="material-icons">&#xE254;</i></a>
        <a href="borrarpersona.php?id=<?php echo $id;?>" class="delete" title="Eliminar">Borrar</a>
    </td>
</tr>



<?php  
                

}


}
?>