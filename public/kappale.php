<?php
include TEMPLATES_DIR.'head.php';
include TEMPLATES_DIR.'dropdown.php';
include MODULES_DIR.'add_kappale.php';

    $artistID = filter_input(INPUT_POST, "artisti", FILTER_SANITIZE_NUMBER_INT);
    $songName = filter_input(INPUT_POST, "kappaleNimi");
    $time = filter_input(INPUT_POST, "kesto");

    if(isset($artistID)) {
        addSong($artistID, $songName, $time);
    }

    $selectedID = isset($artistID) ? $artistID : 0;

?>
    <h1>Kappaleen lisäys</h1>
    
    <form action="../src/modules/add_kappale.php" method="post">
    <label>Artisti <?php createArtistDropdown($selectedID); ?></label> <br>
    <label>Kappaleen nimi</label>
    <input type="text" name="kappaleNimi"> <br>
    <label>Kappaleen kesto</label>
    <input type="text" name="kesto"><br>  
    <input type="submit" value="Lisää kappale">
    </form>

<?php include TEMPLATES_DIR.'foot.php'; ?>