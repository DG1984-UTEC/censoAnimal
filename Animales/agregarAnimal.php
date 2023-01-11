<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../css/sweetalert2.min.css">
  <script type="text/javascript" src="../js/sweetalert2@10.js"></script>
     <title>Document</title>
</head>
<body>
     
</body>
</html>
<?php
include_once('../database.php');
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
          Swal.fire({
               title: 'Animal registrado con éxito'
             })
             setTimeout(() => {  window.location.href= '../Animales/obtenerAnimales.php'; }, 2000);
  </script>"; 
        
        
          } else {
               echo "<script>
               Swal.fire({
                    title: 'Error, el animal no se registró'
                  })
                  setTimeout(() => {  window.location.href= 'index.php'; }, 2000);
       </script>"; 
          }


}else{
     echo '<p>Por favor, complete el <a href="../Animales/formularioAnimal.php">formulario</a></p>';
}
}else{
    echo header("location: login.php");
    
}
?>