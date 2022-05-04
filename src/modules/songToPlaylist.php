<?php
require_once './db.php'; // DB connection
include '../templates/head.php';

$kappaleID = $_GET['kappaleID'];
$userID = $_SESSION['userID'];

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

include '../templates/foot.php';
?>