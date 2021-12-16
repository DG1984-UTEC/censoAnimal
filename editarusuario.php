<?php

session_start();


if (isset($_SESSION['usuario'])){


    $id = !empty($_GET['id']) ? $_GET['id'] : 0;
    $linea='';

    if($id){
        include('database.php');
        $registro = "SELECT * FROM usuarios WHERE id = $id;";
        $resultado = mysqli_query($conexion,$registro);
        $linea = mysqli_fetch_array($resultado);
    }
    }else{
        echo header("location: login.php");
        
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
    <title>Actualizar Usuario</title>
</head>

<body>
  
        <div class="w3-sidebar w3-card" style="width:12%;margin-top:1%">
            <h3 class="w3-bar-item">Menu</h3>
            <a href="agregarusuario.php" class="w3-bar-item w3-button">Nuevo Usuario</a>
            <a href="obtenerusuarios.php" class="w3-bar-item w3-button">Listar Usuarios</a>
            <br>
            <a href="admin.php" class="w3-bar-item w3-button">Volver</a>
            <br>
            <a href="cerrar.php" class="w3-bar-item w3-button">Cerrar Sesión</a>
        </div>
        <div style="margin-left:1200px"><?php echo 'Bienvenido, ' . $_SESSION["usuario"];?></div>

        <form method="post" action="actualizarusuario.php">
        <div class="row" style="width: 900px;margin-left:300px;margin-right:300px;margin-top:3%">
            <div class="w3-sidebar w3-card" style="width:50%;height:50%">
                <div class="col-sm-4" style="margin-left:100px;margin-top:20px">
                    <label for="ci">CI:</label>
                    <input type="text" class="form-control" name="c1" value="<?php echo $linea['ci'];?>">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="c2" value="<?php echo $linea['nombre'];?>">
                    <label for="apellido">Apellido:</label>
                    <input type="text" class="form-control" name="c3" value="<?php echo $linea['apellido'];?>">
                </div>

                <div class="col-sm-4" style="margin-right:80px;margin-top:20px">
                    <label for="usuario">Usuario:</label>
                    <input type="text" class="form-control" name="c4" value="<?php echo $linea['usuario'];?>">
                    <label for="pwd">Contraseña:</label>
                    <input type="text" class="form-control" name="c5" value="<?php echo $linea['password'];?>">

                    <br>
                    <label for="tipo">Tipo:</label>
                    <br>
                    <label><input type="radio" class="optradio" name="c6" value="ad" 
                    <?php if($linea['tipo']=='ad') print "checked=true"?>/> Administrador </label>
                    <label><input type="radio" class="optradio" name="c6" value="us" 
                    <?php if($linea['tipo']=='us') print "checked=true"?>/> Usuario</label>
                    <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">

                    <button type="submit" value="actualizar" name="actualizar"
                        class="btn btn-default">Actualizar</button>

                </div>
            </div>

            <br>
            <br>

        </div>

        </div>
        </div>



    </form>
</body>

</html>