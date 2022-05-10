<?php 
	session_start();
	include_once '../conexion.php';

	$ci = $_POST['ci'];
	$full_name = $_POST['full_name'];
	$dpto = $_POST['dpto'];
	//REVISAMOS EN LA VARIABLE SESSIONA VER QUIEN ES EL USUARIO QUE ESTA AUTORIZANDO ESTA OPERACION
	//Y BUSCAMOS SU IDENTIFICADOR UNICO EN LA DB
	
	$sql = 'SELECT id FROM users WHERE user_name = ?';
	$query_run = $pdo -> prepare($sql);
	$query_run->execute(array($_SESSION['admin']));
	$query_executed = $query_run->fetch();
	$id_user = $query_executed['id'];
	
	

	//BUscamos en la db que no exista esa misma persona
	$sql = 'SELECT * FROM people WHERE ci = ?';
	$query_run = $pdo -> prepare($sql);
	$query_run->execute(array($ci));
	$query_executed = $query_run->fetch(); 
	//si el resultado es verdadero quiere decir que la persona ya se encuentra registrada
		// echo "<pre>";
		// var_dump($query_executed);
		// echo "</pre>";
if(!$query_executed){
			$sql = 'INSERT INTO people (
				ci, 
				full_name,
				dpto,
				id_user) VALUES (
				:ci,
				:full_name,
				:dpto,
				:id_user
				)';
			$query_run = $pdo -> prepare($sql);
			$data = [
				':ci' => $ci,
				':full_name' => $full_name,
				':dpto' => $dpto,
				':id_user' => $id_user,
			];

			$query_executed = $query_run->execute($data);	
			// echo "<pre>";
			// var_dump($query_executed);
			// echo "</pre>";

			if($query_executed){
				header('location:index.php?response=200&&ci='.$ci);
			}

		}else{
			//NOMENCLATURA DE ERRORES;
			//1 -> Usuario ya existente
			header('location:index.php?response=1&&ci='.$ci);
	}

?>