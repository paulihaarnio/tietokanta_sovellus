<?php

function addSong($artistID, $songName, $time) {
    require_once MODULES_DIR.'db.php'; // DB connection

    //Tarkistetaan onko parametreja asetettu
    if( !isset($songName) || !isset($time) || !isset($artist) ){
        echo "Parametreja puuttui!! Ei voida lisätä kappaletta!";
        exit;
    }

    //Tarkistetaan, ettei tyhjiä arvoja muuttujissa
    if( empty($songName) || empty($time) || empty($artist)){
        echo "Et voi asettaa tyhjiä arvoja!!";
        exit;
    }

    try{
        $pdo = getPdoConnection();
        //Suoritetaan parametrien lisääminen tietokantaan.
        $sql = "INSERT INTO kappale (artistiID, kappaleNimi, kesto) VALUES (?, ?, ?)";
        $statement = $pdo->prepare($sql);
        
        $statement->execute( array($artistID, $songName, $time));

        echo "Kappale ".$name." on lisätty tietokantaan"; 
    }catch(PDOException $e){
        echo "Kappaletta ei voitu lisätä<br>";
        echo $e->getMessage();
    }
}