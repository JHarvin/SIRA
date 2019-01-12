<?php
	include 'plantillausuario.php';
	require 'Conexion.php';
	
	$query = "SELECT nombre,username, telefono,email FROM tpersonal  where status=1";
	$resultado = Conexion::conectar()->prepare($query);
	$resultado->execute();
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetTextColor(70, 130, 180);
	$pdf->SetFont('Arial','',13);
	$pdf->SetFillColor(0, 206, 209);
	
	$pdf->SetDrawColor(0, 0, 0 );	
	$pdf->Cell(60,10,'Nombre',1,0,'C',1);
	$pdf->Cell(40,10,'Usuario',1,0,'C',1);
	$pdf->Cell(40,10,'Telefono',1,0,'C',1);
	$pdf->Cell(50,10,'Email',1,1,'C',1);
	
	$pdf->SetFont('Arial','',11);
	foreach($resultado as $row =>$item)
	 {
		
		$pdf->SetTextColor(70, 130, 180);
		$pdf->SetFillColor(240, 255, 2555);
		 $pdf->Cell(60,10,utf8_decode($item["nombre"]),1,0,'C',1);
		 $pdf->Cell(40,10,utf8_decode($item["telefono"]),1,0,'C',1);
		 $pdf->Cell(40,10,utf8_decode($item["username"]),1,0,'C',1);
		$pdf->Cell(50,10,utf8_decode($item["email"]),1,1,'C',1);
		$pdf->SetFillColor(123, 104, 238);
	 }
	/*while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(70,6,utf8_decode($row['estado']),1,0,'C');
		$pdf->Cell(20,6,$row['id_municipio'],1,0,'C');
		$pdf->Cell(70,6,utf8_decode($row['municipio']),1,1,'C');
	}*/
	$pdf->Output();
?>