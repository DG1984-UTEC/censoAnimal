<?php
session_start();
include_once ('../database.php');


// Detects if there is someone logged in.

//if (isset($_SESSION['usuario']) && $_SESSION['usuario'] == true){
if (isset($_SESSION['usuario'])){

    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sweetalert2.min.css">
    <script type="text/javascript" src="../js/sweetalert2@10.js"></script>
    
        <link rel="stylesheet" href="bootstrap/booticons/icons/font/bootstrap-icons.css">

    <title>Document</title>
</head>

<body>
    <?php
if (isset($_GET['idC'])){
        $idC = intval($_GET['idC']);
        
        echo "<script>
        Swal.fire({
            
            title: '¿Estás seguro/a de eliminar a este registro?',
            showConfirmButton: true,
            confirmButtonText: 'ELIMINAR',
            confirmButtonColor: '#3085d6',
            showCancelButton: true,
            cancelButtonText: 'CANCELAR',
            cancelButtonColor: '#d33',
            buttonsStyling: true,
    
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = 'borrarCastracion.php?idC=$idC';
            } else {
                location.href = 'obtenerCastraciones.php';
            }
    
        })
        </script>"; 
}




    ?>
</body>

</html>
<!-- <script>
function animal_eliminar_confirmar($idA) {

    // confirm('Estás seguro que deseas eliminar el registro?');
        if (confirm('Estás seguro que deseas eliminar el registro?')) {
            location.href = 'borrarAnimal.php?idA=$idA';
        } else {
            alert('Continua comprando');
        }
    }

    Swal.fire({
        icon: 'warning',
        title: '¿Estás seguro/a de eliminar a este animal?',
        showConfirmButton: true,
        confirmButtonText: 'ELIMINAR',
        confirmButtonColor: '#3085d6',
        showCancelButton: true,
        cancelButtonText: 'CANCELAR',
        cancelButtonColor: '#d33',
        buttonsStyling: true,

    }).then((result) => {
        if (result.isConfirmed) {
            location.href = 'borrarAnimal.php?idA=$idA';
        } else {
            location.href = 'obtenerAnimales.php';
        }

    })

    Swal.fire({
        icon: 'warning',
        title: '¿Estás seguro/a de eliminar a este animal?',
        showConfirmButton: true,
        confirmButtonText: 'ELIMINAR',
        confirmButtonColor: '#3085d6',
        showCancelButton: true,
        cancelButtonText: 'CANCELAR',
        cancelButtonColor: '#d33',
        buttonsStyling: true,

    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: '../Animales/borrarAnimal.php',
                data: {
                    id: id
                },
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Animal eliminado correctamente',
                        showConfirmButton: false,
                        timer: 1500,
                    })
                }
            });
        }

    })
}
</script> -->
<?php
}else{
    echo header("location: login.php");
    
}
?>