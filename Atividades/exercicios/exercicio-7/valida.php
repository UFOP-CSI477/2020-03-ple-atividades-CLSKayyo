<?php

require_once './connection.php';

if(!(isset($_POST['nome']) && isset($_POST['medida'])) ||
    ($_POST['nome'] == '' || $_POST['medida'] == '') || 
    (strlen($_POST['nome']) > 100 || strlen($_POST['medida']) > 3)){

        header('Location: cadastro.php?error=1');
} else{
    $nome = $_POST['nome'];
    $um = $_POST['medida'];

    $query = $db->query("INSERT INTO `produtos` (`nome`, `um`)
    VALUES ('$nome', '$um')");

    header('Location: index.php');

}