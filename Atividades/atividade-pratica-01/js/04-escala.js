function validar(campo){

    if(campo.value.length == 0 || isNaN(parseInt(campo.value))){
        window.alert('Favor preencher corretamente os campos!');
        campo.value = '';
        campo.focus();
        return false;
    }

    return true;

}

function calcula(){
    
    if(validar(document.dados.amplitude) && validar(document.dados.dT)){
        var a = parseFloat(document.dados.amplitude.value);
        var dT = parseFloat(document.dados.dT.value);
    
        var m = Math.log10(a) + (3*(Math.log10((8*dT))))-2.92
    
        document.getElementById('valor').innerText = m.toPrecision(4);

        // Referência dos textos abaixo: https://pt.wikipedia.org/wiki/Escala_de_Richter

        var descricao = '';
        var resultado = '';

        if(m < 2){
            resultado = 'Microssismo';
            descricao = 'Microssismos não perceptíveis pelos humanos.';
        } else if(m >= 2 && m <3){
            resultado = 'Muito pequeno';
            descricao = 'Geralmente não sentido, apenas detectado/registado por sismógrafos.';
        } else if(m >= 3 && m <4){
            resultado = 'Pequeno';
            descricao = 'Frequentemente sentido, mas raramente causa danos.';
        } else if(m >= 4 && m <5){
            resultado = 'Ligeiro';
            descricao = 'Tremor notório de objetos no interior de habitações, ruídos de choque entre objetos. Sismo significativo, mas com danos importantes improváveis.';
        } else if(m >= 5 && m <6){
            resultado = 'Moderado';
            descricao = 'Pode causar danos importantes em edifícios mal concebidos e em zonas restritas. Provoca apenas danos ligeiros em edifícios bem construídos.';
        } else if(m >= 6 && m <7){
            resultado = 'Forte';
            descricao = 'Pode ser destruidor em áreas habitadas num raio de até 160 quilômetros em torno do epicentro.';
        } else if(m >= 7 && m <8){
            resultado = 'Grande';
            descricao = 'Pode provocar danos graves em zonas vastas.';
        } else if(m >= 8 && m <9){
            resultado = 'Muito Grande';
            descricao = 'Pode causar danos sérios num raio de várias centenas de quilómetros em torno do epicentro.';
        } else if(m >= 9 && m <10){
            resultado = 'Excepcional';
            descricao = 'Devasta zonas num raio de milhares de quilómetros em torno do epicentro.';
        } else{
            resultado = 'Extremo';
            descricao = 'Desconhecido. Na história conhecida nunca foi registado um sismo desta magnitude.';
        }
        
        document.getElementById('resultado').innerText = resultado;
        document.getElementById('descricao').innerText = descricao;


    }

}