<?php
include TEMPLATES_DIR.'head.php';
include MODULES_DIR.'authorization.php';

$uname = filter_input(INPUT_POST, "username");
$pw = filter_input(INPUT_POST, "salasana");

if(!isset($_SESSION["username"]) && isset($uname)){

    try {
        login($uname, $pw);
        
        exit;
    } catch (Exception $e) {
        echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
    }
   
}

    if(!isset($_SESSION["ktunnus"])){
?>
    <h2>Kirjaudu sisään</h2>
    <form action="login.php" method="post">
        <label for="username">Käyttäjätunnus:</label><br>
        <input type="text" name="username" id="username"><br>
        <label for="salasana">Salasana:</label><br>
        <input type="password" name="salasana" id="salasana"><br>
        <input type="submit" class="btn btn-primary" value="Kirjaudu sisään">
    </form>


<?php } include TEMPLATES_DIR.'foot.php'; ?>