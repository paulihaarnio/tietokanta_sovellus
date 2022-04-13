<?php

//Dropdown johon listaantuu kaikkien lisättyjen artistien nimet
function createArtistDropdown($selectedId = -1) {
    include MODULES_DIR.'add_artisti.php';

    $artists = getArtists();

    echo '<select name="artisti" id="artisti">';

    //loopataan artistit läpi
    foreach($artists as $a) {
        echo '<option value="'
        . $a["artistiID"] . '"'
        .($a["artistiID"] == $selectedId ? ' selected' : ''). '>'
        . $a["artistiNimi"]
        .'</option>';
    }
    echo "</select><br/>";
}

//Dropdown johon listaantuu kaikki lisätyt genret
function createGenreDropdown($selectedId = -1) {
    include MODULES_DIR.'add_genre.php';

    $genres = getGenres();

    echo '<select name="genre" id="genre">';

    //loopataan artistit läpi
    foreach($genres as $g) {
        echo '<option value="'
        . $g["genreID"] . '"'
        .($g["genreID"] == $selectedId ? ' selected' : ''). '>'
        . $g["genreNimi"]
        .'</option>';
    }
    echo "</select><br/>";
}

?>