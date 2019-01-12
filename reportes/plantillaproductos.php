
<?php
	
	require_once'../fpdf/fpdf.php';
	class PDF extends FPDF
	{
		
	
		function Header()
		{
			$this->Image('../images/logo.png', 5, 3, 69 );
			//$this->Image('../images/logo.png', 140, 5, 69 );
			$this->SetFont('Arial','B',8);
			$this->Cell(30);
			$this->SetTextColor(70, 130, 180);
			$this->Cell(140,10, 'Sistema Informatico para la Gestion de Renta de Autos',0,0,'C');
			$this->Ln(20);
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->SetTextColor(70, 130, 180);
			$this->Cell(140,10, 'REPORTE DE BATERIAS DISPONIBLES',0,0,'C');
			$this->Ln(20);
		}
		function Footer()
		{
			$this->SetTextColor(70, 130, 180);
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}
		
			
	}
?>