/*SE MNDA EL PARAMETRO clear PARA SABER SI SE VA A CONCATENAR UNA NUEVA FILA O SI SE VAN A OCULTAR LAS EXISTENTES*/
const fila = document.querySelector('.table');

const pait_row = (n, get = false) => {
	/*	n ES EL NUEMERO DE ELMENTOS DENTRO DEL JSON DEUVELTA POR LA API*/
	console.log(n);
	if (n == 0) {
		document.querySelector('#ms').classList.remove('hidden');
	} else {
		for (let i = 0; i < n.length; i++) {
			if (n[i].id == get) {
				//SOLO ME PINTARA UNA FILA
				fila.innerHTML = `
					<tr>
						<th>ID</th>
						<th>Nombre de usuario</th>
						<th>Descriccion</th>
					</tr>
					<tr class="row">
						<td><a href="?ed=${n[i].id}" class="get"> ${n[i].id}</a></td>
				    	<td>${n[i].user_name}</td>	
				    	<td>${n[i].about_user}</td>

					</tr>`;
				break;
			} else {
				fila.innerHTML += `
				<tr class="row">
					<td><a href="?ed=${n[i].id}" class="get"> ${n[i].id}</a></td>
					<td>${n[i].user_name}</td>	
					<td>${n[i].about_user}</td>
				</tr>`;
			}
		}
	}
}



///PETICION A LA API PARA OBTENER UN ARREGLO CON TODOS LOS USUSARIOS
fetch('../api/users.php')
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
