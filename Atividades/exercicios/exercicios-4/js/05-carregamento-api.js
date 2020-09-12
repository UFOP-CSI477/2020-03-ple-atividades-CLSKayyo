function carregaPokemon(){

    const card = document.getElementById('pokemon-card');

    card.style.display = 'none';

    let id = Math.floor(Math.random() * 893);

    document.getElementById('imagem').src = '';


    fetch('https://pokeapi.co/api/v2/pokemon/'+id).then(response=>response.json()).then(pokemon=>{

        
        //console.log(pokemon);
        
        document.getElementById('nome').innerText = pokemon.name.toUpperCase();
        document.getElementById('imagem').src = pokemon.sprites.front_default;
        document.getElementById('dados').innerHTML = 'ID: <b>'+pokemon.id+'</b><br>Tamanho: <b>'+(parseInt(pokemon.height)*10)+'cm</b><br>Peso: <b>'+(parseFloat(pokemon.weight)/10)+'kg</b>';

        card.style.display = 'inherit';


    });
}