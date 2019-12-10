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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script src="assets/js/script.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/profile.css">

    <title>LodgeIn</title>
</head>

<body>
<div id="mainContent">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" >
        <div class="d-flex flex-grow-1">
            <a class="navbar-brand" href="index.php">
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
                    <a href="settings.php" class="nav-link">Perfil</a>
                </li>
                <li>
                <i class="fas fa-map-marker-alt"></i>


                </li>
                <li class="nav-item">
                    <a href="includes/logout.php" class="nav-link">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>
