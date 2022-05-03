<?php
include TEMPLATES_DIR.'head.php';
include MODULES_DIR.'add_artisti.php';
//include MODULES_DIR.'add_kappale.php';

//pilkotaan URL palasiksi / merkin kohdalta
$uri = parse_url(filter_input(INPUT_SERVER,'PATH_INFO'),PHP_URL_PATH);
$parameters = explode('/',$uri);
$id = $parameters[1];


//haetaan tietokannasta artistit ja kappaleet
$artist = getArtist($id);
?>

<div class="main-container">
        <a href="../artistit.php">Takaisin</a>
        <h2><?php foreach($artist as $a) { echo $a["artistiNimi"]; break;} ?></h2>
        <h4>Syntymävuosi: <?php foreach($artist as $a) { echo $a["svuosi"]; break;} ?></h4>
        <table class="table table-striped">
            <tr>
                <th>Kappale</th>
                <th>Kesto</th>
            </tr>
            

            <?php
                foreach($artist as $a){
                    echo "<tr><td>".$a["kappaleNimi"]."</td><td>". $a["kesto"] . "</td><td>";
                }
            ?>
        </table>
    </div>

<?php include TEMPLATES_DIR.'foot.php';?>
