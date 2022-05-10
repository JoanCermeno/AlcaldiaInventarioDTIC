const input_ci = document.querySelector('.ci');
const input_full_name = document.querySelector('#full_name');
const input_dpto = document.querySelector('#dpto');
const btn_enviar = document.querySelector('#enviar');
let ci = false;
let full_name = false;
let dptop = false;
function readyForSend(data = 'send') {
    if (data == 'ci') {
        ci = true;
    }
    if (data == 'full_name') {
        full_name = true;
    }
    if(data == 'dpto'){
        dptop = true;
    }
    if ((data == 'send' && ci) && (full_name && dptop)) {
        return true;
    } else {
        return false;
    }
}
input_ci.addEventListener('keyup', function(e) {
    let longitud_input = input_ci.value.length;
    if (longitud_input >= 7 && longitud_input <= 8) {
        let ciNumber = Number(input_ci.value);
        if (isNaN(ciNumber)) {
            console.log("LA CI NO ES VALIDA");
            document.querySelector('.ci').style.backgroundColor = "#f009";
        } else {
            console.log("LA CEDULA ES VALIDA");
            document.querySelector('.ci').style.backgroundColor = "#0f04";
            readyForSend('ci');
        }
    }else{
        console.log("LA CI NO ES VALIDA");
        document.querySelector('.ci').style.backgroundColor = "#f004";
    }
});


input_full_name.addEventListener('keyup', e => {
    let textoAreaDividido = input_full_name.value.split(" ");
    numeroPalabras = textoAreaDividido.length;
    if (numeroPalabras >= 3 && numeroPalabras <= 4) {
            input_full_name.style.backgroundColor = "#0f04";
            readyForSend('full_name');
    }else{
        input_full_name.style.backgroundColor = "#f004";
    }
});

input_dpto.addEventListener('keyup', e => {
    let longitud_input_dpto = input_dpto.value.length;
    if (longitud_input_dpto > 3 && longitud_input_dpto < 25) {
            input_dpto.style.backgroundColor = "#0f04";
            readyForSend('dpto');
    }else{
        input_dpto.style.backgroundColor = "#f004";
    }
});


btn_enviar.addEventListener('click', e => {
    if (readyForSend()) {
        document.querySelector('.form_entrada').submit();
    } else {
        alert("Uy Falta algo, Verifica que los datos estan completos y bien escrito");
    }
});
