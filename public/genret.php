<?php 
    include TEMPLATES_DIR.'head.php';
    include MODULES_DIR.'add_genre.php';

    //hae kaikki albumit tietokannasta
    $genres = getGenres();

?>
    <div class="main-container">
        <h2>Genret</h2>
        <table class="table table-striped">
            <tr>
                <th>Genre</th>
            </tr>
        

            <?php
                foreach($genres as $g) {
                    echo "<tr><td>".$g["genreNimi"]. "</td></tr>";
                }

            ?>
        </table>
    </div>

<?php include TEMPLATES_DIR.'foot.php';?>