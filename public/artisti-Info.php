<?php
include TEMPLATES_DIR.'head.php';
include MODULES_DIR.'add_artisti.php';
include MODULES_DIR.'add_kappale.php';

//pilkotaan URL palasiksi = merkin kohdalta
$uri = parse_url(filter_input(INPUT_SERVER,'PATH_INFO'),PHP_URL_PATH);
$parameters = explode('=',$uri);
$id = $parameters[1];

//haetaan tietokannasta artistit ja kappaleet
$artist = getArtist($id);
$songs = getSongsfromArtist($id);
?>

<div class="main-container">
        <h2>Artisti</h2>
        <h4>Syntymävuosi:</h4>
        <table class="table table-striped">
            <tr>
                <th>Kappaleet</th>
            </tr>
            <tr><td></td></tr>

            <?php
                foreach($artist as $a){
                    echo "<tr><td>".$a["artistiNimi"]."</td><td>" . "</td><td>";
                }
            ?>
        </table>
    </div>

<?php include TEMPLATES_DIR.'foot.php';?>
