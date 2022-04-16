<?php
require_once './db.php'; // DB connection

$kappaleID = $_GET['kappaleID'];
$userID = 2;

try{
    $pdo = getPdoConnection();
    //Suoritetaan parametrien lisääminen tietokantaan.
    $sql = "INSERT INTO soittolistarivi (soittolistaID, rivinro, kappaleID) VALUES (
        (SELECT soittolistaID FROM soittolista WHERE kayttajaID=:userID),
        1, :kappaleID)";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':kappaleID', $kappaleID);
    $statement->bindParam(':userID', $userID);

    $statement->execute();

    echo "Kappale lisätty soittolistaan";

}catch(PDOException $e){
    echo "Kappaletta ei voitu lisätä soittolistaan<br>";
    echo $e->getMessage();
}