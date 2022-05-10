const input_code = document.querySelector('#code_inventario');
const btn_enviar = document.querySelector('#enviar');
let code_inventario = false;
let people = false;

function readyForSend(data = 'send') {
    if (data == 'code_inventario') {
        code_inventario = true;
    }
    if (data == 'people') {
        people = true;
    }
    if (data == 'send' && code_inventario && people) {
        return true;
    } else {
        return false;
    }
}
input_code.addEventListener('keyup', function(e) {
    let longitud_input = input_code.value.length;
    if (longitud_input == 4) {
        let codeInventario = Number(input_code.value);
        if (isNaN(codeInventario)) {
            console.log("EL DATO INTRODUCIDO NO ES UN CODIGO VALIDO");
            document.querySelector('#code_inventario').style.backgroundColor = "#f009";
        } else {
            console.log("EL DATO DE CODIGO DE INVETARIO SI ES VALIDO");
            document.querySelector('#code_inventario').style.backgroundColor = "#0f09";
            readyForSend('code_inventario');
        }
    }
});
btn_enviar.addEventListener('click', e => {
    if (readyForSend()) {
        document.querySelector('.form_entrada').submit();
    } else {
        alert("Uy Falta algo, Verifica que los datos estan completos y bien escrito");
    }
});
document.querySelector('.select').addEventListener('change', (e) => {
    console.log("Hubo un cambio de estado");
    if (document.querySelector('.select').value == '') {
        document.querySelector('.select').style.backgroundColor = "#e009";
    } else {
        document.querySelector('.select').style.backgroundColor = "#0f09"
        readyForSend('people');
    }
});