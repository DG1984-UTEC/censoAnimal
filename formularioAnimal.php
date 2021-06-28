<?php
session_start();

// Detects if there is someone logged in.

//if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == true){
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
    <title>Ingresar animal</title>
        <script>
            function valueChanged() {
            if (document.getElementById("siCas").checked == true) {
                document.getElementById("neCas").disabled = true;
                
            } else {
                document.getElementById("noCas").checked == true;
                document.getElementById("neCas").disabled = false;
            }
            console.log(document.getElementById("siCas").value);
            console.log(document.getElementById("neCas").value)
        }
        </script>
</head>

<body>
    <div class="w3-sidebar w3-card" style="width:12%;margin-top:1%">
        <h3> Menu</h3>
        <a href="formularioPersona.php" class="w3-bar-item w3-button">Ingresar Persona</a>
        <a href="formularioAnimal.php" class="w3-bar-item w3-button">Ingresar Animal</a>
        <a href="obtener.php" class="w3-bar-item w3-button">Listar Registros</a>
        <br>
        <a href="index.php" class="w3-bar-item w3-button">Volver</a>
        <br>
        
        <a href="Cerrar.php" class="w3-bar-item w3-button">Cerrar Sesión</a>
    </div>

    <form method="post" action="agregarAnimal.php">
    <div style="margin-left:1200px"><?php echo 'Bienvenido, ' . $_SESSION["usuario"];?></div>
        <div class="row" style="width: 900px;margin-left:300px;margin-right:300px;margin-top:3%">
            <div class="w3-sidebar w3-card" style="width:50%;height:50%">
                <div class="col-sm-4" style="margin-left:100px;margin-top:20px">
                    <label for="email">CI Dueño:</label>
                    <input type="text" class="form-control" name="cidueno" required = "true">
                    <label for="pwd">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" required = "true">
                    <br>
                    <label for="especie">Especie:</label>
                    <br>
                    <label><input type="radio" class="optradio" name="especie" value="Perro" required = "true"> Perro </label>
                    <label><input type="radio" class="optradio" name="especie" value="Gato" required = "true"> Gato</label>
                    <br>
                    <br>
                    <label for="sexo">Sexo:</label>
                    <br>
                    <label><input type="radio" class="optradio" name="sexo" value="Macho" required = "true"> Macho </label>
                    <label><input type="radio" class="optradio" name="sexo" value="Hembra" required = "true"> Hembra</label>
                    
                </div>

                <div class="col-sm-4" style="margin-right:80px;margin-top:20px">
                <label for="pwd">Castrado:</label>
                    <br>
                    <label><input type="radio" class="optradio" name="castrado" id="siCas" value="SI" onClick="valueChanged()" required = "true"> Si </label>
                    <label><input type="radio" class="optradio" name="castrado" id="noCas" value="NO" onClick="valueChanged()" required = "true"> No</label>
                    <br>
                    <br>
                    <br>
                    
                    <label for="pwd">¿Requiere castración?</label>
                    <br>
                    <label><input type="radio" class="optradio" name="reqcastracion" id="neCas" value="SI" required = "true"> Si </label>
                    <label><input type="radio" class="optradio" name="reqcastracion" value="NO" required = "true"> No</label>
                    <br>
                    <br>
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
<?php
}else{
    echo header("location: login.php");
    
}
?>