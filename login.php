<?php
include_once ('database.php');

    if (isset(
        $_POST["usuario"],$_POST["password"])){
        $usuario =$_POST['usuario'];
        $password =$_POST['password'];

       
        $users = $conexion->query("SELECT tipo FROM usuarios WHERE usuario = '$usuario' AND password = '$password'");
       
$tipo = mysqli_fetch_array($users);

if ($users){

        if ($tipo['tipo'] == "ad"){
            header("location: admin.html");

        }else if ($tipo['tipo'] == "us"){
            header("location: index.php");
        }else{
            echo "EL USUARIO NO SE ENCUENTRA EN LA BASE DE DATOS";
        }
    }else{
        echo " no funciona la query";
    }

        }
?>
