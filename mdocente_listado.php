<?php
	include("config.php");
	include("cabecera.php");

	$id = isset($_GET['id'])?$_GET['id']:'0';

	$nombres = "";
	$apellidos = "";
	$area = "";
	$login = "";
	$password = "";
	if(!empty($id)){
		$sql = "SELECT * FROM docente WHERE doce_id='{$id}'";
		if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");
		$reg = $resultado->fetch_assoc();
		$nombres = $reg['doce_nombres'];
		$apellidos = $reg['doce_apellidos'];
		$area = $reg['doce_area'];
		$login = $reg['doce_login'];
		$password = $reg['doce_password'];
	}
?>
<h2>Docentes</h2>
<form class="form-horizontal" action="mdocente_evalua.php">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-group">
        <label for="nombres" class="col-sm-2 control-label">Nombres</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $nombres; ?>" placeholder="Nombres">
        </div>
    </div>
    <div class="form-group">
        <label for="apellidos" class="col-sm-2 control-label">Apellido</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $apellidos; ?>" placeholder="Apellidos">
        </div>
    </div> 
    <div class="form-group">
        <label for="area" class="col-sm-2 control-label">Area</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="area" name="area" value="<?php echo $area; ?>" placeholder="Area">
        </div>
    </div>
    <div class="form-group">
        <label for="login" class="col-sm-2 control-label">Login</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="login" name="login" value="<?php echo $login; ?>" placeholder="Login">
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="mdocente_listado.php" class="btn btn-danger">Cancelar</a>
        </div>
    </div>
</form>
<?php
	
	$sql = "SELECT * FROM docente";
	if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");
	echo "<table class='table table-hover table-bordered'>";
	echo "<tr class='info'>";
	echo "<th>ID</th>";
	echo "<th>Nombre</th>";
	echo "<th>Apellidos</th>";
	echo "<th>Area</th>";
	echo "<th>Login</th>";
	echo "<th>Opciones</th>";
	echo "</tr>";
	while ($reg = $resultado->fetch_assoc()) {
		echo "<tr>";
	    echo "<td>".$reg['doce_id']."</td>";
	    echo "<td>".$reg['doce_nombres']."</td>";
	    echo "<td>".$reg['doce_apellidos']."</td>";
	    echo "<td>".$reg['doce_area']."</td>";
	    echo "<td>".$reg['doce_login']."</td>";
	    echo "<td class='text-right'>

	    	<a href='mdocente_evalua.php?op=eliminar&id=".$reg['doce_id']."' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></a>
	    	<a href='mdocente_listado.php?id=".$reg['doce_id']."' class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></a>
	    </td>";
	    echo "</tr>";
	}
	echo "</table>";
	echo "<div class='text-center'>";
	echo "<a href='mdocente_pdf.php?id=".$reg['doce_id']."' class='btn btn-warning'><span class='glyphicon glyphicon-print'></span> Imprimir PDF</a>";
	echo " <a href='#' onclick='javascript:window.print();' class='btn btn-success'><span class='glyphicon glyphicon-print'></span> Imprimir</a>";
	echo "</div>"
	?>
    <?php
	include("pie.php");
?>