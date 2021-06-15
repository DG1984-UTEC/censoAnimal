<?php
include_once ('database.php');
/*
$databaseHost = 'localhost';
$databaseName = 'censo';
$databaseUsername = 'root';
$databasePassword = '';

$conexion = new mysqli();
$conexion->connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);


    if(!$conexion){
        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
    }
    else
    {
        echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
    }*/

//include ("database.php");
//$db= new Database();

//valido haber recibido los campos desde el html y que no esten vacios
if(isset($_POST['editar'])){

    $id = $_GET['id'];

    $res = $conexion->query("SELECT * FROM animal WHERE id='$id'");
    
}else{
    echo"actualice el formulario";
}
while($fila = mysqli_fetch_array($res))
    {
        $id = $fila ["id"];
        $cidueno = $fila ["cidueno"];
        $nombre = $fila ["nombre"];
        $sexo = $fila ["sexo"];
        $castrado = $fila ["castrado"];
        $reqcastracion = $fila ["reqcastracion"];
    }
    echo "<td>".$cidueno."</td>";
    echo "<td>".$nombre."</td>";
    echo "<td>".$sexo."</td>";
    echo "<td>".$castrado."</td>";
    echo "<td>".$reqcastracion."</td>";

    if(isset($_POST['actualizar']))
    {
        $actualizacion = $conexion->query("UPDATE animal SET cidueno='$cidueno',nombre='$nombre',sexo='$sexo',castrado='$castrado',reqcastracion='$reqcastracion' WHERE id=$id");
        $result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");
   
   
        if ($$actualizacion){
             echo "<p>Registro actualizado.</p>";
             echo "<a href=index.php>Volver</a>";
             } else {
             echo "<p>No se actualizó...</p>";
             }
   

    }
 ?>

<--
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Ingresar animal</title>
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

    <form method="post" action="editaranimal.php">

        <div class="row" style="width: 900px;margin-left:300px;margin-right:300px;margin-top:3%">
            <div class="w3-sidebar w3-card" style="width:50%;height:50%">
                <div class="col-sm-4" style="margin-left:100px;margin-top:20px">
                    <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                    <label for="email">CI Dueño:</label>
                    <input type="text" class="form-control" name="cidueno" value="<?php echo $cidueno;?>">
                    <label for="pwd">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre;?>">
                    <br>
                    <label for="pwd">Sexo:</label>
                    <br>
                    <label><input type="radio" class="optradio" name="sexo" value="<?php echo $sexo;?>"> Macho </label>
                    <label><input type="radio" class="optradio" name="sexo" value="<?php echo $sexo;?>"> Hembra</label>

                </div>

                <div class="col-sm-4" style="margin-right:80px;margin-top:20px">
                    <label for="pwd">Castrado:</label>
                    <br>
                    <label><input type="radio" class="optradio" name="castrado" value="<?php echo $castrado;?>"> Si
                    </label>
                    <label><input type="radio" class="optradio" name="castrado" value="<?php echo $castrado;?>">
                        No</label>
                    <br>
                    <br>
                    <br>
                    <label for="pwd">¿Requiere castración?</label>
                    <br>
                    <label><input type="radio" class="optradio" name="reqcastracion"
                            value="<?php echo $reqcastracion;?>"> Si </label>
                    <label><input type="radio" class="optradio" name="reqcastracion"
                            value="<?php echo $reqcastracion;?>"> No</label>
                    <br>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-default">Enviar</button>
                </div>

            </div>
        </div>



    </form>
</body>

</html>