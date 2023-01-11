<?php
	// require './Librerias/fpdf/fpdf.php';
    require 'D:\Desarrollo\laragon\www\censoAnimal\Librerias\fpdf\fpdf.php';
    // require 'Librerias\fpdf\fpdf.php';

	// include './Librerias/fpdf/fpdf.php';

	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('D:\Desarrollo\laragon\www\censoAnimal\imagenes\membrete-01.png', 5, 5, 30 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Reporte De Propietarios',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>