<?php

$ci =$_POST['c1'];
$nombre =$_POST['c2'];
$apellido =$_POST['c3'];
$telefono = $_POST['c4'];
$direccion = $_POST['c5'];
$cantanimales = $_POST['c6'];
$id = $_POST['id'];
if($ci&&$nombre&&$apellido&&$telefono&&$direccion&&$cantanimales){
	include('database.php');
	//$registro = "UPDATE persona set ci ='$ci', nombre='$nombre', apellido='$apellido', telefono='$telefono', direccion='$direccion', cantanimales='$cantanimales' 
	//WHERE id='$id'";
  // $resultado = mysqli_query($conexion,$registro);

   $update = $conexion->query("UPDATE persona SET ci ='$ci', nombre='$nombre', apellido='$apellido', telefono='$telefono', direccion='$direccion', cantanimales='$cantanimales' 
   WHERE id='$id'");
	
   $resultado = mysqli_query($conexion,$update);

}

header('Location: obtener.php');




?>