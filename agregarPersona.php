<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/sweetalert2.min.css">
  <script type="text/javascript" src="js/sweetalert2@10.js"></script>
     <title>Document</title>
</head>
<body>
     
</body>
</html>
<?php
session_start();
include_once ('database.php');


// Detects if there is someone logged in.

//if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == true){
if (isset($_SESSION['usuario'])){




     //valido haber recibido los campos desde el html y que no esten vacios
     if (isset($_POST["ci"],$_POST["nombre"],$_POST["apellido"],$_POST["telefono"],$_POST["direccion"],$_POST["cantanimales"])){
          //asigno el contenido de cada campo recogido en el html a variables locales
          $ci = mysqli_real_escape_string ($conexion, $_POST['ci']);
          $nombre = mysqli_real_escape_string ($conexion, $_POST['nombre']);
          $apellido = mysqli_real_escape_string ($conexion, $_POST['apellido']);
          $telefono = mysqli_real_escape_string ($conexion, $_POST['telefono']);
          $direccion = mysqli_real_escape_string ($conexion, $_POST['direccion']);
          $cantanimales = mysqli_real_escape_string ($conexion, $_POST['cantanimales']);
          $sesion= $_SESSION['usuario'];

          $check =$conexion->query("SELECT ci FROM persona WHERE ci='$ci'");
          
          $res = mysqli_fetch_array($check);


         /* if ($res['ci']==$ci){
               echo "<script>
               alert('CI ya registrada en el sistema')
               window.location.href='formulariopersona.php';
               </script>";
               
          }else{*/
               $insercion = $conexion->query("INSERT INTO persona (ci, nombre, apellido, telefono, direccion, cantanimales, sesion) VALUES ('$ci','$nombre','$apellido','$telefono','$direccion','$cantanimales','$sesion')");
         // }    
               if ($insercion){
                    echo "<script>
                    Swal.fire({
                         title: 'Propietario dado de alta con éxito'
                       })
                       setTimeout(() => {  window.location.href= 'obtener.php'; }, 2000);
            </script>"; 
          //   echo "<script>
          //   setTimeout(() => {  window.location.href= 'obtener.php'; }, 2000);
           
          //   </script>"; 


                    // echo "<script>
                    // alert('Alta con éxito')
                    // window.location.href='obtener.php';
                    // </script>";
                    // echo "<p>Registro agregado.</p>";
                    //echo "<a href=formulariopersona.php>Volver</a>";
               } else{
                    echo "<script>
                    Swal.fire({
                         title: 'Error, El Propietario no fue dado de alta'
                       })
                       setTimeout(() => {  window.location.href= 'formularioPersona.php'; }, 2000);
            </script>"; 
               }
         

          
          
     


          


     }else{
               echo '<p>Por favor, complete el <a href="formulario.php">formulario</a></p>';
     }

}else{
     echo header("location: login.php");
     
 }
?>

