<?php  
//conexion
	$enlace = 'mysql:dbname=bienes;host=localhost';
	$user = 'root';
	$pass = '';
	try {
		$pdo = new PDO($enlace,$user,$pass);
			// echo "conexion realziada con exito";
			

		} catch (PDOException $e) {
			print 'ERROR';
			echo "Error al conectar con la base de datos ";	
		}
?>