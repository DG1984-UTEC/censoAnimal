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
    <title>Obtener Castraciones</title>
</head>

<body>
    <div class="w3-sidebar w3-card" style="width:12%;margin-top:1%">
        <h3 class="w3-bar-item">Menu</h3>
        <a href="formularioCastracion.php" class="w3-bar-item w3-button">Nueva Castración</a>
       <a href="obtenerCastraciones.php" class="w3-bar-item w3-button">Listar Castraciones</a>
        <br>
        <a href="index.php" class="w3-bar-item w3-button">Volver</a>
        <br>

        <a href="Cerrar.php" class="w3-bar-item w3-button">Cerrar Sesión</a>
    </div>
    <div style="margin-left:1200px"><?php echo 'Bienvenido, ' . $_SESSION["usuario"];?></div>
    <div style="width:1150px;margin:auto;margin-top: 12px;">
        <table class="table table-striped" width='80%' style="text-align:center;">

            <tr>
                <th>Fecha Castración</th>
                <th>CI Dueño</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Nombre Mascota</th>
                <th>ID Chip</th>
                <th>Especie</th>
                <th>Sexo</th>
                <th>Creado</th>
                <th>Actualizado</th>
                <th>Por</th>
                <th>Acciones</th>

            </tr>
            <?php 
    
    
    if (isset($_POST["buscarxfechaP"])){
        $fechaA = $_POST['buscarxfecha1'];
        $fechaB = $_POST['buscarxfecha2'];
       
       
        
        if($fechaA == $fechaB){    
       
            $busquedaFecha = $conexion->query("SELECT * FROM castracion WHERE fecastracion = '$fechaA'"); // BETWEEN '$fechaA' AND '$fechaB'");
            while ($fila1 =mysqli_fetch_array($busquedaFecha)){
                
                        $id=$fila1 ["id"];
                        $fecastracion=$fila1["fecastracion"];
                        $cidueno=$fila1["cidueno"];
                        $nombre=$fila1["nombre"];
                        $apellido=$fila1["apellido"];
                        $nmascota=$fila1["nmascota"];
                        $idchip=$fila1["idchip"];
                        $especie=$fila1["especie"];
                        $sexo=$fila1["sexo"];
                        $created_at=$fila1["CREATED_AT"];
                        $updated_at=$fila1["UPDATED_AT"];
                        $sesion=$fila1['sesion'];
                
                

                
                ?>

            <tr>
            <td><?php echo $fecastracion;?></td>
                <td><?php echo $cidueno;?></td>
                <td><?php echo $nombre;?></td>
                <td><?php echo $apellido;?></td>
                <td><?php echo $nmascota;?></td>
                <td><?php echo $idchip;?></td>
                <td><?php echo $especie;?></td>
                <td><?php echo $sexo;?></td>           
                <td><?php echo $created_at;?></td>
                <td><?php echo $updated_at;?></td>
                <td><?php echo $sesion;?></td>

                <td>
                    <a href="editarcastracion.php?id=<?php echo $id;?>" class="edit">Editar</a>
                    <a href="borrarcastracion.php?id=<?php echo $id;?>" class="delete" title="Eliminar">Borrar</a>
                </td>
            </tr>

            <?php

            } 
        
        }else{

            $busquedaFechaT = $conexion->query("SELECT * FROM castracion WHERE fecastracion BETWEEN '$fechaA' AND '$fechaB'");
            while ($fila1 =mysqli_fetch_array($busquedaFechaT)){
                
                $id=$fila1 ["id"];
                $fecastracion=$fila1["fecastracion"];
                $cidueno=$fila1["cidueno"];
                $nombre=$fila1["nombre"];
                $apellido=$fila1["apellido"];
                $nmascota=$fila1["nmascota"];
                $idchip=$fila1["idchip"];
                $especie=$fila1["especie"];
                $sexo=$fila1["sexo"];
                $created_at=$fila1["CREATED_AT"];
                $updated_at=$fila1["UPDATED_AT"];
                $sesion=$fila1['sesion'];

                ?>

            <tr>
            <td><?php echo $fecastracion;?></td>
                <td><?php echo $cidueno;?></td>
                <td><?php echo $nombre;?></td>
                <td><?php echo $apellido;?></td>
                <td><?php echo $nmascota;?></td>
                <td><?php echo $idchip;?></td>
                <td><?php echo $especie;?></td>
                <td><?php echo $sexo;?></td>           
                <td><?php echo $created_at;?></td>
                <td><?php echo $updated_at;?></td>
                <td><?php echo $sesion;?></td>

                <td>
                    <a href="update.php?id=<?php echo $id;?>" class="edit">Editar</a>
                    <a href="borrarpersona.php?id=<?php echo $id;?>" class="delete" title="Eliminar">Borrar</a>
                </td>
            </tr>
            <?php
            }
        }
        
    }
