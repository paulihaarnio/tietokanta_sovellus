<?php 
    include TEMPLATES_DIR.'head.php';
    include MODULES_DIR.'add_albumi.php';

    //hae kaikki albumit tietokannasta
    $albums = getAlbums();

?>
    <div class="main-container">
        <h2>Albumit</h2>
        <table class="table table-striped">
            <tr>
                <th>Nimi</th>
                <th>Tekovuosi</th>
                <th>Artisti</th>
                <th>Tuottaja</th>
            </tr>
        

            <?php
                foreach($albums as $a) {
                    echo "<tr><td>".$a["albumiNimi"]."</td><td>" . $a["tekovuosi"]."</td><td>" . $a["artistiID"]."</td><td>" . $a["tuottaja"]. "</td></tr>";
                }

            ?>
        </table>
    </div>

<?php include TEMPLATES_DIR.'foot.php';?>