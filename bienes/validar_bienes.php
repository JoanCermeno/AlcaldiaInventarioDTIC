<?php 
	$marca_modelo = $_GET['marca_modelo'];
	$code_inventario = $_GET['code_inventario'];
	$description_item = $_GET['description_item'];
	$people = $_GET['people'];
	$ci = intval(preg_replace('/[^0-9]+/', '', $people), 10);
	
	include_once '../conexion.php';

		//buscando que con esta consulta, para verificar que el equipo que se esta ingresando  no exista en la db
		$sql = 'SELECT * FROM items WHERE code_inventario = ?';
		$query = $pdo -> prepare($sql);
		$query->execute(array($code_inventario));
		$resultado = $query->fetch(); 
		//si el resultado es verdadero quiere decir que el equipo ya se encuentra registrado
		// echo "<pre>";
		// var_dump($resultado);
		// echo "</pre>";


		if(!$resultado){
			$sql = 'INSERT INTO items (
				id, 
				name,
				description,
				code_inventario,
				ci_people) VALUES (
				:id,
				:name,
				:description,
				:code_inventario,
				:ci_people
				)';
			$query_run = $pdo -> prepare($sql);
			$data = [
				':id' => null,
				':name' => $marca_modelo,
				':description' => $description_item,
				':code_inventario' => $code_inventario,
				':ci_people' => $ci,
			];

			$query_executed = $query_run->execute($data);	
			/*echo "<pre>";
			var_dump($query_executed);
			echo "</pre>";*/
			if($query_executed){
				header('location:index.php?response=200&&code_inventario='.$code_inventario);
			}

		}else{
			echo "<br> EL EQUIPO con codigo de invetario NUMERO: " . $code_inventario . "YA SE ENCUENTRA REGISTRADO, ASI QUE NO ES POSIBLE VOLVER A INGRESARLO";
		/*	0 -> ok
			1-> Error equipo registrado
			2 -> Error */
			header('location:index.php?response=1&&code_inventario');
		}	

?>