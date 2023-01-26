<?php
	require '../plantilla.php';
	// require '../censoAnimal/database.php';
    
    $id= $_GET["idP"];
    // $ci= $_GET["ci"];
    require 'D:\Desarrollo\laragon\www\censoAnimal\database.php';
	
	// $query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
    $queryPersona = "SELECT * FROM persona WHERE idP = '$id'";
	$resultadoPersona = $conexion->query($queryPersona);

	

		// while($result= mysqli_fetch_array($resultadoPersona)){
			
		// 	$ci = $result["ci"];
		
		// }

		// $ci = $_SESSION['ci'];
	
   

    

	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial', 'B', 16);
	$pdf->Write(5,'Reporte de Censo Animal');
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Write(5,'Datos del propietario');
    $pdf->Ln();
	$pdf->Ln();
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(22,6,'Cedula',1,0,'C',1);
	$pdf->Cell(30,6,'Nombre',1,0,'C',1);
	$pdf->Cell(30,6,'Apellido',1,0,'C',1);
    $pdf->Cell(25,6,'Telefono',1,0,'C',1);
    $pdf->Cell(60,6,'Direccion',1,0,'C',1);
    $pdf->Cell(22,6,'Cantidad',1,0,'C',1);
	
	$pdf->SetFont('Arial','',10);
	$pdf->Ln();

	while($row = $resultadoPersona->fetch_assoc())
	{
		$_SESSION['ciP'] = $row['ciP'];
		$ci = $_SESSION['ciP'];
		$pdf->Cell(22,6,utf8_decode($row['ciP']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['nombreP']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['apellidoP']),1,0,'C');
        $pdf->Cell(25,6,utf8_decode($row['telefonoP']),1,0,'C');
        $pdf->Cell(60,6,utf8_decode($row['direccionP']),1,0,'C');
        $pdf->Cell(22,6,utf8_decode($row['cantanimales']),1,1,'C');
	}

	$pdf->Ln();
	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Write(5,'Animales asociados');
    $pdf->Ln();
	$pdf->Ln();
    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(22,6,'Nombre',1,0,'C',1);
	$pdf->Cell(30,6,'Especie',1,0,'C',1);
	$pdf->Cell(30,6,'Sexo',1,0,'C',1);
    $pdf->Cell(25,6,'Castrado',1,0,'C',1);
    $pdf->Cell(60,6,'Requiere castracion',1,0,'C',1);
    
	
	$pdf->SetFont('Arial','',10);
	$pdf->Ln();

	$queryAnimal = "SELECT * FROM animal WHERE ciduenoA = '$ci'";
    $resultadoAnimal = $conexion->query($queryAnimal);

    while($row2 = $resultadoAnimal->fetch_assoc())
	{ 
		$pdf->Cell(22,6,utf8_decode($row2['nombreA']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row2['especieA']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row2['sexoA']),1,0,'C');
        $pdf->Cell(25,6,utf8_decode($row2['castrado']),1,0,'C');
        $pdf->Cell(60,6,utf8_decode($row2['reqcastracion']),1,1,'C');
	}
    
    $pdf->Ln();
	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Write(5,'Castrados');
    $pdf->Ln();
	$pdf->Ln();
    $pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(22,6,'Fecha',1,0,'C',1);
	$pdf->Cell(30,6,'Nombre',1,0,'C',1);
	$pdf->Cell(30,6,'IDchip',1,0,'C',1);
    $pdf->Cell(25,6,'Especie',1,0,'C',1);
    $pdf->Cell(60,6,'Sexo',1,0,'C',1);

    $pdf->SetFont('Arial','',10);
	$pdf->Ln();

	$queryCastracion = "SELECT * FROM castracion WHERE ciduenoC = '$ci'";
    $resultadoCastracion = $conexion->query($queryCastracion);

    while($row3 = $resultadoCastracion->fetch_assoc())
	{
		$pdf->Cell(22,6,utf8_decode($row3['fecastracion']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row3['nmascota']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row3['idchip']),1,0,'C');
        $pdf->Cell(25,6,utf8_decode($row3['especieC']),1,0,'C');
        $pdf->Cell(60,6,utf8_decode($row3['sexoC']),1,1,'C');
	}

	$pdf->Output();
?>