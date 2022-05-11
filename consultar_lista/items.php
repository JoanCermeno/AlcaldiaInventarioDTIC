<?php 
	include_once ('../nav_bar/nav_bar.php');
?>
<link rel="stylesheet" type="text/css" href="../css/tablas.css">
<link rel="stylesheet" type="text/css" href="../css/btn.css">
<div class="container__table">
	<div class="barra__busqueda">
		<label for="buscar">BUSCAR POR</label>
		<select id="type_search">
			<option></option>
			<option>Codigo de invetario</option>
			<option>Nombre del equipo</option>
		</select>
		<input type="text" id="input_search" name="buscar" placeholder="Buscar...">
	</div>

	<table class="table">
		<div class="hidden" id="ms">No hay datos disponibles en este momento</div>
			<tr>
			    <th>Codigo de invetanrio</th>
			    <th>Marca y modelo del equipo</th>
			    <th>Description</th>
			    <th>Fecha de entrada</th>
			    <th>Fecha de salida</th>
			    <th>Responsable</th>
			</tr>
		  <tr class="row">
		  	
		  </tr>
	</table>
	<div class="container_btn"></div>
</div>


<script type="text/javascript" src="get_items.js"></script>
<script type="text/javascript" src="filter.js"></script>

<?php include_once '../footer/footer.php'; ?>
