function Competidor(indice, nome, tempo){
    this.indice = indice;
    this.nome = nome;
    this.tempo = tempo;
}

var competidores = [];

function adicionaCompetidor(){
    document.getElementById('resultado').style.display = 'none';
    if(document.getElementById('nome').value == '' || document.getElementById('tempo').value == ''){
        alert('Favor preencher todos os campos!');
    } else{

        competidores.push(new Competidor(competidores.length+1, document.getElementById('nome').value, document.getElementById('tempo').value));

        document.getElementById('tabela-competidores').innerHTML = '';

        competidores.forEach((competidor)=>{
            document.getElementById('tabela-competidores').innerHTML += '<tr>\
                                                                            <th scope="row">'+competidor.indice+'</th>\
                                                                            <td>'+competidor.nome+'</td>\
                                                                            <td>'+competidor.tempo+'</td>\
                                                                        </tr>';
        });
    }

    if(competidores.length == 6){
        calculaVencedores();
    }

}

function adicionaCalcula(){
    document.getElementById('resultado').style.display = 'none';
    if(document.getElementById('nome').value == '' || document.getElementById('tempo').value == ''){
        alert('Favor preencher todos os campos!');
    } else{

        competidores.push(new Competidor(competidores.length+1, document.getElementById('nome').value, document.getElementById('tempo').value));

        document.getElementById('tabela-competidores').innerHTML = '';

        competidores.forEach((competidor)=>{
            document.getElementById('tabela-competidores').innerHTML += '<tr>\
                                                                            <th scope="row">'+competidor.indice+'</th>\
                                                                            <td>'+competidor.nome+'</td>\
                                                                            <td>'+competidor.tempo+'</td>\
                                                                        </tr>';
        });

        calculaVencedores();
    }
}

function calculaVencedores(){
    competidores.sort((a, b)=> {
        if (parseInt(a.tempo) < parseInt(b.tempo)) return -1;
        if (parseInt(a.tempo) > parseInt(b.tempo)) return 1;
        return 0;
    });
    
    document.getElementById('resultado').style.display = 'inherit';

    document.getElementById('tabela-resultado').innerHTML = '';

    competidores.forEach((competidor, i)=>{
        document.getElementById('tabela-resultado').innerHTML += '<tr>\
                                                                    <th scope="row">'+(i+1)+'</th>\
                                                                    <th>'+competidor.indice+'</th>\
                                                                    <td>'+competidor.nome+'</td>\
                                                                    <td>'+competidor.tempo+'</td>\
                                                                    <td>'+(competidor.tempo == competidores[0].tempo ? '<b>Vencedor!</b>' : '-')+'</td>\
                                                                </tr>';
    });

    
    competidores = []
}