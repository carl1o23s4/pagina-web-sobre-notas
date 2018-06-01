<?php
	include("config.php");
	require('lib/fpdf/fpdf.php');
	$pdf = new FPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',12);

	$op = isset($_GET['op'])?$_GET['op']:'';
	$sql = "SELECT * FROM estudiante";
	if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");

	$i=1;
	$pdf->Cell(30,10,'Nombres',1,0,'C');
	$pdf->Cell(30,10,'Apellido',1,0,'C');
	$pdf->Cell(30,10,'Grado ',1,0,'C');
	$pdf->Cell(30,10,'Seccion',1,0,'C');
	$pdf->Cell(50,10,'Direccion',1,1,'C');

	while($reg = $resultado->fetch_assoc()){
		
		$estudiantes = $reg['estu_nombre'];
		$apellidos = $reg['estu_apellidos'];
		$grado = $reg['estu_grado'];
		$seccion = $reg['estu_seccion'];
		$direccion = $reg['estu_direccion'];
       
		$pdf->Cell(30,10,$estudiantes,1,0,'C');
		$pdf->Cell(30,10,$apellidos,1,0,'C');
		$pdf->Cell(30,10,$grado,1,0,'C');
		$pdf->Cell(30,10,$seccion,1,0,'C');
		$pdf->Cell(50,10,$direccion,1,1,'C');	

		$i++;
	}
	

	$pdf->Output();
?>



