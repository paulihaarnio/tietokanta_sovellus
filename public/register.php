<?php 
    include TEMPLATES_DIR.'head.php';
    include MODULES_DIR.'add_user.php';
    
    //$kayttajaID = 
    $user = filter_input(INPUT_POST, "username");
    $pword=filter_input(INPUT_POST, "salasana");

if(isset($user)){
    try {
        registerUser($user, $pword);
        echo '<div class="alert alert-success" role="alert"> Tervetuloa '.$user .' !</div>';
    }  catch(Exception $e) {
        echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
    }
}


?>
<div class="main-container">
<h2>Rekisteröidy</h2>
<form action="register.php" method="post">
        <label for="username">Käyttäjätunnus:</label><br>
        <input type="text" name="username" id="username"><br>
        <label for="password">Salasana:</label><br>
        <input type="password" name="salasana" id="salasana"><br>
        <input type="submit" class="btn btn-primary" value="Rekisteröidy">
    </form>
</div>
<?php include TEMPLATES_DIR.'foot.php';?>