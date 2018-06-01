<?php
	include("config.php");
	$op = isset($_GET['op'])?$_GET['op']:'';
	$id = $_GET['id'];

	if($op=="eliminar"){
		$sql = "DELETE FROM docente WHERE doce_id='{$id}'";
		if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");
	}else if($id!='0' && op=='actualizar'){
		$nombres = $_GET['nombres'];
		$apellidos = $_GET['apellidos'];
		$area = $_GET['area'];
		$login = $_GET['login'];
		$password = $_GET['password'];
		$sql = "UPDATE docente SET doce_nombres='{$nombres}',doce_apellidos='{$apellidos}',doce_area='{$area}',doce_login='{$login}',doce_password='{$password}' WHERE doce_id='{$id}'";
		if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");	
	}else{
		$nombres = $_GET['nombres'];
		$apellidos = $_GET['apellidos'];
		$area = $_GET['area'];
		$login = $_GET['login'];
		$password = $_GET['password'];
		$sql = "INSERT INTO docente(doce_nombres,doce_apellidos,doce_area,doce_login,doce_password) VALUES('{$nombres}','{$apellidos}','{$area}','{$login}','{$password}')";
		if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");	
	}
	
	header("location:mdocente_listado.php")
?>