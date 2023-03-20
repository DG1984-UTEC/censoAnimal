<?php
/*App de censo Animal

Versión 1.0
Autor: Técnico en TI Darío Gonzalez
*/
// session_start();
include_once('database.php');

if (isset($_SESSION['usuario'])) {


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/header.css">
        <title>Menú Principal</title>
    </head>

    <body>
        <div class="navbarC">
            <a href="/censoanimal/index.php">Administrador</a>
            <nav>
                <div class="dropdownC">
                    <button class="dropbtnC">Usuarios
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-contentC">
                        <a href="/censoanimal/Usuarios/formularioUsuario.php">Nuevo</a>
                        <a href="/censoanimal/Usuarios/obtenerusuarios.php">Listar</a>
                    </div>
                </div>
                <div class="dropdownD">
                    <button class="dropbtnD"> <?php echo $_SESSION["usuario"]; ?>
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-contentD">
                        <a href="/censoanimal/cerrar.php">Cerrar Sesión</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- <div class="footerD">
            <p>Versión 2 - 2023</p>
        </div> -->
    </body>

    </html>
<?php
} else {
    echo header("location: login.php");
}
?>