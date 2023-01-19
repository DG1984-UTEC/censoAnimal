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



if (isset($_POST["ciduenoA"], $_POST["nombreA"], $_POST["especieA"], $_POST["sexoA"], $_POST["castrado"], $_POST["reqcastracion"])){
   
     $ciduenoA = mysqli_real_escape_string ($conexion, $_POST['ciduenoA']);
     $nombreA = mysqli_real_escape_string ($conexion,$_POST['nombreA']);
     $especieA = mysqli_real_escape_string ($conexion,$_POST['especieA']);
     $sexoA = mysqli_real_escape_string ($conexion,$_POST['sexoA']);
     $castrado = mysqli_real_escape_string ($conexion,$_POST['castrado']);
     $reqcastracion = mysqli_real_escape_string ($conexion,$_POST['reqcastracion']);
     
if($ciduenoA ==""){
     $ciduenoA = Null;
}else if($nombreA ==""){
     $nombreA =Null;
}else if($especieA ==""){
     $especieA = Null;
}else if($sexoA==""){
     $sexoA = Null;
}else if($castrado ==""){
     $castrado =Null;
}else if($reqcastracion ==""){
     $reqcastracion = Null;
}





     $insercion = $conexion->query("INSERT INTO animal (ciduenoA, nombreA, especieA, sexoA, castrado, reqcastracion) VALUES ('$ciduenoA','$nombreA','$especieA','$sexoA','$castrado','$reqcastracion')");



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