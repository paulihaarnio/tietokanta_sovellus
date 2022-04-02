<?php
require '../src/modules/db.php'; // DB connection

//Filtteroidaan POST-inputit (ei käytetä string-filtteriä, koska deprekoitunut)
//Jos parametria ei löydy, funktio palauttaa null
$name = filter_input(INPUT_POST, "nimi");
$year = filter_input(INPUT_POST, "svuosi");
$genre = filter_input(INPUT_POST, "genre");

//Tarkistetaan onko muttujia asetettu
if( !isset($name) || !isset($year) || !isset($genre) ){
    echo "Parametreja puuttui!! Ei voida lisätä artistia!";
    exit;
}

//Tarkistetaan, ettei tyhjiä arvoja muuttujissa
if( empty($name) || empty($year) || empty($genre)){
    echo "Et voi asettaa tyhjiä arvoja!!";
    exit;
}

try{
    //Suoritetaan parametrien lisääminen tietokantaan.
    $sql = "INSERT INTO artisti (nimi, svuosi, genre) VALUES (?, ?, ?)";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(1, $name);
    $statement->bindParam(2, $year);
    $statement->bindParam(3, $genre);
    
    $statement->execute();

    echo "Artisti ".$name." on lisätty tietokantaan"; 
}catch(PDOException $e){
    echo "Artistia ei voitu lisätä<br>";
    echo $e->getMessage();
}