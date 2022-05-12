<?php
	if(isset($_GET['response'])){
		switch ($_GET['response']) {
			case '1':echo '';
					break;
			case '200' : echo '';
			    break;
					default:
					echo "CODIGO DE ERRO DESCONOCIDO";
					break;
		}
	}
?>
<link rel="stylesheet" href="../css/formularios.css">
<form class="form_entrada"  method="POST" action="">
	<section class="fomr_header">
		<h2>Editar el equipo <?php echo $item_to_edit["code_inventario"]?> </h2>
	</section>
		
		<label>Marca y modelo del equipo</label>
		<input type="text" name="marca_modelo" required value="<?php echo $item_to_edit["name"]?>">
		<small>*Espesificar el modelo y la marca del equipo que se esta entregando</small>

		<label>Codigo de invetario</label>
		<input type="text" id="code_inventario" name="code_inventario" maxlength="4" required value="<?php echo $item_to_edit["code_inventario"]?>">
		<small>*Revice el equipo y busque el codigo de inventario que tiene asignado</small>


		<label>Descripción del equipo</label>
		<textarea name="description_item" maxlength="255" required><?php echo $item_to_edit["description"]?> </textarea>
		<small>*Espesifique la falla que presenta el equipo</small>
		<input type="submit" id="enviar" name="enviar" value="EDITAR!">
</form>
