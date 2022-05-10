 <?php 
	include_once '../conexion.php';

	//Buscando a todas las personas registradas en la db
	$sql = 'SELECT * FROM people';
	$query = $pdo -> prepare($sql);
	$query->execute();
	$resultado = $query->fetchAll(); 

	function devolver_personas($allPeople)
	{

		 $arrJson = $allPeople;
		// Cabecera para que su contenido sea considerado como un objeto JSON
		header('Content-Type: application/json');
		// Retorno del array serializado como JSON
		echo json_encode( $arrJson );

		return json_encode( $arrJson );
	}
	
	devolver_personas($resultado);

?>