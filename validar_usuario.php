<?php 
//mensaje de usuario incorrecto
$mjs_usuario_incorrecto = 'Disculpe pero el usuario que usted ha ingresado no es valido, no existe en los registros, por favor verifique e intente de nuevo.'; 
//mensaje de clave incorrecta
$msj_clave_incorrecto = 'La contraseña es incorrecta';
//mensjae de error de validacion, utilizado para verificar que no se introduzca nada extraño en los inputs del login.php
$mjs_error_validacion = '<br> Ups! Disculpe, pero los datos suministrados no son validos RECUERDE que el usuario no debe tener mas de 10 caracteres y que la clave no puede tener mas de 50 Caracteres. Error de validacion estos datos son erroneos, verifique e intente de nuevo';

	if(isset($_POST)) {
		$usuario = $_POST['usuario'];
		$clave = $_POST['clave'];

		// //Aquí comienza el bloque de codigo que valida tanto el usuario como la contraseña
		// $leng_usuario = strlen($usuario);
		// $leng_clave = strlen($clave);

		// if ($leng_usuario > 10 || $leng_usuario < 0) {
		// 	echo $mjs_error_validacion;
		// 	echo $boton_volver;
		// 	die();
		// }
		// if ($leng_clave > 50 || $leng_clave < 0) {
		// 	echo $boton_volver;
		// 	die();
		// }

		//Fin del bloque de validacion

		//buscamos que el nombre de usuario exista en la base de datos
		include_once 'conexion.php';

		$query_autentificacion = 'SELECT * FROM users WHERE user_name = ?';
		$sentencia = $pdo->prepare($query_autentificacion);
		$sentencia->execute(array($usuario));
		$resultado = $sentencia->fetch();
	

		if(!$resultado) {
			//si resultado arroja false volvemos al login.php porque el nick name no existe
			header('location:index.php?respuesta=error_user');

		}else {
			//Si resultado da true quiere decir que el usuairo existe por lo tanto pasamos a validar su contraseña
		
			if($clave == $resultado['pass']) {
				//si la clave ingresada es igual a la contraseña del usuario ingresado entonces... 
	            session_start();
				$_SESSION['admin'] = $resultado['user_name'];
				// echo $_SESSION['admin'];

				echo "USUARIO VALIDADO EXITOSAMENTE WELCOME"; 
				header('location:inicio/inicio.php');
		
			}else {
				//Si la clave no es igual que la clave del usuario entonces mostramos mensaje de clave incorrecta
				echo $msj_clave_incorrecto;
				header('location:index.php?respuesta=error_clave');
				die();

			}

		}	

	}else{
		echo "NO hay nada en por post";
	}
?>