?>
            <form method="post" action="obtenercastraciones.php">
                <div class="row">
                <p>Buscar por Fecha:</p>
                    <div class="col-xs-6" style="width:35%">
                    <input type="date"  class="form-control" name="buscarxfecha1">
                    </div>
                    
                    <div class="col-xs-6" style="width:35%">
                    <input type="date"  class="form-control" name="buscarxfecha2">
                    </div>
                </div>
                <button type="submit" class="btn btn-default" name="buscarxfechaP">Buscar</button>
               
            </form>

            <form method="post" action="obtenercastraciones.php">
                <input type="buscarci" class="form-control" placeholder="Ingrese CI" name="buscarci">
                <button type="submit" class="btn btn-default">Buscar</button>
                <button type="submit" class="btn btn-default" name="listar">Listar</button>
            </form>

            <?php 
                
                if (isset($_POST["buscarci"])){

                    $buscarci = $_POST['buscarci'];
                    $consultaci = $conexion->query("SELECT * FROM castracion WHERE cidueno = '$buscarci'");
                    while ($fila1 =mysqli_fetch_array($consultaci)){
                       
                        $id=$fila1 ["id"];
                        $fecastracion=$fila1["fecastracion"];
                        $cidueno=$fila1["cidueno"];
                        $nombre=$fila1["nombre"];
                        $apellido=$fila1["apellido"];
                        $nmascota=$fila1["nmascota"];
                        $idchip=$fila1["idchip"];
                        $especie=$fila1["especie"];
                        $sexo=$fila1["sexo"];
                        $created_at=$fila1["CREATED_AT"];
                        $updated_at=$fila1["UPDATED_AT"];
                        $sesion=$fila1['sesion'];
                        ?>
            <tr>
                <td><?php echo $fecastracion;?></td>
                <td><?php echo $cidueno;?></td>
                <td><?php echo $nombre;?></td>
                <td><?php echo $apellido;?></td>
                <td><?php echo $nmascota;?></td>
                <td><?php echo $idchip;?></td>
                <td><?php echo $especie;?></td>
                <td><?php echo $sexo;?></td>           
                <td><?php echo $created_at;?></td>
                <td><?php echo $updated_at;?></td>
                <td><?php echo $sesion;?></td>

                <td>
                    <a href="editaranimal.php?id=<?php echo $id;?>" class="edit" title="Editar">Editar</a>
                    <a href="borraranimal.php?id=<?php echo $id;?>" class="delete" title="Eliminar">Borrar</a>
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
    $consulta = $conexion->query("SELECT * FROM castracion");
    while ($fila = mysqli_fetch_array($consulta)){
  

        $id=$fila["id"];
        $fecastracion=$fila["fecastracion"];
        $cidueno=$fila["cidueno"];
        $nombre=$fila["nombre"];
        $apellido=$fila["apellido"];
        $nmascota=$fila["nmascota"];
        $idchip=$fila["idchip"];
        $especie=$fila["especie"];
        $sexo=$fila["sexo"];
        $created_at=$fila["CREATED_AT"];
        $updated_at=$fila["UPDATED_AT"];
        $sesion=$fila['sesion'];
?>
<tr>
                <td><?php echo $fecastracion;?></td>
                <td><?php echo $cidueno;?></td>
                <td><?php echo $nombre;?></td>
                <td><?php echo $apellido;?></td>
                <td><?php echo $nmascota;?></td>
                <td><?php echo $idchip;?></td>
                <td><?php echo $especie;?></td>
                <td><?php echo $sexo;?></td>           
                <td><?php echo $created_at;?></td>
                <td><?php echo $updated_at;?></td>
                <td><?php echo $sesion;?></td>

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