
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
    //Suoritetaan parametrien lisääminen tietokantaan.
    $sql = "INSERT INTO kayttaja (ktunnus, ksalasana) VALUES (?,?)";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(1, $user);
    
    
    $hashpw= password_hash($pword, PASSWORD_DEFAULT);
    password_verify($pword, $hashpw);
    $statement->bindParam(2, $hashpw);
    $statement->execute();

   
}catch(PDOException $e){
    echo "Käyttäjää ei voitu lisätä";
    echo $e->getMessage();
}

}

?>
