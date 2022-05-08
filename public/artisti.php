<?php
include TEMPLATES_DIR.'head.php';
include MODULES_DIR.'add_artisti.php';

//Filtteroidaan POST-inputit (ei käytetä string-filtteriä, koska deprekoitunut)
    //Jos parametria ei löydy, funktio palauttaa null
    $name = filter_input(INPUT_POST, "nimi");
    $year = filter_input(INPUT_POST, "svuosi");
    $country = filter_input(INPUT_POST, "maa");

    $artistIDFromUrl = filter_input(INPUT_GET, "id");
    $nameUrl = filter_input(INPUT_GET, "name");
    $yearUrl = filter_input(INPUT_GET, "year");
    $countryUrl = filter_input(INPUT_GET, "country");

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