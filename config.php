<?php
	$mysqli = mysqli_connect("localhost", "root", "","sisnotas");
	 
	if($mysqli === false){
	    die("ERROR: No se puede conectar. " . mysqli_connect_error());
	}
	 
?>