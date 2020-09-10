function Tweet(nome, mensagem){
    this.nome = nome;
    this.mensagem = mensagem;
}

function enviaDados(){

    const nome = document.getElementById('nome').value+' '+document.getElementById('sobrenome').value;
    const mensagem = document.getElementById('message').value;

    const tweet = new Tweet(nome, mensagem);

    document.getElementById('dados').innerHTML = '<li class="list-group-item">\
        <h3>'+tweet.nome+'</h3>\
        <p>'+tweet.mensagem+'</p>\
    </li>' + document.getElementById('dados').innerHTML;

    document.getElementById('formulario').reset();

}