/* Este es el filter de los items */
const input_search = document.querySelector('#input_search');
const tabla = document.querySelector('.table');
const type_search = document.querySelector('#type_search');

const endpoint = '../api/items.php';
const items = [];
console.log(items);
fetch(endpoint)
    .then(blob => blob.json())
    .then(data => items.push(...data));
console.log(items);

const buscarBy = (type) => {
    input_search.addEventListener('keyup', e => {
        let texto_buscado = e.target.value;
        let encontrado = 0;
        if(type == 'Codigo de invetario'){     
            encontrado = items.filter(equipo => equipo.code_inventario.includes(texto_buscado));
            tabla.innerHTML = '';
            tabla.innerHTML = `<tr>
                <th>Codigo de invetanrio</th>
                <th>Marca y modelo del equipo</th>
                <th>Description</th>
                <th>Fecha de entrada</th>
                <th>Fecha de salida</th>
                <th>Responsable</th>
                </tr>`;
            encontrado.forEach(equipo => {
                tabla.innerHTML += `
                <tr class="row">
                <td><a href="?ed=${equipo.code_inventario}" class="get"> ${equipo.code_inventario}</a></td>
                <td>${equipo.name}</td>
                <td>${equipo.description}</td>
                <td>${equipo.date_int}</td>
                <td>${equipo.date_out}</td>
                <td>${equipo.ci_people}</td>
            </tr>`;
            });
        }else{
            console.log("Se esta buscadno ahora por nombre");
            encontrado = items.filter(equipo => equipo.name.includes(texto_buscado));
            console.log(encontrado);
            tabla.innerHTML = '';
            tabla.innerHTML = `<thead>
                <th>Codigo de invetanrio</th>
                <th>Marca y modelo del equipo</th>
                <th>Description</th>
                <th>Fecha de entrada</th>
                <th>Fecha de salida</th>
                <th>Responsable</th>
                </thead>`;
            encontrado.forEach(equipo => {
                tabla.innerHTML += `
                <tr class="row">
                <td><a href="?ed=${equipo.code_inventario}" class="get"> ${equipo.code_inventario}</a></td>
                <td>${equipo.name}</td>
                <td>${equipo.description}</td>
                <td>${equipo.date_int}</td>
                <td>${equipo.date_out}</td>
                <td>${equipo.ci_people}</td>`
            });
        }  
    });
}

type_search.addEventListener('change', (e) =>{
    let type_serach = e.target.value;
    buscarBy(type_serach);
});
