<?php

function AddAlbum($artistID, $genreID, $albumName, $year, $producer) {
    require_once MODULES_DIR.'db.php'; // DB connection

    //Tarkistetaan onko muuttujia asetettu
    if( !isset($albumName) || !isset($year) || !isset($artistID) || !isset($genreID) || !isset($producer) ){
        echo "Parametreja puuttui!! Ei voida lisätä albumia!";
        exit;
    }

    //Tarkistetaan, ettei tyhjiä arvoja muuttujissa
    if( empty($albumName) || empty($year) || empty($producer)){
        echo "Et voi asettaa tyhjiä arvoja!!";
        exit;
    }

    try{
        $pdo = getPdoConnection();
        //Suoritetaan parametrien lisääminen tietokantaan.
        $sql = "INSERT INTO albumi (albumiNimi, tekovuosi, artistiID, genreID, tuottaja) VALUES (?, ?, ?, ?, ?)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $albumName);
        $statement->bindParam(2, $year);
        $statement->bindParam(3, $artistID);
        $statement->bindParam(4, $genreID);
        $statement->bindParam(5, $producer);
        
        $statement->execute();
 
    }catch(PDOException $e){
        echo "Albumia ei voitu lisätä<br>";
        echo $e->getMessage();
    }
}