<?php 
    include TEMPLATES_DIR.'head.php';
    include MODULES_DIR.'add_kappale.php';

    //hae kaikki albumit tietokannasta
    $albums = getSongs();

?>

    <h2>Albumit</h2>
    <table class="table table-striped">
        <tr>
            <th>Nimi</th>
            <th>Kesto</th>
            <th>Artisti</th>
        </tr>
    

        <?php
            foreach($albums as $a) {
                echo "<tr><td>".$a["kappaleNimi"]."</td><td>" . $a["kesto"]."</td><td>" . $a["artistiID"]. "</td></tr>";
            }

        ?>
    </table>


<?php include TEMPLATES_DIR.'foot.php';?>