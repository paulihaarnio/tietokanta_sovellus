<?php 
include TEMPLATES_DIR.'head.php';
include TEMPLATES_DIR.'dropdown.php';
include MODULES_DIR.'add_albumi.php'; 

    $artistID = filter_input(INPUT_POST, "artisti", FILTER_SANITIZE_NUMBER_INT);
    $genreID = filter_input(INPUT_POST, "genre", FILTER_SANITIZE_NUMBER_INT);
    $albumName = filter_input(INPUT_POST, "albumiNimi", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $year = filter_input(INPUT_POST, "vuosi", FILTER_SANITIZE_NUMBER_INT);
    $producer = filter_input(INPUT_POST, "tuottaja", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(isset($artistID) || isset($genreID)) {
        try {
            AddAlbum($artistID, $genreID, $albumName, $year, $producer);
            echo '<div class="alert alert-success" role="alert">Albumi '.$albumName .' lisätty!</div>';
        }catch(Exception $e) {
            echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
        }
        
    }

    $selectedID = isset($artistID) ? $artistID : 0;
    $selectedGenreID = isset($genreID) ? $genreID : 0;
?>
    <div class="main-container">
        <h1>Albumin lisäys</h1>
        <form action="albumi.php" method="post">
            <label class="dropdown">Artisti <?php createArtistDropdown($selectedID); ?></label>
            <label class="dropdown">Genre <?php createGenreDropdown($selectedGenreID); ?></label>
            <label>Albumin nimi</label>
            <input type="text" name="albumiNimi">
            <label>Albumin tekovuosi</label>
            <input type="text" name="vuosi">
            <label>Albumin tuottaja</label>
            <input type="text" name="tuottaja"> 
            <input type="submit" value="Lisää albumi">
        </form>
    </div>

<?php include('../src/templates/foot.php'); ?>