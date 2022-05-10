/* Este es el filter de los items */
const input_search = document.querySelector('#input_search');
const tabla = document.querySelector('.table');
const type_search = document.querySelector('#type_search');

const endpoint = '../api/people.php';
const people = [];

fetch(endpoint)
    .then(blob => blob.json())
    .then(data => people.push(...data));


const buscarBy = (type) => {
    input_search.addEventListener('keyup', e => {
        let texto_buscado = e.target.value;
        let encontrado = 0;
        if(type == 'Ci'){     
            encontrado = people.filter(persona => persona.ci.includes(texto_buscado));
            tabla.innerHTML = '';
            tabla.innerHTML = `<tr>
                <th>Ci</th>
                <th>Nombre Completo</th>
                <th>Departamento</th>
                <th>Fecha de registro</th>
                <th>Responsable</th>
                </tr>`;
            encontrado.forEach(persona => {
                tabla.innerHTML += `
                <tr class="row">
                <td><a href="?ed=${persona.ci}" class="get"> ${persona.ci}</a></td>
                <td>${persona.full_name}</td>
                <td>${persona.dpto}</td>
                <td>${persona.date_created}</td>
                <td>${persona.id_user}</td>
            </tr>`;
            });
        }else{
            console.log("Se esta buscadno ahora por nombre");
            encontrado = people.filter(persona => persona.full_name.includes(texto_buscado));
            console.log(encontrado);
            tabla.innerHTML = '';
            tabla.innerHTML = `<tr>
                <th>Ci</th>
                <th>Nombre Completo</th>
                <th>Departamento</th>
                <th>Fecha de registro</th>
                <th>Responsable</th>
                </tr>`
            encontrado.forEach(persona => {
                tabla.innerHTML += `
                <tr class="row">
                    <td><a href="?ed=${persona.ci}" class="get"> ${persona.ci}</a></td>
                    <td>${persona.full_name}</td>
                    <td>${persona.dpto}</td>
                    <td>${persona.date_created}</td>
                    <td> <a href="users.php?id_user=${persona.id_user}">${persona.id_user}</a></td>
                </tr>`; 
            });
        }  
    });
}

type_search.addEventListener('change', (e) =>{
    let type_serach = e.target.value;
    buscarBy(type_serach);
});
