<?php
include_once ('database.php');

//valido haber recibido los campos desde el html y que no esten vacios
if (isset($_POST["ci"],$_POST["nombre"],$_POST["apellido"],$_POST["telefono"],$_POST["direccion"],$_POST["cantanimales"]) and 
     $_POST["ci"] !="" and $_POST["nombre"]!="" and $_POST["apellido"]!=""and $_POST["telefono"]!=""and $_POST["direccion"]!=""and $_POST["cantanimales"]!="" ){
     //asigno el contenido de cada campo recogido en el html a variables locales
     $ci = $_POST['ci'];
     $nombre = $_POST['nombre'];
     $apellido = $_POST['apellido'];
     $telefono = $_POST['telefono'];
     $direccion = $_POST['direccion'];
     $cantanimales = $_POST['cantanimales'];




     $insercion = $conexion->query("INSERT INTO persona (ci, nombre, apellido, telefono, direccion, cantanimales) VALUES ('$ci','$nombre','$apellido','$telefono','$direccion','$cantanimales')");



     if ($insercion){
          echo "<p>Registro agregado.</p>";
          echo "<a href=formulariopersona.php>Volver</a>";
          } else {
          echo "<p>No se agregó...</p>";
          }


}else{
     echo '<p>Por favor, complete el <a href="formulario.php">formulario</a></p>';
}

?>