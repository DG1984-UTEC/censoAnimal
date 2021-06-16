<?php
include_once ('database.php');

if (isset($_GET['id'])){
    $id = intval($_GET['id']);

    $consulta = $conexion->query("SELECT * FROM persona WHERE id='$id'");

    while ($fila = mysqli_fetch_array($consulta)){

    $id=$fila["id"];
    $ci=$fila["ci"];
    $nombre=$fila["nombre"];
    $apellido=$fila["apellido"];
    $telefono=$fila["telefono"];
    $direccion=$fila["direccion"];
    $cantanimales=$fila["cantanimales"];
    $created_at=$fila["CREATED_AT"];
    $updated_at=$fila["UPDATED_AT"];

    if ($consulta){
        echo "devuelto";
    }else{
        echo "nel prro";
    }
    ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <title>Ingresar Persona</title>
</head>

<body>
    <div class="w3-sidebar w3-card" style="width:12%;margin-top:-2.1%">
        <h3> Menu</h3>
        <a href="formularioPersona.php" class="w3-bar-item w3-button">Ingresar Persona</a>
        <a href="formularioAnimal.php" class="w3-bar-item w3-button">Ingresar Animal</a>
        <a href="obtener.php" class="w3-bar-item w3-button">Listar Registros</a>
        <br>
        <a href="index.php" class="w3-bar-item w3-button">Volver</a>
        <br>
       
        <a href="login.php" class="w3-bar-item w3-button">Salir</a>
    </div>

    <form method="post" action="editarPersona.php">

        <div class="row" style="width: 900px;margin-left:300px;margin-right:300px;margin-top:3%">
            <div class="w3-sidebar w3-card" style="width:50%;height:50%">
                <div class="col-sm-4" style="margin-left:100px;margin-top:20px">
                    <label for="email">CI:</label>
                    <input type="text" class="form-control" value="<?php echo $ci?>">
                    <label for="pwd">Nombre:</label>
                    <input type="text" class="form-control" value="<?php echo $nombre?>">
                    <label for="pwd">Apellido:</label>
                    <input type="text" class="form-control" value="<?php echo $apellido?>">
                    
                </div>

                <div class="col-sm-4" style="margin-right:80px;margin-top:20px">
                    <label for="pwd">Telefono:</label>
                    <input type="text" class="form-control" value="<?php echo $telefono?>">
                    <label for="pwd">Dirección:</label>
                    <input type="text" class="form-control" value="<?php echo $direccion?>">
                    <label for="pwd">Cantidad Animales:</label>
                    <input type="text" class="form-control" value="<?php echo $cantanimales?>">
                    <br>
                    <button type="submit" class="btn btn-default">Actualizar</button>
                </div>

            </div>
        </div>



    </form>
</body>

</html>








<?php

if (isset($_POST["Actualizar"])){
    

    
     $ci1 = $_POST[$ci];
     $nombre1 = $_POST[$nombre];
     $apellido1 = $_POST[$apellido];
     $telefono1 = $_POST[$telefono];
     $direccion1 = $_POST[$direccion];
     $cantanimales1 = $_POST[$cantanimales];




     $actualizacion = $conexion->query("UPDATE persona (ci, nombre, apellido, telefono, direccion, cantanimales) SET ('$ci1','$nombre1','$apellido1','$telefono1','$direccion1','$cantanimales1')");

  

     if ($actualizacion){
          echo "<p>Registro actualizado.</p>";
          echo "<a href=formulariopersona.php>Volver</a>";
          } else {
          echo "<p>No se actualizó...</p>";
          }
        }


?>
<?php


}


}
?>