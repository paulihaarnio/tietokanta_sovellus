<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Musiikkisovellus</title>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #333;
            color: white;
        }

        a {
            text-decoration: none;
            color: white;
        }

        a:hover {
            color: #bfd8ff;
        }

        h1, h2, li {
            font-weight: bold;
        }

        .main-container {
            padding-left: 3em;
            padding-top: 3em;
            padding-right: 3em;
            padding-bottom: 3em;
        }

        label {
            margin-top: 0.2em;
        }

        input {
            display: block;
            background-color: lightgray;
            border: none;
            border-radius: 4px;
        }
        input[type="submit"], .buttonstyle {
            font-weight: bold;
            margin-top: 1em;
            border: none;
            background-color: #2159ff;
            color: white;

            border-radius: 20px;
            padding-top: 0.3em;
            padding-right: 1em;
            padding-bottom: 0.3em;
            padding-left: 1em;
        }

        .loginstyle {
            font-weight: bold;
            border-radius: 20px;
            padding-left: 1em !important;
            padding-right: 1em !important;
        }

        .bi-suit-heart, .bi-suit-heart-fill{
            margin-right: 0.4em;
            font-size: 0.9em;
        }

        

        .dropdown {
            display: block;
        }

        .table-striped>tbody>tr:nth-of-type(odd)>* {
            color: white;
        }

        .table-striped>tbody>tr:nth-of-type(even)>* {
            color: white;
        }

        .play {
            border: none;
            background-color: #2159ff;
            color: white;
            padding-left: 1em;
            padding-right: 1em;
            padding-top: 0.25em;
            padding-bottom: 0.25em;
            border-radius: 20px;
        }

        .deletebtn {
            border: 2px solid #222;
            background-color: transparent;
            color: white;
            padding-left: 1em;
            padding-right: 1em;
            padding-top: 0.25em;
            padding-bottom: 0.25em;
            border-radius: 20px;
        }
        
        .bi-suit-heart-fill {
            color: #4a78ff;
        }

        @media screen and (max-width: 991px) {
            .btntext {
                display: none;
            }
        }
        
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./">Koti</a>
            </li>
            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Lis???? tietokantaan
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li><a class="dropdown-item" href="./artisti.php">Artisti</a></li>
                        <li><a class="dropdown-item" href="./albumi.php">Albumi</a></li>
                        <li><a class="dropdown-item" href="./kappale.php">Kappale</a></li>
                        <li><a class="dropdown-item" href="./genre.php">Genre</a></li>
                    </ul>
                    </li>
                </ul>
            </div>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./artistit.php">Artistit</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./albumit.php">Albumit</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./kappaleet.php">Kappaleet</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./genret.php">Genret</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./soittolista.php">Soittolista</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./register.php">Rekister??idy</a>
            </li>
            <li class="nav-item">
            <?php 
                if(isset($_SESSION["username"])){
                    echo '<a class="nav-link bg-danger loginstyle" href="./logout.php">  Kirjaudu ulos</a>';
                }else{
                    echo '<a class="nav-link bg-success loginstyle" href="./login.php">  Kirjaudu sis????n</a>';
                }
            ?>
            </li>
        </ul>
        </div>
    </div>
    </nav>