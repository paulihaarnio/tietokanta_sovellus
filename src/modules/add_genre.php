<?php

function getGenres() {
    require_once MODULES_DIR.'db.php';

    try {
        $pdo = getPdoConnection();
        $sql = "SELECT * FROM genre";
        $genres = $pdo->query($sql);
        return $genres->fetchAll();
    } catch(PDOException $e) {
        throw $e;
    }
}

function addGenre($name) {
    require_once MODULES_DIR.'db.php'; // DB connection

    //Tarkistetaan onko muttujia asetettu
    if( !isset($name)){
        echo "Parametreja puuttui!! Ei voida lisätä genreä!";
        exit;
    }

    //Tarkistetaan, ettei tyhjiä arvoja muuttujissa
    if( empty($name)){
        echo "Et voi asettaa tyhjiä arvoja!!";
        exit;
    }

    try{
        $pdo = getPdoConnection();
        //Suoritetaan parametrien lisääminen tietokantaan.
        $sql = "INSERT INTO genre (genreNimi) VALUES (?)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $name);
        
        $statement->execute();
        
    }catch(PDOException $e){
        echo "Genreä ei voitu lisätä<br>";
        echo $e->getMessage();
    }
}