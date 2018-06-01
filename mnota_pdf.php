<?php
	include("config.php");
	require('lib/fpdf/fpdf.php');
	$pdf = new FPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','',12);

	$op = isset($_GET['op'])?$_GET['op']:'';
	$sql = ("SELECT n.nota_id, e.estu_nombre, c.curs_nombre, n.nota_nota1, n.nota_nota2, n.nota_nota3 FROM notas n JOIN estudiante e ON e.estu_id=n.nota_estu_id JOIN curso c ON c.curs_id = n.nota_curs_id");
	if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");

	$i=1;
	$pdf->Cell(30,10,'Nombres',1,0,'C');
	$pdf->Cell(30,10,'Curso',1,0,'C');
	$pdf->Cell(30,10,'Nota1',1,0,'C');
	$pdf->Cell(30,10,'Nota2',1,0,'C');
	$pdf->Cell(30,10,'Nota3',1,1,'C');

	while($reg = $resultado->fetch_assoc()){
		
		$estudiantes = $reg['estu_nombre'];
		$cursos = $reg['curs_nombre'];
		$nota1 = $reg['nota_nota1'];
		$nota2 = $reg['nota_nota2'];
		$nota3 = $reg['nota_nota3'];
       
		$pdf->Cell(30,10,$estudiantes,1,0,'C');
		$pdf->Cell(30,10,$cursos,1,0,'C');
		$pdf->Cell(30,10,$nota1,1,0,'C');
		$pdf->Cell(30,10,$nota2,1,0,'C');
		$pdf->Cell(30,10,$nota3,1,1,'C');
		$i++;
	}

	

	$pdf->Output();
?>


