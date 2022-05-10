<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilos_login.css">
	<title>INICIAR</title>
</head>
<body>
	<section class="container__form">

		<div class="icon"></div>

		<h2>COMUN <b>APP</b></h2>	

		<span id="iniciar">Login</span>

		<form action="validar_usuario.php" method="GET" name="login_form">	
			<input class="input__login" type="text" name="usuario" placeholder="👤️Usuario" required>
			<input  class="input__login" type="password" name="clave" placeholder="🔐️Contraseña" required>

			<span class="alert"> 
				<?php
			 		if(isset($_GET['respuesta'])){
			 			$consulta = $_GET['respuesta'];
			 			switch ($consulta) {
			 				case 'error_clave':
			 					echo "La contraseña es incorrecta";
			 					break;
			 				case 'error_user':
			 					echo 'Disculpe pero el usuario que usted ha ingresado no es valido, no existe en los registros, por favor verifique e intente de nuevo.';
			 					break;
			 				default:
			 					echo "DEJA DE JURUNGAR LA MARIQUERA ALLA ARIVA XD NO ERES HAKER NADA ";
			 					break;
			 			}
			 		}
				?> 
			</span>


			<input type="submit" id="enviar" value="Aceptar">
			<!--- EN este span vamos a mostrar los resultados de las validaciones-->
			
		</form>		
	</section>
	
</body>
</html>