<?php 
	include_once '../conexion.php';

	$sql_leer = 'SELECT * FROM users';
	$sent = $pdo->prepare($sql_leer);
	$sent->execute();
	$sql_result = $sent->fetchAll();

/*	var_dump($sql_result);*/

	function devolver_usuarios($allItems)
	{

		 $arrJson = $allItems;
		// Cabecera para que su contenido sea considerado como un objeto JSON
		header('Content-Type: application/json');
		// Retorno del array serializado como JSON
		echo json_encode( $arrJson );

		return json_encode( $arrJson );
	}
	
	devolver_usuarios($sql_result);

?>