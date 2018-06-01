<?php
	include("config.php");
	$op = isset($_GET['op'])?$_GET['op']:'';
	$id = $_GET['id'];

	if($op=="eliminar"){
		$sql = "DELETE FROM notas WHERE nota_id='{$id}'";
		if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");
	}else if($id!='0'){
		$estudiante = $_GET['nota_estu_id'];
		$curso = $_GET['nota_curs_id'];
		$nota1 = $_GET['nota_nota1'];
		$nota2 = $_GET['nota_nota2'];
		$nota3 = $_GET['nota_nota3'];
		$sql = "UPDATE notas SET nota_estu_id='{$estudiante}',nota_curs_id='{$curso}',nota_nota1='{$nota1}',nota_nota2='{$nota2}',nota_nota3='{$nota3}'WHERE nota_id='{$id}'";
		if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");	
	}else{
		$nota_curs_id = $_GET['nota_curs_id'] ;
		$nota_estu_id = $_GET['nota_estu_id'];
		$nota_nota1 = $_GET['nota_nota1'];
		$nota_nota2 = $_GET['nota_nota2'];
		$nota_nota3 = $_GET['nota_nota3'];
		$sql = "copy(notas)(nota_estu_id, nota_curs_id, nota_nota1, nota_nota2, nota_nota3) VALUES('{$nota_estu_id}', '{$nota_curs_id}', '{$nota_nota1}', '{$nota_nota2}', '{$nota_nota3}')";
		if (!$resultado = $mysqli->query($sql)) die("error");	
	}

	header("location:mnota_listado.php")
?>