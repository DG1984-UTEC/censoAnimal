<?php

$id = !empty($_GET['id']) ? $_GET['id'] : 0;
$linea='';
if($id){
    include('database.php');
	$registro = "SELECT * FROM animal WHERE id = $id;";
	$resultado = mysqli_query($conexion,$registro);
	$linea = mysqli_fetch_array($resultado);
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
    <title>Actualizar animal</title>
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

    <form method="post" action="actualizaranimal.php">

        <div class="row" style="width: 900px;margin-left:300px;margin-right:300px;margin-top:3%">
            <div class="w3-sidebar w3-card" style="width:50%;height:50%">
                <div class="col-sm-4" style="margin-left:100px;margin-top:20px">
                    <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                    <label for="cidueño">CI Dueño:</label>
                    <input type="text" class="form-control" name="cidueno" value="<?php echo $linea['cidueno'];?>">
                    <label for="pwd">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $linea['nombre'];?>">
                    <br>
                    <label for="pwd">Sexo:</label>
                    <br>
                   
                    <label><input type="radio" class="optradio" name="sexo" value="Macho" <?php if($linea['sexo']=='Macho') print "checked=true"?> />Macho</label>
                    <label><input type="radio" class="optradio" name="sexo" value="Hembra" <?php if($linea['sexo']=='Hembra') print "checked=true"?> />Hembra</label>               
                </div>

                <div class="col-sm-4" style="margin-right:80px;margin-top:20px">
                    <label for="pwd">Castrado:</label>
                    <br>
                   

                    <label><input type="radio" class="optradio" name="castrado" value="Si" <?php if($linea['castrado']=='SI') print "checked=true"?> />Si</label>
                    <label><input type="radio" class="optradio" name="castrado" value="No" <?php if($linea['castrado']=='NO') print "checked=true"?> />No</label>   
                    
                    <br>
                    <br>
                    <br>
                    <label for="pwd">¿Requiere castración?</label>
                    <br>
                    <label><input type="radio" class="optradio" name="reqcastracion" value="SI" <?php if($linea['reqcastracion']=='SI') print "checked=true"?> />Si</label>
                    <label><input type="radio" class="optradio" name="reqcastracion" value="NO" <?php if($linea['reqcastracion']=='NO') print "checked=true"?> />No</label>   
                    
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