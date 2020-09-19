<?php

require_once './connection.php';


$query = $db->query("SELECT * FROM `produtos`");

$produtos = $query->fetchall();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inserindo Itens no Banco</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="cadastro.php">Cadastrar</a>
                <a class="nav-item nav-link active" href="index.php">Relatório</a>
                <a class="nav-item nav-link active" href="//ufop.br" target="_blank">Site da UFOP</a>
            </div>
        </div>
    </nav>
    <main>
        
        <h1>Produtos</h1>

        <table class="table table-striped" style="width: 80%; margin: auto;">
            <thead class="thead-light">

                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Medida</th>
                </tr>

            </thead>
            <tbody>
                <?php
                    foreach ($produtos as $produto) { ?>
                        
                        <tr>
                            <td><?=$produto['id']?></td>
                            <td><?=$produto['nome']?></td>
                            <td><?=$produto['um']?></td>
                        </tr>

                    <?php }
                ?>

            </tbody>
            <tfoot>
                <tr>
                    <td><b>Quantidade</b></td>
                    <td><b><?=count($produtos)?></b></td>
                    <td><b>Produtos</b></td>
                </tr>
            </tfoot>
        </table>
        <a class="btn btn-outline-dark" href="cadastro.php">Cadastrar Produto</a>

    </main>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    
</body>
</html>