<?php
	include("config.php");
	include("cabecera.php");

	$id = isset($_GET['id'])?$_GET['id']:'0';

	$docente = "";
	$nombre = "";
	if(!empty($id)){
		$sql = "SELECT * FROM curso WHERE curs_id='{$id}'";
		if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");
		$reg = $resultado->fetch_assoc();
		$docente = $reg['curs_doce_id'];
		$nombre = $reg['curs_nombre'];
	}

?>
<style type="text/css">
	h2{
        font-size: 150%;
    }
    p{
        font-size: 150%;
    }
</style>
<h2>Curso</h2>
<form class="form-horizontal" action="mcurso_evalua.php">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-group">
        <label for="doce_id" class="col-sm-2 control-label">Seleccione Docente</label>
        <div class="col-sm-10">
            <select name="curs_doce_id" class="form-control" id="curs_doce_id">
            	<?php 
            		$query = $mysqli->query("SELECT d.doce_id, d.doce_nombres FROM curso c JOIN docente d ON c.curs_doce_id=d.doce_id WHERE c.curs_id='{$id}'");
            		$reg = $query->fetch_assoc();
            		echo '<option value="'.$reg['doce_id'].'">'.$reg['doce_nombres'].'</option>';
            	?>
            	<?php 
            		$query = $mysqli->query("SELECT * FROM docente");
            		while ($valores = mysqli_fetch_array($query)) {
            			echo '<option value="'.$valores[doce_id].'">'.$valores[doce_nombres].'</option>';
          			}
            	?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="nombre" class="col-sm-2 control-label">Nombre del Curso</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="curs_nombre" name="curs_nombre" value="<?php echo $nombre; ?>" placeholder="Nombre">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="mcursos_listado.php" class="btn btn-danger">Cancelar</a>
        </div>
    </div>
    
</form>
<?php
	
	$sql = "SELECT c.curs_id, d.doce_nombres, c.curs_nombre FROM curso c JOIN docente d ON c.curs_doce_id=d.doce_id";
	if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");
	echo "<table class='table table-hover table-bordered'>";
	echo "<tr class='info'>";
	echo "<th>ID</th>";
	echo "<th>Nombre del Docente</th>";
	echo "<th>Nombre del Curso</th>";
	echo "<th>Opciones</th>";
	echo "</tr>";
	while ($reg = $resultado->fetch_assoc()) {
		echo "<tr>";
	    echo "<td>".$reg['curs_id']."</td>";
	    echo "<td>".$reg['doce_nombres']."</td>";
	    echo "<td>".$reg['curs_nombre']."</td>";
	    echo "<td class='text-right'>

	    	<a href='mcurso_evalua.php?op=eliminar&id=".$reg['curs_id']."' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></a>
	    	<a href='mcurso_listado.php?id=".$reg['curs_id']."' class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></a>
	    </td>";
	    echo "</tr>";
	}
	echo "</table>";
	echo "<div class='text-center'>";
	echo "<a href='mcurso_pdf.php?id=".$reg['curs_id']."' class='btn btn-warning'><span class='glyphicon glyphicon-print'></span> Imprimir PDF</a>";
	echo " <a href='#' onclick='javascript:window.print();' class='btn btn-success'><span class='glyphicon glyphicon-print'></span> Imprimir</a>";
	echo "</div>"
	?>
    <?php
	include("pie.php");
?>