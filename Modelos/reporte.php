<?php
	include 'plantilla.php';
	require 'Conexion.php';
	
	$query = "SELECT nombre, dui, telefono FROM tclientes";
	$resultado = Conexion::conectar()->prepare($query);
	$resultado->execute();
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(70,6,'nombre',1,0,'C',1);
	$pdf->Cell(20,6,'dui',1,0,'C',1);
	$pdf->Cell(70,6,'telefono',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	foreach($resultado as $row =>$item)
	 {
		 $pdf->Cell(70,6,utf8_decode($item["nombre"]));
		 $pdf->Cell(70,6,utf8_decode($item["dui"]));
		 $pdf->Cell(70,6,utf8_decode($item["telefono"]));
	 }
	/*while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(70,6,utf8_decode($row['estado']),1,0,'C');
		$pdf->Cell(20,6,$row['id_municipio'],1,0,'C');
		$pdf->Cell(70,6,utf8_decode($row['municipio']),1,1,'C');
	}*/
	$pdf->Output();
?>