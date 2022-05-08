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

function getArtist($artistID){
    require_once MODULES_DIR.'db.php';
    
    try{
        $pdo=getPdoConnection();
        $sql="SELECT artisti.artistiID, artistiNimi, svuosi, maa, kappale.kappaleNimi, kappale.kesto from artisti  
        INNER JOIN kappale ON artisti.artistiID = kappale.artistiID
        WHERE artisti.artistiID = $artistID";
        $info = $pdo->query($sql);
        return $info->fetchAll();
    }catch(PDOException $e) {
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
        
    }catch(PDOException $e){
        echo "Artistia ei voitu lisätä<br>";
        echo $e->getMessage();
    }
}

function deleteArtist($id){
    require_once MODULES_DIR.'db.php'; // DB connection
    
    //Tarkistetaan onko muttujia asetettu
    if( !isset($id) ){
        throw new Exception("Artistia ei pystytty poistamaan!");
    }
    
    try{
        $pdo = getPdoConnection();
        // Start transaction
        $pdo->beginTransaction();
        // Delete from albumi table
        $sql = "DELETE FROM albumi WHERE artistiID = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $id);        
        $statement->execute();
        // Delete from kappale table
        $sql = "DELETE FROM kappale WHERE artistiID = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $id);        
        $statement->execute();
        // Delete from artisti table
        $sql = "DELETE FROM artisti WHERE artistiID = ?";
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

function updateArtist($id, $name, $year, $country) {
    require_once MODULES_DIR.'db.php'; // DB connection
    
    if( !isset($id) ){
        throw new Exception("Artistin muokkaus ei onnistunut!");
    }
    
    try{
        $pdo = getPdoConnection();
        
        $sql = "UPDATE artisti SET artistiNimi = COALESCE(NULLIF('$name', ''), artistiNimi), svuosi = COALESCE(NULLIF('$year', 0), svuosi), maa = COALESCE(NULLIF('$country', ''), maa) WHERE artistiID = $id";
        $pdo->query($sql);
        
        
    }catch(PDOException $e){
        throw $e;
    }
}