<?php

$db = new PDO('sqlite:./database.sqlite');

$query = $db->query("CREATE TABLE IF NOT EXISTS `produtos`(
    `id` INTEGER PRIMARY KEY AUTOINCREMENT,
    `nome` VARCHAR(100) NOT NULL,
    `um` VARCHAR(3) NOT NULL
)");
