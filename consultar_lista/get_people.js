/*SE MNDA EL PARAMETRO clear PARA SABER SI SE VA A CONCATENAR UNA NUEVA FILA O SI SE VAN A OCULTAR LAS EXISTENTES*/
const fila = document.querySelector('.table');
const container_btn = document.querySelector('.container_btn');



const pait_row = (n, get = false) => {
	/*	n ES EL NUEMERO DE ELMENTOS DENTRO DEL JSON DEUVELTA POR LA API*/
	if (n == 0) {
		document.querySelector('#ms').classList.remove('hidden');
	} else {
		for (let i = 0; i < n.length; i++) {
			if (n[i].ci == get) {
				//SOLO ME PINTARA UNA FILA
				fila.innerHTML = `
					<tr>
					    <th>CI</th>
					    <th>Nombre Completo</th>
					    <th>Departamento</th>
					    <th>Registrado</th>
					    <th>Responsable</th>
					</tr>
					<tr class="row">
						<td><a href="?ed=${n[i].ci}" class="get"> ${n[i].ci}</a></td>
				    	<td>${n[i].full_name}</td>
				    	<td>${n[i].dpto}</td>
				    	<td>${n[i].date_created}</td>
						<td> <a href="users.php?id_user=${n[i].id_user}" class="get" >${n[i].id_user}</a></td>
					</tr>`;
				break;
			} else {
				fila.innerHTML += `
					<tr class="row">
						<td><a href="?ed=${n[i].ci}" class="get"> ${n[i].ci}</a></td>
				    	<td>${n[i].full_name}</td>
				    	<td>${n[i].dpto}</td>
				    	<td>${n[i].date_created}</td>
						<td> <a href="users.php?id_user=${n[i].id_user}" class="get"> ${n[i].id_user} </a></td>
					</tr>`;

			}
		}
	}
}



///PETICION A LA API PARA OBTENER UN ARREGLO CON TODOS LOS ITEMS
fetch('../api/people.php')
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
			// rutina para crear los botones de editar y eliminair people
			container_btn.innerHTML = `<a href="../api/editar_people.php" class="btn edit">Editar</a>
			<a href="#" class="btn delate">Eliminar</a>`;
			pait_row(AllItems, get_value);
		} else {
			console.log("COMO GET NO EXISTE PINTAMOS LA TABLA");
			pait_row(AllItems);
		}
	})
	.catch(err => console.log(err))
