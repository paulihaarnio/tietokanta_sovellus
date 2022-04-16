<?php
include TEMPLATES_DIR.'head.php';
include MODULES_DIR.'add_artisti.php';
include MODULES_DIR.'add_kappale.php';

$uri = parse_url(filter_input(INPUT_SERVER,'PATH_INFO'),PHP_URL_PATH);
$parameters = explode('=',$uri);
$id = $parameters[1];

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
                foreach($info as $i){
                    echo "<tr><td>".$i["artistiNimi"]."</td><td>" . $i["kappaleNimi"]."</td><td>";
                }
            ?>
        </table>
    </div>

<?php include TEMPLATES_DIR.'foot.php';?>
