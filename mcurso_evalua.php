<?php
	include("config.php");
	$op = isset($_GET['op'])?$_GET['op']:'';
	$id = $_GET['id'];

	if($op=="eliminar"){
		$sql = "DELETE FROM curso WHERE curs_id='{$id}'";
		if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");
	}else if($id!='0'){
		$docente = $_GET['curs_doce_id'];
		$nombre = $_GET['curs_nombre'];
		$sql = "UPDATE curso SET curs_doce_id='{$docente}',curs_nombre='{$nombre}' WHERE curs_id='{$id}'";
		if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");	
	}else{
		$id_docente = $_GET['curs_doce_id'];
		$curs_nombre = $_GET['curs_nombre'];
		$sql = "INSERT INTO curso(curs_doce_id,curs_nombre) VALUES('{$id_docente}','{$curs_nombre}')";
		if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");	
	}
	
	header("location:mcurso_listado.php")
?>