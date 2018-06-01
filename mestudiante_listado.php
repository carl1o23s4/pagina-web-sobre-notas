<?php
	include("config.php");
	include("cabecera.php");

	$id = isset($_GET['id'])?$_GET['id']:'0';

	$grado = "";
	$seccion = "";
	$nombres = "";
	$apellidos = "";
	$direccion = "";
	$login = "";
	$password = "";
	if(!empty($id)){
		$sql = "SELECT * FROM estudiante WHERE estu_id='{$id}'";
		if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");
		$reg = $resultado->fetch_assoc();
		$grado = $reg['estu_grado'];
		$seccion = $reg['estu_seccion'];
		$nombres = $reg['estu_nombre'];
		$apellidos = $reg['estu_apellidos'];
		$direccion = $reg['estu_direccion'];
		$login = $reg['estu_login'];
		$password = $reg['estu_password'];
	}
?>
<h2>Estudiante</h2>
<form class="form-horizontal" action="mestudiante_evalua.php">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-group">
        <label for="grado" class="col-sm-2 control-label">Grado</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="grado" name="grado" value="<?php echo $grado; ?>" placeholder="Grado">
        </div>
    </div>
    <div class="form-group">
        <label for="seccion" class="col-sm-2 control-label">Seccion</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="seccion" name="seccion" value="<?php echo $seccion; ?>" placeholder="Seccion">
        </div>
    </div>
    <div class="form-group">
        <label for="nombre" class="col-sm-2 control-label">Nombres</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombres; ?>" placeholder="nombre">
        </div>
    </div>
    <div class="form-group">
        <label for="apellidos" class="col-sm-2 control-label">Apellidos</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $apellidos; ?>" placeholder="Apellidos">
        </div>
    </div>
    <div class="form-group">
        <label for="direccion" class="col-sm-2 control-label">Direccion</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $direccion; ?>" placeholder="Direccion">
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
            <a href="mestudiante_listado.php" class="btn btn-danger">Cancelar</a>
        </div>
    </div>
</form>
<?php
	
	$sql = "SELECT * FROM estudiante";
	if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");
	echo "<table class='table table-hover table-bordered'>";
	echo "<tr class='info'>";
	echo "<th>ID</th>";
	echo "<th>Grado</th>";
	echo "<th>Seccion</th>";
	echo "<th>Nombre</th>";
	echo "<th>Apellido</th>";
	echo "<th>Direccion</th>";
	echo "<th>Login</th>";
	echo "<th>Opciones</th>";
	echo "</tr>";
	while ($reg = $resultado->fetch_assoc()) {
		echo "<tr>";
	    echo "<td>".$reg['estu_id']."</td>";
	    echo "<td>".$reg['estu_grado']."</td>";
	    echo "<td>".$reg['estu_seccion']."</td>";
	    echo "<td>".$reg['estu_nombre']."</td>";
	    echo "<td>".$reg['estu_apellidos']."</td>";
	    echo "<td>".$reg['estu_direccion']."</td>";
	    echo "<td>".$reg['estu_login']."</td>";
	    echo "<td class='text-right'>

	    	<a href='mestudiante_evalua.php?op=eliminar&id=".$reg['estu_id']."' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></a>
	    	<a href='mestudiante_listado.php?id=".$reg['estu_id']."' class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></a>
	    </td>";
	    echo "</tr>";
	}
	echo "</table>";
	echo "<div class='text-center'>";
	echo "<a href='mestudiante_pdf.php?id=".$reg['estu_id']."' class='btn btn-warning'><span class='glyphicon glyphicon-print'></span> Imprimir PDF</a>";
	echo " <a href='#' onclick='javascript:window.print();' class='btn btn-success'><span class='glyphicon glyphicon-print'></span> Imprimir</a>";
	echo "</div>"
	?>
    <?php
	include("pie.php");
?>