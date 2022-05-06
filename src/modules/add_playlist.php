<?php

function getplaylist() {
    require_once MODULES_DIR.'db.php';

    try {
        $pdo = getPdoConnection();
        $sql = "SELECT soittolistarivi.kappaleID, kesto, kappaleNimi, artistiNimi, mediaNimi FROM soittolistarivi
        INNER JOIN kappale ON soittolistarivi.kappaleID = kappale.kappaleID INNER JOIN artisti ON artisti.artistiID = kappale.artistiID";
        $songs = $pdo->query($sql);
        return $songs->fetchAll();
    } catch(PDOException $e) {
        throw $e;
    }
}

function getSongsfromArtist($artistiID) {
    require_once MODULES_DIR.'db.php';

    try {
        $pdo = getPdoConnection();
        $sql = "SELECT kappaleNimi, kesto, artisti.artistiNimi FROM kappale 
        INNER JOIN artisti ON artisti.artistiID = kappale.artistiID WHERE kappale.artistiID = $artistiID";
        $songs = $pdo->query($sql);
        return $songs->fetchAll();
    } catch(PDOException $e) {
        throw $e;
    }
}

function playlist($artistID, $songName, $time) {
    require_once MODULES_DIR.'db.php'; // DB connection



    try{
        $pdo = getPdoConnection();
        //Suoritetaan parametrien lisääminen tietokantaan.
        $sql = "INSERT INTO soittolista (artistiID, kappaleNimi, kesto) VALUES (?, ?, ?)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $artistID);
        $statement->bindParam(2, $songName);
        $statement->bindParam(3, $time);

        $statement->execute();
 
    }catch(PDOException $e){
        echo "Kappaletta ei voitu lisätä<br>";
        echo $e->getMessage();
    }
}