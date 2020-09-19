function validar(campo){

    if(campo.value.length == 0 || isNaN(parseInt(campo.value))){
        window.alert('Favor preencher corretamente os campos!');
        campo.value = '';
        campo.focus();
        return false;
    }

    return true;

}

function calcular(){

    if(validar(document.dados.valor1) && validar(document.dados.valor2)){
        let resultado = parseInt(document.dados.valor1.value) + parseInt(document.dados.valor2.value);

        document.dados.resultado.value = resultado;
    }

}