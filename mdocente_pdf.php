<?php
	include("config.php");
	require('lib/fpdf/fpdf.php');
	$pdf = new FPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',12);

	$op = isset($_GET['op'])?$_GET['op']:'';
	$sql = "SELECT * FROM docente";
	if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");

	$i=1;
	$pdf->Cell(30,10,'Nombres',1,0,'C');
	$pdf->Cell(30,10,'Apellidos',1,0,'C');
	$pdf->Cell(30,10,'Area',1,0,'C');
	$pdf->Cell(30,10,'Login',1,1,'C');

	while($reg = $resultado->fetch_assoc()){

		$nombres = $reg['doce_nombres'];
		$apellidos = $reg['doce_apellidos'];
		$area = $reg['doce_area'];
		$login = $reg['doce_login'];
		$password = $reg['doce_password'];

		$pdf->Cell(30,10,$nombres,0,0,'C');
		$pdf->Cell(30,10,$apellidos,0,0,'C');
		$pdf->Cell(30,10,$area,0,0,'C');
		$pdf->Cell(30,10,$login,0,1,'C');

		$i++;
	}
	

	$pdf->Output();
?>