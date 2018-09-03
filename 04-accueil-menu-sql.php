<?php

require_once "Menu.class.php";
require_once "MenuManager.class.php";

// connection to mysql DB recusive2
$PDO = new PDO("mysql:host=localhost;dbname=recursive2;charset=utf8", "root", "");
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// create instance for MenuManager
$menuManager = new MenuManager($PDO);

// datas from "menu" table in an associative array
$recupMenu = $menuManager->getDatas();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Appel d'un menu récursif venant d'une base de donnée</title>
</head>
<body>
<h1>Appel d'un menu récursif venant d'une base de donnée</h1>
<pre><?php
var_dump($recupMenu);
    ?></pre>

</body>
</html>
