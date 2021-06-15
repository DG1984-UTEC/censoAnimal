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
        <a href="formulario.php" class="w3-bar-item w3-button">Ingresar Persona</a>
        <a href="agregarAnimal.php" class="w3-bar-item w3-button">Ingresar Animal</a>
        <a href="obtener.php" class="w3-bar-item w3-button">Listar Registros</a>
        <a href="index.php" class="w3-bar-item w3-button">Volver</a>
    </div>

    <form method="post" action="agregar.php">
        <div style="width:620px;margin:auto;margin-top: 12px;">
            <div class="w3-sidebar w3-card" style="width:40%;height:50%">
                <fieldset>
                    <legend> Ingrese su consulta</legend>
                    <p>
                        <label> Escriba su nombre:
                            <input type="text" name="nombre" />
                        </label>
                    </p>
                    <p>
                        <label>Escriba su correo electrónico:
                            <input type="text" name="email" />
                        </label>
                    </p>
                    <p>
                        <label>Escriba su mensaje:
                            <textarea name="mensaje" cols="30" rows="5"></textarea>
                        </label>
                    </p>
                    <p>
                        <input type="submit" value="enviar" />
                    </p>
                </fieldset>
            </div>
        </div>
        <p><a href="index.php">Volver</a></p>
    </form>
</body>

</html>