<?php
require 'db.php'; // DB connection

//Filtteroidaan POST-inputit (ei käytetä string-filtteriä, koska deprekoitunut)
//Jos parametria ei löydy, funktio palauttaa null
$name = filter_input(INPUT_POST, "kappaleNimi");
$time = filter_input(INPUT_POST, "kesto");
$artist = filter_input(INPUT_POST, "artistiNimi");

//Tarkistetaan onko muttujia asetettu
if( !isset($name) || !isset($time) || !isset($artist) ){
    echo "Parametreja puuttui!! Ei voida lisätä kappaletta!";
    exit;
}

//Tarkistetaan, ettei tyhjiä arvoja muuttujissa
if( empty($name) || empty($time) || empty($artist)){
    echo "Et voi asettaa tyhjiä arvoja!!";
    exit;
}

try{
    //Suoritetaan parametrien lisääminen tietokantaan.
    $sql = "INSERT INTO kappale (kappaleNimi, kesto, artistiNimi) VALUES (?, ?, ?)";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(1, $name);
    $statement->bindParam(2, $time);
    $statement->bindParam(3, $artist);
    
    $statement->execute();

    echo "Kappale ".$name." on lisätty tietokantaan"; 
}catch(PDOException $e){
    echo "Kappaletta ei voitu lisätä<br>";
    echo $e->getMessage();
}