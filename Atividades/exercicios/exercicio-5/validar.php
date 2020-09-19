<?php

if(isset($_REQUEST['nome'])){

    $nome = $_REQUEST['nome'];
    $endereco = $_REQUEST['endereco'];
    $genero = $_REQUEST['genero'];

    $interesse = array();

    if(isset($_REQUEST['web'])){
        array_push($interesse, 'Sistemas Web');
    }
    if(isset($_REQUEST['db'])){
        array_push($interesse, 'Bancos de Dados');
    }
    if(isset($_REQUEST['redes'])){
        array_push($interesse, 'Redes de Computadores');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>

    <link rel="stylesheet" href="css/header.css">
</head>
<body>
    <header>
        <!-- <a href="introducao.html"><img src="https://via.placeholder.com/200x50?text=OrkutSon" alt="Logotipo"></a> -->
        <a href="cadastro.html">Cadastrar</a>
        <!-- <a href="perfil.html">Perfil</a>
        <a href="relatorio.html">Relatório</a> -->
        <a href="//ufop.br" target="_blank">Clique aqui para ir para a UFOP.br</a>
    </header>
    <h1>Perfil</h1>
    <div>
        <img src="https://images.pexels.com/photos/825949/pexels-photo-825949.jpeg" alt="Dog" width="200">
        <h2><?=$nome?></h2>
        <span><?=$genero?></span><br>
        <span><?=$endereco?></span><br>
        <span>Interesse em <?php foreach ($interesse as $i) {
            echo $i.', ';
        }?></span>
    </div>
</body>
</html>