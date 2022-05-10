<?php 	
	session_start();
	if(isset($_SESSION['admin'])){
		header('location:inicio/inicio.php');
	} 
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link rel="stylesheet" type="text/css" href="css/estilos_login.css">
       <title>Bienvenido</title>
    </head>
    <body>
        <section>
            <div class="area_left">
                <h2>
                    Sistema INtegrado de bienes Departamento de infomratica
                </h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	             </p>
            </div>
            <div class="area_right">
			<form action="validar_usuario.php" method="POST" name="login_form">	
			<div class="header_form">
				<h2>SEGIN</h2>
				<p>Ingrese sus credenciales para iniciar session, si no sabe cuales son pongase en contacto con el administrador de sistema</p>
			</div>
			<input class="input__login" type="text" name="usuario" placeholder="👤️Usuario" required>
			<input  class="input__login" type="password" name="clave" placeholder="🔐️Contraseña" required>

			<span class="alert"> 
				<?php
			 		if(isset($_GET['respuesta'])){
			 			$consulta = $_GET['respuesta'];
			 			switch ($consulta) {
			 				case 'error_clave':
			 					echo '<p class="bad_clave">Contraseña incorrecta</p>';
			 					break;
			 				case 'error_user':
			 					echo 'Disculpe pero el usuario que usted ha ingresado no es valido, no existe en los registros, por favor verifique e intente de nuevo.';
			 					break;
			 				default:
			 					echo "Hey no hagas eso";
			 					break;
			 			}
			 		}
				?> 
			</span>


			<input type="submit" id="enviar" value="Entrar">
			<!--- EN este span vamos a mostrar los resultados de las validaciones-->
			
		</form>		
            </div>
        </section>
    </body>
</html>
