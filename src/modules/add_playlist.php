<?php

function getplaylist($userID) {
    require_once MODULES_DIR.'db.php';

    try {
        $pdo = getPdoConnection();
        $sql = "SELECT soittolistarivi.kappaleID, kesto, kappaleNimi, artistiNimi, mediaNimi FROM soittolistarivi
        INNER JOIN kappale ON soittolistarivi.kappaleID = kappale.kappaleID INNER JOIN artisti ON artisti.artistiID = kappale.artistiID
        WHERE soittolistaID = $userID";
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

function removeFromPlaylist($userID, $kappaleID) {

    try{
        $pdo = getPdoConnection();
        //Suoritetaan parametrien lisääminen tietokantaan.
    
        $sql = "DELETE FROM soittolistarivi WHERE kappaleID=:kappaleID AND soittolistaID =
                (SELECT soittolistaID FROM soittolista WHERE kayttajaID=:userID)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':userID', $userID);
        $statement->bindParam(':kappaleID', $kappaleID);
        $statement->execute();
    
        $kappaleNimi = $pdo->query("SELECT kappaleNimi FROM kappale WHERE kappaleID=$kappaleID")->fetch();
        echo '<div class="main-container">
        <h3>Kappale <span style="color: #bfd8ff">'.$kappaleNimi[0].'</span> on poistettu soittolistastasi!<h3>
        <button class="buttonstyle" onclick="javascript:history.back()">Takaisin</button>
        </div>';
    
    }catch(PDOException $e){
        echo '<div class="main-container">
        <h3>Kappaletta ei voitu poistaa<h3>';
        echo $e->getMessage();
        echo '<br><button class="buttonstyle" onclick="javascript:history.back()">Takaisin</button></div>';
    }

}

function addSongToPlaylist($userID, $kappaleID) {

    try{
        $pdo = getPdoConnection();
        //Suoritetaan parametrien lisääminen tietokantaan.
    
        $rivinro = $pdo->query("SELECT COUNT(rivinro) FROM soittolistarivi WHERE soittolistaID=(SELECT soittolistaID FROM soittolista WHERE kayttajaID=$userID)")->fetch();
    
        $sql = "INSERT INTO soittolistarivi (soittolistaID, rivinro, kappaleID) VALUES (
            (SELECT soittolistaID FROM soittolista WHERE kayttajaID=:userID),
            :rivinro, :kappaleID)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':userID', $userID);
        $statement->bindParam(':kappaleID', $kappaleID);
        $statement->bindParam(':rivinro', $rivinro[0]);
        $statement->execute();
    
        $kappaleNimi = $pdo->query("SELECT kappaleNimi FROM kappale WHERE kappaleID=$kappaleID")->fetch();
        echo '<div class="main-container">
        <h3>Kappale <span style="color: #bfd8ff">'.$kappaleNimi[0].'</span> on lisätty soittolistaasi!<h3>
        <button class="buttonstyle" onclick="javascript:history.back()">Takaisin</button>
        </div>';
    
    }catch(PDOException $e){
        echo '<div class="main-container">
        <h3>Kappaletta ei voitu lisätä soittolistaan<h3>';
        echo $e->getMessage();
        echo '<br><button class="buttonstyle" onclick="javascript:history.back()">Takaisin</button></div>';
    }
}