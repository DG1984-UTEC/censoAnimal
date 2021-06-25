<?php
session_start();

// Detects if there is someone logged in.

//if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == true){
if (isset($_SESSION['usuario'])){


// Detects if there is someone logged in.

//if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == true){


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
    }

//include ("database.php");
//$db= new Database();

//valido haber recibido los campos desde el html y que no esten vacios
if (isset($_POST["cidueno"],
$_POST["nombre"],
$_POST["sexo"],
$_POST["castrado"],
$_POST["reqcastracion"]) and 
     $_POST["cidueno"] !="" and $_POST["nombre"]!="" and $_POST["sexo"]!=""and $_POST["castrado"]!=""and $_POST["reqcastracion"]!=""){
     //asigno el contenido de cada campo recogido en el html a variables locales
     $cidueno = $_POST['cidueno'];
     $nombre = $_POST['nombre'];
     $sexo = $_POST['sexo'];
     $castrado = $_POST['castrado'];
     $reqcastracion = $_POST['reqcastracion'];
     




     $insercion = $conexion->query("INSERT INTO animal (cidueno, nombre, sexo, castrado, reqcastracion) VALUES ('$cidueno','$nombre','$sexo','$castrado','$reqcastracion')");



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