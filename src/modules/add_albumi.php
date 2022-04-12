<?php
require '../src/modules/db.php'; // DB connection

//Filtteroidaan POST-inputit (ei käytetä string-filtteriä, koska deprekoitunut)
//Jos parametria ei löydy, funktio palauttaa null
$name = filter_input(INPUT_POST, "nimi");
$year = filter_input(INPUT_POST, "vuosi");
$artist = filter_input(INPUT_POST, "artisti");
$producer = filter_input(INPUT_POST, "tuottaja");

//Tarkistetaan onko muttujia asetettu
if( !isset($name) || !isset($year) || !isset($artist) || !isset($producer) ){
    echo "Parametreja puuttui!! Ei voida lisätä albumia!";
    exit;
}

//Tarkistetaan, ettei tyhjiä arvoja muuttujissa
if( empty($name) || empty($year) || empty($artist) || empty($producer)){
    echo "Et voi asettaa tyhjiä arvoja!!";
    exit;
}

try{
    //Suoritetaan parametrien lisääminen tietokantaan.
    $sql = "INSERT INTO albumi (nimi, vuosi, artistiNimi, tuottaja) VALUES (?, ?, ?, ?)";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(1, $name);
    $statement->bindParam(2, $year);
    $statement->bindParam(3, $artist);
    $statement->bindParam(4, $producer);
    
    $statement->execute();

    echo "Albumi ".$name." on lisätty tietokantaan"; 
}catch(PDOException $e){
    echo "Albumia ei voitu lisätä<br>";
    echo $e->getMessage();
}