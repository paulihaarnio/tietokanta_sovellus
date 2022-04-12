<?php
require '../src/modules/db.php'; // DB connection

//Filtteroidaan POST-inputit (ei käytetä string-filtteriä, koska deprekoitunut)
//Jos parametria ei löydy, funktio palauttaa null
$name = filter_input(INPUT_POST, "nimi");
$year = filter_input(INPUT_POST, "svuosi");
$country = filter_input(INPUT_POST, "maa");

//Tarkistetaan onko muttujia asetettu
if( !isset($name) || !isset($year) || !isset($country) ){
    echo "Parametreja puuttui!! Ei voida lisätä artistia!";
    exit;
}

//Tarkistetaan, ettei tyhjiä arvoja muuttujissa
if( empty($name) || empty($year) || empty($country)){
    echo "Et voi asettaa tyhjiä arvoja!!";
    exit;
}

try{
    //Suoritetaan parametrien lisääminen tietokantaan.
    $sql = "INSERT INTO artisti (artistiNimi, svuosi, maa) VALUES (?, ?, ?)";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(1, $name);
    $statement->bindParam(2, $year);
    $statement->bindParam(3, $country);
    
    $statement->execute();

    echo "Artisti ".$name." on lisätty tietokantaan"; 
}catch(PDOException $e){
    echo "Artistia ei voitu lisätä<br>";
    echo $e->getMessage();
}