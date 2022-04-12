<?php

function getArtists() {
    require_once MODULES_DIR.'db.php';

    try {
        $pdo = getPdoConnection();
        $sql = "SELECT * FROM artisti";
        $artists = $pdo->query($sql);
        return $artists->fetchAll();
    } catch(PDOException $e) {
        throw $e;
    }
}

function addArtist($name, $year, $country) {
    require_once MODULES_DIR.'db.php'; // DB connection

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
        $pdo = getPdoConnection();
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
}