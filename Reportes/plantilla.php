<?php
	// require './Librerias/fpdf/fpdf.php';
    require 'D:\Desarrollo\laragon\www\censoAnimal\Librerias\fpdf\fpdf.php';
    // require 'Librerias\fpdf\fpdf.php';
	setlocale(LC_ALL, 'es_UY');
	date_default_timezone_set('America/Montevideo');
	// include './Librerias/fpdf/fpdf.php';
	class PDF extends FPDF
	{
		
		function Header()
		{
			$this->Image('D:\Desarrollo\laragon\www\censoAnimal\imagenes\membrete-01.png', 5, 5, 30 );
			$this->SetFont('Arial','I',10);
			$tDate = date("d/m/Y g:i a");
        	$this->Cell(0, 10, ''.$tDate, 0, false, 'R', 0, '', 0, false, 'T', 'M');
			$this->Cell(30);
			$this->SetFont('Arial','B',15);
			$this->Cell(120,10, 'Reporte Censo animal',0,0,'C');
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