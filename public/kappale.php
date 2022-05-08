<?php
include TEMPLATES_DIR.'head.php';
include TEMPLATES_DIR.'dropdown.php';
include MODULES_DIR.'add_kappale.php';

    $artistID = filter_input(INPUT_POST, "artisti", FILTER_SANITIZE_NUMBER_INT);
    $songName = filter_input(INPUT_POST, "kappaleNimi", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $time = filter_input(INPUT_POST, "kesto", FILTER_SANITIZE_SPECIAL_CHARS);
    $songIDFromUrl = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
    $selectedID = isset($artistID) ? $artistID : 0;
    $songNameUrl = filter_input(INPUT_GET, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $timeFromUrl = filter_input(INPUT_GET, "time", FILTER_SANITIZE_SPECIAL_CHARS);

    if(isset($songIDFromUrl)) {
        try {
            updateSong($songIDFromUrl, $songName, $artistID, $time);
            //echo '<div class="alert alert-success" role="alert">Kappaleen '.$songName .' tiedot päivitetty!</div>';
        }catch(Exception $e) {
            echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
        }

        ?>

        <div class="main-container">
            <h1>Kappaleen muokkaus</h1>
            <form action="kappale.php?id=<?php echo $songIDFromUrl; ?>" method="post">
                <label class="dropdown">Artisti <?php createArtistDropdown($selectedID); ?></label>
                <label>Kappaleen nimi</label>
                <input type="text" name="kappaleNimi" placeholder="<?php echo $songNameUrl; ?>">
                <label>Kappaleen kesto</label>
                <input type="text" name="kesto" placeholder="<?php echo $timeFromUrl; ?>">
                <input type="submit" value="Tallenna tiedot">
            </form>
        </div>

        <?php
    
    }  
    else {

        if(isset($artistID)) {
            try {
                addSong($artistID, $songName, $time);
                echo '<div class="alert alert-success" role="alert">Kappale '.$songName .' lisätty!</div>';
            }catch(Exception $e) {
                echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
            }
            
        }

    ?>
        <div class="main-container">
            <h1>Kappaleen lisäys</h1>
            <form action="kappale.php" method="post">
                <label class="dropdown">Artisti <?php createArtistDropdown($selectedID); ?></label>
                <label>Kappaleen nimi</label>
                <input type="text" name="kappaleNimi">
                <label>Kappaleen kesto</label>
                <input type="text" name="kesto">
                <input type="submit" value="Lisää kappale">
            </form>
        </div>

<?php 
    }
include TEMPLATES_DIR.'foot.php'; ?>