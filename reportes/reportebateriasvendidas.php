<?php
	include 'plantillabateriasvendidas.php';
	require 'Conexion.php';
	
	$query = "SELECT
	tventas.codigo,
	tventas.cliente,
	tproveedores.nombre,
	tventas.fecha
	FROM
	tventas ,
	tproveedores
	WHERE idproveedor=proveedor";
	
	$resultado = Conexion::conectar()->prepare($query);
	$resultado->execute();
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetTextColor(0,0,0);
	//$pdf->SetTextColor(255,255,255);
	$pdf->SetFont('Arial','',13);
	//$pdf->SetFillColor(0, 206, 209);
	//$pdf->SetFillColor(123, 104, 238);
	//turquesa medio
	$pdf->SetFillColor(72, 209, 204);
	
	//azul acero
	$pdf->SetDrawColor(70, 130, 180);

	
	//$pdf->SetDrawColor(0, 0, 0 );	
	$pdf->Cell(40,10,'Codigo',1,0,'C',1);
	$pdf->Cell(40,10,'Cliente',1,0,'C',1);
	$pdf->Cell(60,10,'Nombre de proveedor',1,0,'C',1);
	$pdf->Cell(50,10,'Fecha de venta',1,1,'C',1);
	
	$pdf->SetFont('Arial','',11);
	foreach($resultado as $row =>$item)
	 {
		
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFillColor(240, 255, 2555);
		//$pdf->SetFillColor(123, 104, 238);
		 $pdf->Cell(40,10,utf8_decode($item["codigo"]),1,0,'C',1);
		 $pdf->Cell(40,10,utf8_decode($item["cliente"]),1,0,'C',1);
		 $pdf->Cell(60,10,utf8_decode($item["nombre"]),1,0,'C',1);
		$pdf->Cell(50,10,utf8_decode($item["fecha"]),1,1,'C',1);
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