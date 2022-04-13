<?php
include TEMPLATES_DIR.'head.php';
include MODULES_DIR.'add_artisti.php';

//Filtteroidaan POST-inputit (ei käytetä string-filtteriä, koska deprekoitunut)
    //Jos parametria ei löydy, funktio palauttaa null
    $name = filter_input(INPUT_POST, "nimi");
    $year = filter_input(INPUT_POST, "svuosi");
    $country = filter_input(INPUT_POST, "maa");

    if(isset($name)) {
        try{
            addArtist($name, $year, $country);
            echo '<div class="alert alert-success" role="alert">Artisti lisätty!</div>';
        }catch(Exception $e) {
            echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
        }
    }
?>
    <div class="main-container">
        <h1>Artistin lisäys</h1>
        <form action="artisti.php" method="post">
            <label>Artistin nimi</label>
            <input type="text" name="nimi">
            <label>Artistin syntymävuosi</label>
            <input type="text" name="svuosi">
            <label>Syntymämaa</label>
            <input type="text" name="maa"> 
            <input type="submit" value="Lisää artisti">
        </form>
    </div>

<?php include TEMPLATES_DIR.'foot.php'; ?>