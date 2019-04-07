<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Filmy</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="resources/css/style.css?1.01" >
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a href= "/dzfilms/" class="navbar-brand" href="#">WypFilmow</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Film
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="/dzfilms/"class="dropdown-item" href="#">Lista filmów</a>
                    <a href="/dzfilms/newest" class="dropdown-item" href="#">Nowości</a>
                    <a class="dropdown-item" href="#">Wkrótce</a>
                    <div class="dropdown-divider"></div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Statystyki
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Najczesciej wypozyczany</a>
                    <a class="dropdown-item" href="#">Najmniej wypozyczany</a>
                    <div class="dropdown-divider"></div>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="get" action = "/dzfilms/search"> 
            <input class="form-control mr-sm-2" type="search" placeholder="Wyszukaj" aria-label="Wyszukaj" name = "q">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Wyszukaj</button>

        </form>
        <?php if(empty($_SESSION['user'])): ?>
        <div class="sign-up">
            <a class="nav-link" href="/dzfilms/login">Zaloguj się</a>
        </div>
        <?php else: ?>
            <div class="user ml-3">
                Zalogowany jako: <b><?=$_SESSION['user']['nick']?></b>
                <a class="nav-link d-inline-block" href="/dzfilms/logout">Wyloguj się</a>
            </div>
        <?php endif; ?>
    </div>
</nav>
