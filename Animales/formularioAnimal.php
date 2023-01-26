<?php
session_start();
include('../database.php');

if (isset($_SESSION['usuario'])) {
    include ("../header.php");

?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/w3.css">
        <script type="text/javascript" src="../js/popper.min.js"></script>
        <script type="text/javascript" src="../js/jquery-3.6.1.js"></script>
        <script type="text/javascript" src="../js/bootstrap.bundle.js"></script>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->

        <!-- <link rel="stylesheet" href="css/bootstrap.min(old).css"> -->
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/bootstrap-utilities.css">
        <link rel="stylesheet" href="../css/principal.css">
        <link rel="stylesheet" href="../css/header.css">
        <title>Ingresar animal</title>
        <script>
            function valueChanged() {
                if (document.getElementById("siCas").checked == true) {
                    document.getElementById("neCas").disabled = true;

                } else {
                    document.getElementById("noCas").checked == true;
                    document.getElementById("neCas").disabled = false;
                }
                console.log(document.getElementById("siCas").value);
                console.log(document.getElementById("neCas").value)
            }
        </script>
        <!-- <script>
    $(document).ready(function(){
         $("#txtbusca").keyup(function(){
              var parametros="txtbusca="+$(this).val()
              $.ajax({
                    data:  parametros,
                  url:   'buscar.php',
                  type:  'post',
                    beforeSend: function () { },
                    success:  function (response) {                 
                        $(".salida").html(response);
                  },
                  error:function(){
                       alert("error")
                    }
               });
         })
})
    </script> -->

    </head>
        <body id="bod">

            <!-- <div class="input-group mb-3">
          <input type="text" class="form-control" id="txtbusca" placeholder="Busca" aria-label="Buscar" aria-describedby="basic-addon2">
       <div class="input-group-append">
          <span class="input-group-text" id="basic-addon2">BUSCAR</span>
        </div>
</div> -->
            <div class="salida"></div>
<br>
            <div class="container-fluid" style="width:650px">

                <div id="borde" class="border border" style="padding: 20px;">
                    <h1 id="tituloForm"><strong> Datos del animal</strong></h1>
                    <br>
                    <form id="agregarAnimal" method="post" action="agregarAnimal.php">
                    <div class="form-outline mb-4">
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" placeholder="Nombre del animal" class="form-control" name="nombreA" />
                        </div>
                        <br>

                        <table class="table table-responsive">
                            <th>
                                <label for="especie">Especie:</label>
                                <br>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Perro" name="especieA" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Perro
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Gato" name="especieA" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Gato
                                    </label>
                                </div>
                                <br>
                                <label for="especie">Sexo:</label>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Macho" name="sexoA" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Macho
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Hembra" name="sexoA" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Hembra
                                    </label>
                                </div>
                                <br>
                            </th>
                            <th>
                                <label for="especie">Castrado:</label>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="SI" name="castrado" id="siCas" onClick="valueChanged()">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Sí
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="NO" name="castrado" id="noCas" onClick="valueChanged()">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        No
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="NULL" name="castrado" onClick="valueChanged()">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Ns/Nc
                                    </label>
                                </div>
                                <br>
                                <label for="especie">Desea castrar:</label>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="SI" name="reqcastracion" id="neCas">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Sí
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="NO" name="reqcastracion">
                                    <label class=" form-check-label" for="flexRadioDefault1">
                                        No
                                    </label>
                                </div>
                            </th>
                        </table>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block mb-4">Enviar</button>
                        </div>
                </div>
                </form>
            </div>
        </body>

    </html>
<?php
    // if (isset($POST['ciP'])) {
    //     $ciBus = $GET['cidueno'];
    //     $consulta = $conexion->query("SELECT * FROM persona WHERE ci = '$ciBus'");
    //     if ($linea = mysqli_fetch_array($consulta)) {
    //         $ci = $linea["ci"];
    //         $nombre = $linea["nombre"];
    //         $apellido = $linea["apellido"];
    //          echo $ci;
    //             echo $nombre;
    //          echo $apellido; 
    //     };
    // }else{
    //     echo "No existen registros";
    // }
} else {
    echo header("location: login.php");
}
?>