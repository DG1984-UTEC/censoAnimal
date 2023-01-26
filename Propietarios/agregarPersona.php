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
session_start();
include_once ('../database.php');


// Detects if there is someone logged in.

//if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == true){
if (isset($_SESSION['usuario'])){




     //valido haber recibido los campos desde el html y que no esten vacios
     if (isset($_POST["ciP"],$_POST["nombreP"],$_POST["apellidoP"],$_POST["telefonoP"],$_POST["direccionP"],$_POST["cantanimales"],$_POST["location"],$_POST["zone"])){
          //asigno el contenido de cada campo recogido en el html a variables locales
          $ciP = mysqli_real_escape_string ($conexion, $_POST['ciP']);
          $nombreP = mysqli_real_escape_string ($conexion, $_POST['nombreP']);
          $apellidoP = mysqli_real_escape_string ($conexion, $_POST['apellidoP']);
          $telefonoP = mysqli_real_escape_string ($conexion, $_POST['telefonoP']);
          $direccionP = mysqli_real_escape_string ($conexion, $_POST['direccionP']);
          $cantanimales = mysqli_real_escape_string ($conexion, $_POST['cantanimales']);
          $location = mysqli_real_escape_string ($conexion, $_POST['location']);
          $zone = mysqli_real_escape_string ($conexion, $_POST['zone']);
          $sesionP= $_SESSION['usuario'];

          // if ($_POST['location']=="Paysandu ciudad"){
          //      $zone = NULL;
          // }else{
          //      $zone = mysqli_real_escape_string ($conexion, $_POST['zone']);
          // }

          $check =$conexion->query("SELECT ciP FROM persona WHERE ciP='$ciP'");
          
          $res = mysqli_fetch_array($check);


         /* if ($res['ci']==$ci){
               echo "<script>
               alert('CI ya registrada en el sistema')
               window.location.href='formulariopersona.php';
               </script>";
               
          }else{*/
               $insercion = $conexion->query("INSERT INTO persona (ciP, nombreP, apellidoP, telefonoP, direccionP, cantanimales, location, zone, sesionP) VALUES ('$ciP','$nombreP','$apellidoP','$telefonoP','$direccionP','$cantanimales','$location','$zone','$sesionP')");
         // }    
               if ($insercion){
                    echo "<script>
                    Swal.fire({
                         title: 'Propietario dado de alta con éxito'
                       })
                       setTimeout(() => {  window.location.href= '../Propietarios/obtener.php'; }, 2000);
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
                       setTimeout(() => {  window.location.href= '../Propietarios/formularioPersona.php'; }, 2000);
            </script>"; 
               }
         

          
          
     


          


     }else{
               echo '<p>Por favor, complete el <a href="formulario.php">formulario</a></p>';
     }

}else{
     echo header("location: ../login.php");
     
 }
?>

