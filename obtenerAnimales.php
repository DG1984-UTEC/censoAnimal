<?php

$databaseHost = 'localhost';
$databaseName = 'censo';
$databaseUsername = 'root';
$databasePassword = '';

$conexion = new mysqli();
$conexion->connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);


    $consulta = $conexion->query("SELECT * FROM animal");

   
?>
<!DOCTYPE html>
<html lang="es">

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
        <table class="table table-striped" width='80%' border=0>

            <tr bgcolor='#CCCCCC'>
                <th>CI Dueño</th>
                <th>Nombre</th>
                <th>Sexo</th>
                <th>Castrado</th>
                <th>Requiere castración</th>
                <th>Acciones</th>

            </tr>
            <p><a href="obtener.php">Lista de Personas</a></p>
            <form method="post" action="obteneranimales.php">
            <input type="buscarci" class="form-control" placeholder ="Ingrese CI" name="buscarci">
            <button type="submit" class="btn btn-default">Buscar</button>
            <button type="submit" class="btn btn-default" name="listar">Listar</button>
            </form>

            <?php 
                
                if (isset($_POST["buscarci"])){

                    $buscarci = $_POST['buscarci'];
                    $consultaci = $conexion->query("SELECT * FROM animal WHERE cidueno = '$buscarci'");
                    while ($fila1 =mysqli_fetch_array($consultaci)){
                        echo "<tr>";
                        echo "<td>".$fila1 ["cidueno"]."</td>";
                        echo "<td>".$fila1 ["nombre"]."</td>";
                        echo "<td>".$fila1 ["sexo"]."</td>";
                        echo "<td>".$fila1 ["castrado"]."</td>";
                        echo "<td>".$fila1 ["reqcastracion"]."</td>";
                        echo "<td>"."Acciones"."</td>";
                        echo "</tr>";

                       
                    
                    }
                }    
             
            
           
            
           
?>
<a href="editarAnimal.php?id=$fila['id']" name="editar">Editar </a>','<a href="borrar.php"> Borrar</a>"
    </div>
</body>

</html>



<?php
if (isset($_POST["listar"])){
    while ($fila = mysqli_fetch_array($consulta)){
     

echo "<tr>";

    echo "<td>".$fila ["cidueno"]."</td>";
    echo "<td>".$fila ["nombre"]."</td>";
    echo "<td>".$fila ["sexo"]."</td>";
    echo "<td>".$fila ["castrado"]."</td>";
    echo "<td>".$fila ["reqcastracion"]."</td>";
    echo "<td>".'<a href="editarAnimal.php?id=$fila[id]" name="editar">Editar </a>','<a href="borrar.php"> Borrar</a>'."</td>";
    echo "<td>".'<a href="editaranimal.php?id=<?php echo $id ?>">Edit</a>'."</td>";

    }
}
?>