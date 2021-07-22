<?php
include_once('database.php');
session_start();


if (isset($_SESSION['usuario'])){



if (isset($_POST["cidueno"], $_POST["nombre"], $_POST["especie"], $_POST["sexo"], $_POST["castrado"], $_POST["reqcastracion"])){
   
     $cidueno = mysqli_real_escape_string ($conexion, $_POST['cidueno']);
     $nombre = mysqli_real_escape_string ($conexion,$_POST['nombre']);
     $especie = mysqli_real_escape_string ($conexion,$_POST['especie']);
     $sexo = mysqli_real_escape_string ($conexion,$_POST['sexo']);
     $castrado = mysqli_real_escape_string ($conexion,$_POST['castrado']);
     $reqcastracion = mysqli_real_escape_string ($conexion,$_POST['reqcastracion']);
     
if($cidueno ==""){
     $cidueno = Null;
}else if($nombre ==""){
     $nombre =Null;
}else if($especie ==""){
     $especie = Null;
}else if($sexo==""){
     $sexo = Null;
}else if($castrado ==""){
     $castrado =Null;
}else if($reqcastracion ==""){
     $reqcastracion = Null;
}





     $insercion = $conexion->query("INSERT INTO animal (cidueno, nombre, especie, sexo, castrado, reqcastracion) VALUES ('$cidueno','$nombre','$especie','$sexo','$castrado','$reqcastracion')");



     if ($insercion){
        echo "<script>
        alert('Registro Agregado')
        window.location.href='obteneranimales.php';
        </script>";
        
        
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