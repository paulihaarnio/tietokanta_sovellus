
<?php

require_once MODULES_DIR.'db.php';



function registerUser($user, $pword){
    require_once MODULES_DIR.'db.php'; 

//Tarkistetaan onko muttujia asetettu
if( !isset($user) || !isset($pword)){
    echo "Parametreja puuttui!! Ei voida lisätä henkilöä";
    exit;
}

//Tarkistetaan, ettei tyhjiä arvoja muuttujissa
if(empty($pword)|| empty($user)){
    echo "Et voi asettaa tyhjiä arvoja!!";
    exit;
}

try{
    $pdo = getPdoConnection();
    $pdo->beginTransaction();
    //Suoritetaan parametrien lisääminen tietokantaan.
    $sql = "INSERT INTO kayttaja (ktunnus, ksalasana) VALUES (?,?)";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(1, $user);
    
    $hashpw= password_hash($pword, PASSWORD_DEFAULT);
    password_verify($pword, $hashpw);
    $statement->bindParam(2, $hashpw);
    $statement->execute();

    $sql = "INSERT INTO soittolista(kayttajaID) VALUES (
        (SELECT kayttajaID FROM kayttaja WHERE ktunnus=:user))";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":user", $user);
    $statement->execute();

    $pdo->commit();
   
}catch(PDOException $e){
    $pdo->rollBack();
    echo "Käyttäjää ei voitu lisätä";
    echo $e->getMessage();
}

}

?>
