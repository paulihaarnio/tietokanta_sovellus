<?php 
    include TEMPLATES_DIR.'head.php';
    include MODULES_DIR.'add_artisti.php';

    //hae kaikki artistit tietokannasta
    $artists = getArtists();

?>

    <h2>Artistit</h2>
    <table class="table table-striped">
        <tr>
            <th>Nimi</th>
            <th>Syntymävuosi</th>
            <th>Maa</th>
        </tr>
    

        <?php
            foreach($artists as $artist) {
                echo "<tr><td>".$artist["artistiNimi"]."</td><td>" . $artist["svuosi"]."</td><td>" . $artist["maa"]."</td></tr>";
            }

        ?>
    </table>


<?php include TEMPLATES_DIR.'foot.php';?>

