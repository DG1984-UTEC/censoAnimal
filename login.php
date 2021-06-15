<?php

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

    if (isset(
        $_POST["usuario"],$_POST["password"])){
        $usuario =$_POST['usuario'];
        $password =$_POST['password'];

        $resultado = $conexion->query("SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'");
        $resultadoTipo =$conexion->query("SELECT tipo FROM usuarios");


        $user = mysqli_fetch_array($resultado);
        $tipo = mysqli_fetch_array($resultadoTipo);
  
while ($user = mysqli_fetch_array($resultado)){
    $useruser = $user['usuario'];
    $userpass= $user['password'];
    $usertipo = $user['tipo'];
    
}



    if ($resultado){
        
        if ($usertipo = 'usuario'){
            header("Location: index.php");
            
        }else if($usertipo = 'administrador'){
            header("Location: admin.html");
           
        }else{
            echo "USUARIO NO VÁLIDO";
        }
        
        /*
        switch ($usertipo) {
            case "administrador":
                header("Location: admin.html");
                break;
            case "usuario":
                header("Location: index.php");
                break;
            default;
            }*/
       
    }else{
        echo "<h3>Acceso incorrecto</h3>";
    }



}
?>
