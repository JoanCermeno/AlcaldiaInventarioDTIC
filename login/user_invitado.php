<?php 
	$usuario = 'invitado';
	$clave = 'invitado';

	include_once '../conexion.php';
	session_start();
	$query_autentificacion = 'SELECT * FROM usuarios WHERE user = ?';
	$sentencia = $pdo->prepare($query_autentificacion);
	$sentencia->execute(array($usuario));
	$resultado = $sentencia->fetch();

	if($resultado){
		//evaluamos la contraseña
		if($clave = $resultado['contrasena']){
			echo "INICIADO SESSION INVITGADO";

				$_SESSION['invitado'] = $resultado['user'];
				echo $_SESSION['invitado'];
				header('location:../inicio/inicio.php');
				
		}
	}