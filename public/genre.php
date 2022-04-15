<?php
include TEMPLATES_DIR.'head.php';
include MODULES_DIR.'add_genre.php';

//Filtteroidaan POST-inputit (ei käytetä string-filtteriä, koska deprekoitunut)
    //Jos parametria ei löydy, funktio palauttaa null
    $name = filter_input(INPUT_POST, "nimi");

    if(isset($name)) {
        try{
            addGenre($name);
            echo '<div class="alert alert-success" role="alert">Genre lisätty!</div>';
        }catch(Exception $e) {
            echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
        }
    }
?>
    <div class="main-container">
        <h1>Genren lisäys</h1>
        <form action="genre.php" method="post">
            <label>Genren nimi</label>
            <input type="text" name="nimi">  
            <input type="submit" value="Lisää genre">
        </form>
    </div>
<?php include TEMPLATES_DIR.'foot.php'; ?>