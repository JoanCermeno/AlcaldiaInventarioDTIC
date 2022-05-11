<?php 	
	session_start();
	if(!isset($_SESSION['admin'])){
		header('location:../index.php');
	} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf‐8">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript" src="../nav_bar/mostrar_menu.js"></script>

</head>
<body>
	<!-- menu de navegacion  -->
	<header class="Desktop">
		<ul>
			<input type="checkbox" id="check">
			<label class="btn_menu" for="check" onclick="mostrar('hola')">
				<div class="bar_menu"></div>
				<div class="bar_menu"></div>
				<div class="bar_menu"></div>
			</label>
			<span class="title" class="ocultar" ><b>APP</b></span>
			<div class="info__user">				
				<div class="name_profile"> 
					<?php
						echo $_SESSION['admin']; 
					?>
				</div>
			</div>
		</ul>
		<nav class="ocultar" class="nav_opciones" id="slider">	
			<li><a href="../index.php" class="btn__opc">Inicio</a></li>
			<div class="separador"> <span>Nuevo</span> </div>
			<li><a href="../people/" class="btn__opc">Agregar Persona</a></li>
			<li><a href="../bienes/" class="btn__opc">Agregar Equipo</a></li>
			<div class="separador"> <span>Consultas</span> </div>

 			<li><a href="../consultar_lista/people.php" class="btn__opc">Lista de personas</a></li>
			<li><a href="../consultar_lista/items.php" class="btn__opc">Lista de equipos</a></li>
			<div class="separador"> <span></span> </div>
			<li><a href="#" class="btn__opc">Usuarios</a></li>
			<li><a href="../salir.php" class="btn__opc">Salir</a></li>
		</nav>
	</header>

	<!-- END menu de navegacion  -->
