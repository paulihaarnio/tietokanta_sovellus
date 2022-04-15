<?php
include TEMPLATES_DIR.'head.php';
include MODULES_DIR.'authorization.php';

$uname = filter_input(INPUT_POST, "ktunnus");
$pw = filter_input(INPUT_POST, "ksalasana");

if(!isset($_SESSION["ktunnus"]) && isset($uname)){

    try {
        login($uname, $pw);
        //header("Location: index.php");
        exit;
    } catch (Exception $e) {
        echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
    }
   
}

    if(!isset($_SESSION["ktunnus"])){
?>

    <form action="login.php" method="post">
        <label for="ktunnus">Käyttäjä:</label><br>
        <input type="text" name="ktunnus" id="ktunnus"><br>
        <label for="ksalasana">Salasana:</label><br>
        <input type="ksalasana" name="ksalasana" id="ksalasana"><br>
        <input type="submit" class="btn btn-primary" value="Log in">
    </form>


<?php } include TEMPLATES_DIR.'foot.php'; ?>