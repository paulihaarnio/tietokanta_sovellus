<?php 
include TEMPLATES_DIR.'head.php';
include TEMPLATES_DIR.'dropdown.php';
include MODULES_DIR.'add_albumi.php'; 

    $artistID = filter_input(INPUT_POST, "artisti", FILTER_SANITIZE_NUMBER_INT);
    $genreID = filter_input(INPUT_POST, "genre", FILTER_SANITIZE_NUMBER_INT);
    $albumName = filter_input(INPUT_POST, "albumiNimi");
    $year = filter_input(INPUT_POST, "vuosi");
    $producer = filter_input(INPUT_POST, "tuottaja");

    if(isset($artistID) || isset($genreID)) {
        AddAlbum($artistID, $genreID, $albumName, $year, $producer);
    }

    $selectedID = isset($artistID) ? $artistID : 0;
    $selectedGenreID = isset($genreID) ? $genreID : 0;
?>

    <h1>Albumin lisäys</h1>
    <form action="albumi.php" method="post">
    <label>Artisti <?php createArtistDropdown($selectedID); ?></label> <br>
    <label>Artisti <?php createGenreDropdown($selectedGenreID); ?></label> <br>
    <label>Albumin nimi</label>
    <input type="text" name="albumiNimi"> <br>
    <label>Albumin tekovuosi</label>
    <input type="text" name="vuosi"><br> 
    <label>Albumin tuottaja</label>
    <input type="text" name="tuottaja">  <br>
    <input type="submit" value="Lisää albumi">
    </form>

<?php include('../src/templates/foot.php'); ?>