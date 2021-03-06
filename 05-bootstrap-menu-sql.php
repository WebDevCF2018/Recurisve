<?php

require_once "Menu.class.php";
require_once "MenuManagerB.class.php";

// connection to mysql DB recusive2
$PDO = new PDO("mysql:host=localhost;dbname=recursive2;charset=utf8", "root", "");
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// create instance for MenuManager
$menuManager = new MenuManagerB($PDO);

// datas from "menu" table in an associative array
$recupDatasMenu = $menuManager->getDatas();

// arbor's menu

$menu = $menuManager->getMenu();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Appel d'un menu récursif venant d'une base de donnée</title>
   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    .navbar .dropdown-toggle, .navbar .dropdown-menu a {
    cursor: pointer;
}

.navbar .dropdown-item.active, .navbar .dropdown-item:active {
    color: inherit;
    text-decoration: none;
    background-color: inherit;
}

.navbar .dropdown-item:focus, .navbar .dropdown-item:hover {
    color: #16181b;
    text-decoration: none;
    background-color: #f8f9fa;
}

@media (min-width: 767px) {
    .navbar .dropdown-toggle:not(.nav-link)::after {
        display: inline-block;
        width: 0;
        height: 0;
        margin-left: .5em;
        vertical-align: 0;
        border-bottom: .3em solid transparent;
        border-top: .3em solid transparent;
        border-left: .3em solid;
    }
}
</style>
</head>
<body>
<h1>Appel d'un menu récursif venant d'une base de donnée</h1>
<p>Après de multiples tests bootstrap, celui-ci semble plus efficace:</p>
<p><a href="https://bootsnipp.com/snippets/featured/multi-level-navbar-menu" target="_blank">Lien</a></p>

<div class="navbar navbar-expand-md navbar-dark bg-dark mb-4" role="navigation">
    <a class="navbar-brand" href="#">Bootstrap 4 NavBar EXEMPLE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
          
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown1</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown1">
                    <li class="dropdown-item" href="#"><a>Action 1</a></li>
                    <li class="dropdown-item dropdown">
                        <a class="dropdown-toggle" id="dropdown1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown1.1</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown1-1">
                            <li class="dropdown-item" href="#"><a>Action 1.1</a></li>
                            <li class="dropdown-item dropdown">
                                <a class="dropdown-toggle" id="dropdown1-1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown1.1.1</a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown1-1-1">
                                    <li class="dropdown-item" href="#"><a>Action 1.1.1</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="dropdown2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown2</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown2">
                    <li class="dropdown-item" href="#"><a>Action 2 A</a></li>
                    <li class="dropdown-item" href="#"><a>Action 2 B</a></li>
                    <li class="dropdown-item" href="#"><a>Action 2 C</a></li>
                    <li class="dropdown-item dropdown">
                        <a class="dropdown-toggle" id="dropdown2-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown2.1</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown2-1">
                            <li class="dropdown-item" href="#"><a>Action 2.1 A</a></li>
                            <li class="dropdown-item" href="#"><a>Action 2.1 B</a></li>
                            <li class="dropdown-item" href="#"><a>Action 2.1 C</a></li>
                            <li class="dropdown-item dropdown">
                                <a class="dropdown-toggle" id="dropdown2-1-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown2.1.1</a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown2-1-1">
                                    <li class="dropdown-item" href="#"><a>Action 2.1.1 A</a></li>
                                    <li class="dropdown-item" href="#"><a>Action 2.1.1 B</a></li>
                                    <li class="dropdown-item" href="#"><a>Action 2.1.1 C</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-item dropdown">
                                <a class="dropdown-toggle" id="dropdown2-1-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown2.1.2</a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown2-1-2">
                                    <li class="dropdown-item" href="#"><a>Action 2.1.2 A</a></li>
                                    <li class="dropdown-item" href="#"><a>Action 2.1.2 B</a></li>
                                    <li class="dropdown-item" href="#"><a>Action 2.1.2 C</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</div>
<hr/>
<div class="navbar navbar-expand-md navbar-dark bg-dark mb-4" role="navigation">
    <a class="navbar-brand" href="#">Notre récursif</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
            </li>
          
            <?php
            echo $menu;
            ?>
            
        </ul>
        <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</div>
<hr>
<main role="main" class="container">
    <div class="jumbotron text-center">
        <h1>Bootstrap 4 NavBar</h1>
        <p class="lead text-info">NavBar with too many childs.</p>
    </div>
</main>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
$(document).ready(function () {

    $('.navbar .dropdown-item').on('click', function (e) {
        var $el = $(this).children('.dropdown-toggle');
        var $parent = $el.offsetParent(".dropdown-menu");
        $(this).parent("li").toggleClass('open');

        if (!$parent.parent().hasClass('navbar-nav')) {
            if ($parent.hasClass('show')) {
                $parent.removeClass('show');
                $el.next().removeClass('show');
                $el.next().css({"top": -999, "left": -999});
            } else {
                $parent.parent().find('.show').removeClass('show');
                $parent.addClass('show');
                $el.next().addClass('show');
                $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
            }
            //e.preventDefault();
            e.stopPropagation();
        }
    });

    $('.navbar .dropdown').on('hidden.bs.dropdown', function () {
        $(this).find('li.dropdown').removeClass('show open');
        $(this).find('ul.dropdown-menu').removeClass('show open');
    });

});
</script>
</body>
</html>
