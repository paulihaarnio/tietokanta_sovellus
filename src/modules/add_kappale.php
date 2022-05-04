<?php

function getSongs() {
    require_once MODULES_DIR.'db.php';

    try {
        $pdo = getPdoConnection();
        $sql = "SELECT kappaleID, kappaleNimi, kesto, artisti.artistiNimi, mediaNimi FROM kappale 
        INNER JOIN artisti ON artisti.artistiID = kappale.artistiID";
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
 
    }catch(PDOException $e){
        echo "Kappaletta ei voitu lisätä<br>";
        echo $e->getMessage();
    }
}

function deleteSong($id){
    require_once MODULES_DIR.'db.php'; // DB connection
    
    //Tarkistetaan onko muttujia asetettu
    if( !isset($id) ){
        throw new Exception("Missing parameters! Cannot delete Song!");
    }
    
    try{
        $pdo = getPdoConnection();
        // Start transaction
        $pdo->beginTransaction();
        // Delete from albumirivi table
        $sql = "DELETE FROM albumirivi WHERE kappaleID = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $id);        
        $statement->execute();
        // Delete from kappale table
        $sql = "DELETE FROM kappale WHERE kappaleID = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $id);        
        $statement->execute();
        // Commit transaction
        $pdo->commit();
    }catch(PDOException $e){
        // Rollback transaction on error
        $pdo->rollBack();
        throw $e;
    }
}

function songsInPlaylist($userID){
    $pdo = getPdoConnection();

    $sql = "SELECT kappale.kappaleID FROM kappale
            INNER JOIN soittolistarivi ON kappale.kappaleID = soittolistarivi.kappaleID
            WHERE soittolistaID = (SELECT soittolistaID FROM soittolista WHERE kayttajaID = $userID)";

    $songs = $pdo->query($sql)->fetchAll(PDO::FETCH_COLUMN);
    foreach ($songs as $s){}
    return $songs;
}