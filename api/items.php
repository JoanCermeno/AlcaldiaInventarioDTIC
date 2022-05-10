 <?php 
	include_once '../conexion.php';

	//Buscar todo los items
	$sql = 'SELECT * FROM items';
	$query = $pdo -> prepare($sql);
	$query->execute();
	$resultado = $query->fetchAll(); 

	function devolver_items($allItems)
	{

		 $arrJson = $allItems;
		// Cabecera para que su contenido sea considerado como un objeto JSON
		header('Content-Type: application/json');
		// Retorno del array serializado como JSON
		echo json_encode( $arrJson );

		return json_encode( $arrJson );
	}
	
	devolver_items($resultado);

?>