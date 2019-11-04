<?php

include("includes/config.php");

if (isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
} else {
    header("Location: register.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="d-flex flex-grow-1">
            <a class="navbar-brand" href="#">
                <img src="./assets/images/icons/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
                LodgeIn.com
            </a>
            <div class="w-100 text-right">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar7">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
        <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar7">
            <ul class="navbar-nav ml-auto flex-nowrap">
                <li class="nav-item">
                    <a href="#" class="nav-link">Buscar
                        <img src="assets/images/icons/search.png" class="icon" alt="Search">
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Publicar</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Favoritos</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Perfil</a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="mainViewContainer">
        <div id="mainContent">
            
        </div>
    </div>
</body>

</html>