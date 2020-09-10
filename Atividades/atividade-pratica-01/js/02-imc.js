function calculaIMC(){
    const peso = document.getElementById('peso').value;
    const altura = document.getElementById('altura').value;

    if(peso == '' || altura == ''){
        alert('preencher todos os campos!');
    } else{
        const imc = parseFloat(peso)/(parseFloat(altura)*parseFloat(altura));

        if(Number.isNaN(imc) || !Number.isFinite(imc)){
            alert('Favor inserir dados válidos!');
        } else{
            var resultado = '';
        
            if(imc < 18.5){
                resultado = 'Subnutrição';
            } else if(imc >= 18.5 && imc <= 24.9){
                resultado = 'Saudável';
            } else if(imc >= 25 && imc <= 29.9){
                resultado = 'Sobrepeso';
            } else if(imc >= 30 && imc <= 34.9){
                resultado = 'Obesidade grau 1';
            } else if(imc >= 35 && imc <= 39.9){
                resultado = 'Obesidade grau 2';
            } else{
                resultado = 'Obesidade grau 3';
            }
        
            document.getElementById('imc').innerText = imc.toFixed(2);
            document.getElementById('status').innerText = resultado;

            const idealmin = 18.5*(parseFloat(altura)*parseFloat(altura));
            const idealmax = 24.9*(parseFloat(altura)*parseFloat(altura));

            document.getElementById('ideal').innerText = 'Peso ideal: '+ idealmin.toFixed(2)+'kg - '+ idealmax.toFixed(2)+'kg';
        }
    }

    

}