<?php
    include TEMPLATES_DIR.'head.php';
    include MODULES_DIR.'authorization.php';

    if(isset($_SESSION["username"])){
        logout();
        echo '<div class="alert alert-success" role="alert">Logged out!!</div>';
       // header("Location: logout.php");
    }else{
        echo '<div class="alert alert-success" role="alert">No user found</div>';
    }
  //  header("Location: public/");
    include TEMPLATES_DIR.'foot.php.';
?>