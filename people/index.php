<?php 
	include_once '../nav_bar/nav_bar.php';
?>
<link rel="stylesheet" type="text/css" href="../css/formularios.css">
<link rel="stylesheet" type="text/css" href="../css/modal.css">

<br>
<form class="form_entrada" onsubmit="return false" method="POST" name="add_people" action="validar_people.php">
	<section class="fomr_header">
		<h2>Registro de nuevo ciudadano</h2>
		<p>Por favor ingrese todos los datos del ciudadano</p>
	</section>
		
		<label>Cedula de Identidad</label>
		<input type="number" class="ci" name="ci" required placeholder="Ci">
		<small>*Este campo es obligatorio</small>

		<label>Nombre Completo</label>
		<input type="text" id="full_name" name="full_name" maxlength="40" required placeholder="Ejemplo-. PEDRO PERNIAS PEREZ PERAZA">
		<small>*Typee el nombre completo del ciudadano en este campo</small>


		<label>Departamento</label>
		<input type="text" name="dpto" id="dpto" placeholder="Ejemplo-. ingeniería municipal" required spellcheck="true" maxlength="20">
		<small>*¿A que departamento pertenece el ciudadano?</small>

		<input type="submit" id="enviar" name="enviar" value="Enviar">
</form>
<?php
	if(isset($_GET['response'])){
		switch ($_GET['response']) {
			case '1':echo '
					<div class="alert"> 
					<section class="modal">
					<h1>Respuesta del servidor</h1>
					<br>
					<section class="body_modal">
					<p><b>Error!</b> Hubo un problema al registrar a la persona:'.$_GET['ci'] . ' <b>Ya se encuntra registrado o algun dato esta mal.</b></p>
					</section>
					<button class="btn_close">Ok</button>
					</section>	
					</div>
					';
					break;
			case '200' : echo '
					<div class="alert"> 
					<section class="modal">
					<h1>Respuesta del servidor</h1>
					<br>
					<section class="body_modal">
					<p><b>EXISOTO!</b>La persona con CI:'.$_GET['ci'] . ' <b>Ha sido registrado!</b></p>
					</section>
					<button class="btn_close">Ok</button>
					</section>	
					</div>


			    ';
			    break;
					default:
					echo "CODIGO DE ERRO DESCONOCIDO";
					break;
		}
	}
?> 
<script type="text/javascript" src="validar_form.js"></script>
<script type="text/javascript" src="moda.js"></script>

<?php 
	include_once '../footer/footer.php';
?>