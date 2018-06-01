<?php
	include("config.php");
	require('lib/fpdf/fpdf.php');
	$pdf = new FPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',18);

	$op = isset($_GET['op'])?$_GET['op']:'';
	$sql = "SELECT c.curs_id, d.doce_nombres, c.curs_nombre FROM curso c JOIN docente d ON c.curs_doce_id=d.doce_id";
	if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");

	$i=1;
	$pdf->Cell(60,20,'Nombre del docente',1,0,'C');
	$pdf->Cell(60,20,'Nombre del Curso',1,1,'C');
	
	while($reg = $resultado->fetch_assoc()){

		
        $docente = $reg['doce_nombres'];
		$nombres = $reg['curs_nombre'];	


		$pdf->Cell(60,20,$docente,1,0,'C');
		$pdf->Cell(60,20,$nombres,1,1,'C');
		$i++;
	}

	

	$pdf->Output();
?>


