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
    <title>Musiikkisovellus</title>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #333;
            color: white;
        }

        h1, li {
            font-weight: bold;
        }

        .main-container {
            padding-left: 3em;
            padding-top: 3em;
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
        input[type="submit"] {
            font-weight: bold;
            margin-top: 1em;
            border: none;
            background-color: #0040FF;
            color: white;

            border-radius: 20px;
            padding-top: 0.3em;
            padding-right: 1em;
            padding-bottom: 0.3em;
            padding-left: 1em;
        }

        .dropdown {
            display: block;
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
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./artisti.php">Artisti</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./albumi.php">Albumi</a>
            </li>
            </li>
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./kappale.php">Kappale</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>