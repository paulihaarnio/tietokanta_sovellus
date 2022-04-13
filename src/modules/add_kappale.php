<?php

function addSong($artistID, $songName, $time) {
    require_once MODULES_DIR.'db.php'; // DB connection

    //Tarkistetaan onko parametreja asetettu
    if(!isset($artistID) || !isset($songName) || !isset($time) ){
        echo "Parametreja puuttui!! Ei voida lisätä kappaletta!";
        exit;
    }

    //Tarkistetaan, ettei tyhjiä arvoja muuttujissa
    if( empty($songName) || empty($time)){
        echo "Et voi asettaa tyhjiä arvoja!!";
        exit;
    }

    try{
        $pdo = getPdoConnection();
        //Suoritetaan parametrien lisääminen tietokantaan.
        $sql = "INSERT INTO kappale (artistiID, kappaleNimi, kesto) VALUES (?, ?, ?)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $artistID);
        $statement->bindParam(2, $songName);
        $statement->bindParam(3, $time);

        $statement->execute();

        echo "Kappale ".$songName." on lisätty tietokantaan"; 
    }catch(PDOException $e){
        echo "Kappaletta ei voitu lisätä<br>";
        echo $e->getMessage();
    }
}