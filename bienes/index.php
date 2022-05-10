<?php include_once '../nav_bar/nav_bar.php';?>
<link rel="stylesheet" type="text/css" href="../css/formularios.css">
<link rel="stylesheet" type="text/css" href="../css/modal.css">

<!-- <section class="welcome_bines">
		<h2>Bienvenido a bienes</h2>
		<p>En este modulo del sistema podra ingresar nuevas entradas a equipos de computo y dispositivos electronicos, asi como su correcta validadcion para su posterior consulta</p>
	</section> -->
<?php
	if(isset($_GET['response'])){
		switch ($_GET['response']) {
			case '1':echo '
					<div class="alert"> 
					<section class="modal">
					<h1>Respuesta del servidor</h1>
					<br>
					<section class="body_modal">
					<p><b>Fallido!</b> Hubo un problema al registrar Este equipo:'.$_GET['code_inventario'] . ' <b>Ya se encuntra registrado o alguno de los datos suminstrados esta mal.</b></p>
					</section>
					<button class="btn_close">Aceptar</button>
					</section>	
					</div>
					<script type="text/javascript" src="modal.js"></script>
					
					';
					break;
			case '200' : echo '
					<div class="alert"> 
					<section class="modal">
					<h1>Respuesta del servidor</h1>
					<br>
					<section class="body_modal">
					<p><b>EXISOTO!</b> El Equipo Numero:'.$_GET['code_inventario'] .' <b>Ha sido registrado!</b></p>
					</section>
					<button class="btn_close">Aceptar</button>
					</section>	
					</div>
<script type="text/javascript" src="modal.js"></script>
			    ';
			    break;
					default:
					echo "CODIGO DE ERRO DESCONOCIDO";
					break;
		}
	}
?>
<form class="form_entrada" onsubmit="return false" method="GET" name="bienes_ingreso" action="validar_bienes.php">
	<section class="fomr_header">
		<h2>Nueva Reception</h2>
	</section>
		
		<label>Marca y modelo del equipo a ingresar</label>
		<input type="text" name="marca_modelo" required placeholder="Marca y modelo del equipo">
		<small>*Espesificar el modelo y la marca del equipo que se esta entregando</small>

		<label>Codigo de invetario</label>
		<input type="text" id="code_inventario" name="code_inventario" maxlength="4" required placeholder="Codigo del equipo">
		<small>*Revice el equipo y busque el codigo de inventario que tiene asignado</small>


		<label>Descripción del equipo</label>
		<textarea name="description_item" placeholder="De una breve Descripción de las falla o el porque se esta haciendo entrega este equipo" autocomplete="on" maxlength="255" required spellcheck="true"></textarea>
		<small>*Espesifique la falla que presenta el equipo</small>

		<label>Hace entrega el ciudada@</label>
		<select id="peoples" name="people" class="select">
			<option id="op_null"></option>
		</select>

		<input type="submit" id="enviar" name="enviar" value="Enviar">
</form>
<script type="text/javascript" src="validar_form.js"></script>
<script type="text/javascript" src="filter.js"></script>

<?php 
	include_once '../footer/footer.php';
?>