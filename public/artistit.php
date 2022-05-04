<?php 
    include TEMPLATES_DIR.'head.php';
    include MODULES_DIR.'add_artisti.php';
    include MODULES_DIR.'add_kappale.php';

    //hae kaikki artistit tietokannasta
    $artists = getArtists();

?>


    <div class="main-container">
        <h2>Artistit</h2>
        <table class="table table-striped">
            <tr>
                <th>Nimi</th>
                <th>Syntymävuosi</th>
                <th>Maa</th>
            </tr>
        

            <?php

                foreach($artists as $artist) {
                    
                    echo "<tr><td><a href='artisti-Info.php?id=" .$artist['artistiID']."' value=".$artist['artistiID']." id=".$artist['artistiID'].">".$artist["artistiNimi"]."</a></td><td>" . $artist["svuosi"]."</td><td>" . $artist["maa"]."</td></tr>";
                }

            ?>
        </table>
    </div>

<?php include TEMPLATES_DIR.'foot.php';?>

