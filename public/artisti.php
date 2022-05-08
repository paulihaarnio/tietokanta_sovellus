<?php
include TEMPLATES_DIR.'head.php';
include MODULES_DIR.'add_artisti.php';

//Filtteroidaan POST-inputit (ei käytetä string-filtteriä, koska deprekoitunut)
    //Jos parametria ei löydy, funktio palauttaa null
    $name = filter_input(INPUT_POST, "nimi", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $year = filter_input(INPUT_POST, "svuosi", FILTER_SANITIZE_NUMBER_INT);
    $country = filter_input(INPUT_POST, "maa", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $artistIDFromUrl = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
    $nameUrl = filter_input(INPUT_GET, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $yearUrl = filter_input(INPUT_GET, "year", FILTER_SANITIZE_NUMBER_INT);
    $countryUrl = filter_input(INPUT_GET, "country", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(isset($artistIDFromUrl)) {
        try {
            updateArtist($artistIDFromUrl, $name, $year, $country);
        }catch(Exception $e) {
            echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
        }

        ?>

        <div class="main-container">
            <h1>Artistin muokkaus</h1>
            <form action="artisti.php?id=<?php echo $artistIDFromUrl; ?>" method="post">
                <label>Artistin nimi</label>
                <input type="text" name="nimi" placeholder="<?php echo $nameUrl; ?>">
                <label>Artistin syntymävuosi</label>
                <input type="text" name="svuosi" placeholder="<?php echo $yearUrl; ?>">
                <label>Syntymämaa</label>
                <input type="text" name="maa" placeholder="<?php echo $countryUrl; ?>"> 
                <input type="submit" value="Tallenna tiedot">
            </form>
        </div>

        <?php
    
    }  

    else {

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

<?php 
    }
include TEMPLATES_DIR.'foot.php'; ?>