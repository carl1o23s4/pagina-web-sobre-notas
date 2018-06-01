<?php
	include("config.php");
	include("cabecera.php");

	$id = isset($_GET['id'])?$_GET['id']:'0';

	$estudiante = "";
	$curso = "";
	$nota1 = "";
	$nota2 = "";
	$nota3 = "";
	if(!empty($id)){
		$sql = "SELECT * FROM notas WHERE nota_id='{$id}'";
		if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");
		$reg = $resultado->fetch_assoc();
		$estudiante = $reg['nota_estu_id'];
		$curso = $reg['nota_curs_id'];
		$nota1 = $reg['nota_nota1'];
		$nota2 = $reg['nota_nota2'];
		$nota3 = $reg['nota_nota3'];	
	}
?>
<h2>Notas</h2>
<form class="form-horizontal" action="mnota_evalua.php">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
    
    <div class="form-group">
    <label for="doce_id" class="col-sm-2 control-label">Seleccione Curso</label>
	    <div class="col-sm-10">
	        <select name="nota_curs_id" class="form-control" id="nota_curs_id">
	        	<?php 
	        		$query = $mysqli->query("SELECT c.curs_id,c.curs_nombre FROM notas n JOIN curso c ON c.curs_id = n.nota_curs_id WHERE n.nota_id='{$id}'");
	        		$reg = $query->fetch_assoc();
	        		echo '<option value="'.$reg['curs_id'].'">'.$reg['curs_nombre'].'</option>';
	        	?>
	        	<?php 
	        		$query = $mysqli->query("SELECT * FROM curso");
	        		while ($valores = mysqli_fetch_array($query)) {
	        			echo '<option value="'.$valores[curs_id].'">'.$valores[curs_nombre].'</option>';
	      			}
	        	?>
	        </select>
	    </div>
    </div>
    <div class="form-group">
    <label for="doce_id" class="col-sm-2 control-label">Seleccione Estudiante </label></label></label>
	    <div class="col-sm-10">
	        <select name="nota_estu_id" class="form-control" id="nota_estu_id">
	        	<?php 
	        		$query = $mysqli->query("SELECT e.estu_id,e.estu_nombre FROM notas n JOIN estudiante e ON e.estu_id = n.nota_estu_id WHERE n.nota_id='{$id}'");
	        		$reg = $query->fetch_assoc();
	        		echo '<option value="'.$reg['estu_id'].'">'.$reg['estu_nombre'].'</option>';
	        	?>
	        	<?php 
	        		$query = $mysqli->query("SELECT * FROM estudiante");
	        		while ($valores = mysqli_fetch_array($query)) {
	        			echo '<option value="'.$valores[estu_id].'">'.$valores[estu_nombre].'</option>';
	      			}
	        	?>
	        </select>
	    </div>
    </div>
    <div class="form-group">
        <label for="nota1" class="col-sm-2 control-label">Nota1</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nota_nota1" name="nota_nota1" value="<?php echo $nota1; ?>" placeholder="Nota1">
        </div>
    </div>
    <div class="form-group">
        <label for="nota2" class="col-sm-2 control-label">Nota2</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nota_nota2" name="nota_nota2" value="<?php echo $nota2; ?>" placeholder="Nota2">
        </div>
    </div>
    <div class="form-group">
        <label for="nota3" class="col-sm-2 control-label">Nota3</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nota_nota3" name="nota_nota3" value="<?php echo $nota3; ?>" placeholder="Nota3">
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
	
	$sql = "SELECT n.nota_id, e.estu_nombre, c.curs_nombre, n.nota_nota1, n.nota_nota2, n.nota_nota3 FROM notas n JOIN estudiante e ON e.estu_id=n.nota_estu_id JOIN curso c ON c.curs_id = n.nota_curs_id";
	if (!$resultado = $mysqli->query($sql)) die("Error en la consulta");
	echo "<table class='table table-hover table-bordered'>";
	echo "<tr class='info'>";
	echo "<th>ID</th>";
	echo "<th>Estudiante</th>";
	echo "<th>Curso</th>";
	echo "<th>Nota1</th>";
	echo "<th>Nota2</th>";
	echo "<th>Nota3</th>";
	echo "<th>Opciones</th>";
	echo "</tr>";
	while ($reg = $resultado->fetch_assoc()) {
		echo "<tr>";
	    echo "<td>".$reg['nota_id']."</td>";
	    echo "<td>".$reg['estu_nombre']."</td>";
	    echo "<td>".$reg['curs_nombre']."</td>";
	    echo "<td>".$reg['nota_nota1']."</td>";
	    echo "<td>".$reg['nota_nota2']."</td>";
	    echo "<td>".$reg['nota_nota3']."</td>";
	    echo "<td class='text-right'>

	    	<a href='mnota_evalua.php?op=eliminar&id=".$reg['nota_id']."' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span></a>
	    	<a href='mnota_listado.php?id=".$reg['nota_id']."' class='btn btn-success'><span class='glyphicon glyphicon-pencil'></span></a>
			<a href='mnota_listado.php?id=".$reg['nota_id']."' class='btn btn-success'><span class='glyphicon glyphicon-chevron-down'></span></a>  
	    </td>";

	    echo "</tr>";
	}
	echo "</table>";
	echo "<div class='text-center'>";
	echo "<a href='mnota_pdf.php?id=".$reg['nota_id']."' class='btn btn-warning'><span class='glyphicon glyphicon-print'></span> Imprimir PDF</a>";
	echo " <a href='#' onclick='javascript:window.print();' class='btn btn-success'><span class='glyphicon glyphicon-print'></span> Imprimir</a>";
	echo "</div>"
	?>
    <?php
	include("pie.php");
?>