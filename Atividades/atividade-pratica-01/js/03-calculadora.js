var text = '0';

var lcd = null;

window.onload = ()=>{
    lcd = document.getElementById('lcd');
    imprime(text);
}

function adicionaDigito(digito){
    if(text == '0'){
        text = ''+digito;
    } else{
        text += digito;
    }

    imprime(text);
}

function deletaDigito(){
    text = text.slice(0, -1);

    if(text == ''){
        text = '0';
    }

    imprime(text);
}

function limpaTela(){
    text = '0';

    imprime(text);
}

function calcula(){
    try {
        text = ''+eval(text);
        imprime(text);
    } catch (error) {
        text = '0';
        imprime('Invalido');
    }    
}

function imprime(texto){
    if(texto.length > 14){
        texto = texto.slice(0, 14-text.length);
        text = texto;
    }

    if(texto == 'NaN' || texto == 'Infinity'){
        text = '0';
        texto = 'Inválido';
    }

    lcd.innerText = texto;
}