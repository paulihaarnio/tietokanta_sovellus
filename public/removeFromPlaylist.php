<?php
require_once MODULES_DIR.'db.php'; // DB connection
include TEMPLATES_DIR.'head.php';

$kappaleID = $_GET['kappaleID'];
$userID = $_SESSION['userID'];

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

include TEMPLATES_DIR.'foot.php';
?>