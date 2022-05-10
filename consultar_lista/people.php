<?php 
	include_once ('../nav_bar/nav_bar.php');
	include_once ('../conexion.php');

	$sql_leer = 'SELECT * FROM people';
	$sent = $pdo->prepare($sql_leer);
	$sent->execute();
	$sql_result = $sent->fetchAll();

/*	var_dump($sql_result);*/
?>
<link rel="stylesheet" type="text/css" href="../css/tablas.css">
<div class="container__table">
	<div class="barra__busqueda">
		<label for="buscar">BUSCAR POR</label>
		<select id="type_search">
			<option></option>
			<option>Ci</option>
			<option>Nombre Completo</option>
		</select>
		<input type="text" id="input_search" placeholder="termino a buscar">
	</div>

	<table class="table">
		<div class="hidden" id="ms">No hay datos disponibles en este momento</div>
			<tr>
			    <th>CI</th>
			    <th>nombre completo</th>
			    <th>Departamento</th>
			    <th>Fecha Registro</th>
			    <th>Atendido</th>
			</tr>
		  <tr class="row">

		  </tr>

		  
	</table>

</div>
<script type="text/javascript" src="get_people.js"></script>
<script type="text/javascript" src="filter_people.js"></script>
<?php include_once '../footer/footer.php'; ?>
