<?php
	include("config.php");
	$op = isset($_GET['op'])?$_GET['op']:'';
	$id = $_GET['id'];

	if($op=="eliminar"){
		$sql = "DELETE FROM estudiante WHERE estu_id='{$id}'";
		if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");
	}else if($id!='0'){
		$grado = $_GET['grado'];
		$seccion = $_GET['seccion'];
		$nombres = $_GET['nombre'];
		$apellidos = $_GET['apellidos'];
		$direccion = $_GET['direccion'];
		$login = $_GET['login'];
		$password = $_GET['password'];
		$sql = "UPDATE estudiante SET estu_grado='{$grado}', estu_seccion='{$seccion}', estu_nombre='{$nombres}', estu_apellidos='{$apellidos}', estu_direccion='{$direccion}',	estu_login='{$login}', estu_password='{$password}' WHERE estu_id='{$id}'";
		if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");	
	}else{
		$grado = $_GET['grado']+1;
		$seccion = $_GET['seccion']+1;
		$nombres = $_GET['nombre']+1;
		$apellidos = $_GET['apellidos']+1;
		$direccion = $_GET['direccion']+1;
		$login = $_GET['login']+1;
		$password = $_GET['password']+1;
		$sql = "INSERT INTO estudiante(estu_grado,estu_seccion,estu_nombre,estu_apellidos,estu_direccion,estu_login,estu_password) VALUES('{$grado}','{$seccion}','{$nombres}','{$apellidos}','{$direccion}','{$login}','{$password}')";
		if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");	
	}
	
	header("location:mestudiante_listado.php")
?>
