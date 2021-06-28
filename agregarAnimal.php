<?php
include_once('database.php');
session_start();


if (isset($_SESSION['usuario'])){


//valido haber recibido los campos desde el html y que no esten vacios
if (isset($_POST["cidueno"], $_POST["nombre"], $_POST["especie"], $_POST["sexo"], $_POST["castrado"], $_POST["reqcastracion"]) and 
     $_POST["cidueno"] !="" and $_POST["nombre"]!="" and $_POST["especie"]!="" and $_POST["sexo"]!="" and $_POST["castrado"]!=""and $_POST["reqcastracion"]!=""){
     //asigno el contenido de cada campo recogido en el html a variables locales
     $cidueno = mysqli_real_escape_string ($conexion, $_POST['cidueno']);
     $nombre = mysqli_real_escape_string ($conexion,$_POST['nombre']);
     $especie = mysqli_real_escape_string ($conexion,$_POST['especie']);
     $sexo = mysqli_real_escape_string ($conexion,$_POST['sexo']);
     $castrado = mysqli_real_escape_string ($conexion,$_POST['castrado']);
     $reqcastracion = mysqli_real_escape_string ($conexion,$_POST['reqcastracion']);
     




     $insercion = $conexion->query("INSERT INTO animal (cidueno, nombre, especie, sexo, castrado, reqcastracion) VALUES ('$cidueno','$nombre','$especie','$sexo','$castrado','$reqcastracion')");



     if ($insercion){
        echo "<script>
        alert('Registro Agregado')
        window.location.href='obteneranimales.php';
        </script>";
        
        //echo "<p>Registro agregado.</p>";
        //echo "<a href=obteneranimales.php>Volver</a>";
          } else {
          echo "<p>No se agregó...</p>";
          }


}else{
     echo '<p>Por favor, complete el <a href="formularioanimal.php">formulario</a></p>';
}
}else{
    echo header("location: login.php");
    
}
?>