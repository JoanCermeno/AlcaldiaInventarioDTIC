/*SE MNDA EL PARAMETRO clear PARA SABER SI SE VA A CONCATENAR UNA NUEVA FILA O SI SE VAN A OCULTAR LAS EXISTENTES*/
const fila = document.querySelector('.table');
const pait_row = (n, get = false) => {
	/*	n ES EL NUEMERO DE ELMENTOS DENTRO DEL JSON DEUVELTA POR LA API*/
	if (n == 0) {
		document.querySelector('#ms').classList.remove('hidden');
	} else {
		for (let i = 0; i < n.length; i++) {

			if (n[i].date_out == null) {
				n[i].date_out = 'No ha salido';
			}
			if (n[i].code_inventario == get) {
				//SOLO ME PINTARA UNA FILA
				fila.innerHTML = `
					<tr>
					    <th>Codigo de invetanrio</th>
					    <th>Marca y modelo del equipo</th>
					    <th>Description</th>
					    <th>Fecha de entrada</th>
					    <th>Fecha de salida</th>
					    <th>Entregado por</th>
					</tr>
					<tr class="row">
						<td><a href="?ed=${n[i].code_inventario}" class="get"> ${n[i].code_inventario}</a></td>
				    	<td>${n[i].name}</td>
				    	<td>${n[i].description}</td>
				    	<td>${n[i].date_int}</td>
				    	<td>${n[i].date_out}</td>
				    	<td> <a href="people.php?ed=${n[i].ci_people}"> ${n[i].ci_people} </a> </td>
					</tr>`;
				break;
			} else {
				
				fila.innerHTML += `
					<tr class="row">
						<td><a href="?ed=${n[i].code_inventario}" class="get"> ${n[i].code_inventario}</a></td>
				    	<td>${n[i].name}</td>
				    	<td>${n[i].description}</td>
				    	<td>${n[i].date_int}</td>
				    	<td>${n[i].date_out}</td>
				    	<td> <a href="people.php?ed=${n[i].ci_people}">${n[i].ci_people} </a> </td>
					</tr>`;

			}
		}
	}
}



///PETICION A LA API PARA OBTENER UN ARREGLO CON TODOS LOS ITEMS
fetch('../api/items.php')
	.then(response => response.json())
	.then(AllItems => {
		let get = document.URL.search('=');
		let get_value = false;
		if(get == -1){
			console.log("NO SE HA DETECTADO NINGUN = EN LA URL");
		}else{
			get_value = document.URL.slice(get+1);
		}
		if (get_value) {
			console.log("SI EXITE GET" + get_value);
			pait_row(AllItems, get_value);
		} else {
			console.log("COMO GET NO EXISTE PINTAMOS LA TABLA");
			pait_row(AllItems);
		}
	})
	.catch(err => console.log(err))
