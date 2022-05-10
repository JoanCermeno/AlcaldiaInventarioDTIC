<?php 
	function prueba()
	{
		$arrJson = array('id' => '1',
			'nombre' => 'fulano1',
			'apellido' => 'fulano2'
		);
		// Cabecera para que su contenido sea considerado como un objeto JSON
		header('Content-Type: application/json');
		// Retorno del array serializado como JSON
		echo json_encode( $arrJson );
	}
	
	prueba();
?>