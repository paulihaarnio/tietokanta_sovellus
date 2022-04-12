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

?>