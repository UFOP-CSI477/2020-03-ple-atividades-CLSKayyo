<?php

$db = new PDO('sqlite:./database.sqlite');

$query = $db->query("SELECT * FROM `estados`");

$estados = $query->fetchall();