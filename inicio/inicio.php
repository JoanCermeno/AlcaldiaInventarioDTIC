<?php 
	include_once('../conexion.php');
	include_once('../nav_bar/nav_bar.php');
?>
<link rel="stylesheet" type="text/css" href="../css/estilos_inicio.css">
<link rel="stylesheet" type="text/css" href="../css/formularios.css">
<section>
	<h2 class="welcome">Bienvenido 😇  : <b> <?php echo $_SESSION['admin'];?> </b> Bienvenido al inicio</h2>
</section>

<section class="modal_form">
	<div class="form_entrada">
		<section class="fomr_header">
			<button id="btn_close">Cerrar</button>
			<div class="title_header"><h2>Funciones Frecuentes</h2>
				<b>¿Que tipo de entrada quiere realizar?</b>
			</div>
		</section>

		<section class="container__card">
			<a href="../bienes/" class="btn">
				<h2>Registrar la entrada de un equipo</h2>
				<p>Registrar un nuevo equipo de computo o dispositivo electronico.</p>
			</a>
			<h5>O bien</h5>
			<a href="#" class="btn" >
				<h2>Retirar algun equipo</h2>
				<p>Realizar la salida de un equipo</p>
			</a>
		</section>
	</div>
</section>

<script type="text/javascript" src="filter.js"></script>
<script type="text/javascript" src="moda.js"></script>