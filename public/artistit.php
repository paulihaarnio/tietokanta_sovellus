<?php 
    include TEMPLATES_DIR.'head.php';
    include MODULES_DIR.'add_artisti.php';
    include MODULES_DIR.'add_kappale.php';

    //hae kaikki artistit tietokannasta
    $artists = getArtists();

    $id = filter_input(INPUT_GET, "id");

    if(isset($id)) {
        try{
            deleteArtist($id);
            echo '<div class="alert alert-success" role="alert">Artisti poistettu!</div>';
        }catch(Exception $e){
            echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
        }
    }

?>


    <div class="main-container">
        <h2>Artistit</h2>
        <table class="table table-striped">
            <tr>
                <th>Nimi</th>
                <th>Syntymävuosi</th>
                <th>Maa</th>
                <th></th>
                <th></th>
            </tr>
        

            <?php

                foreach($artists as $artist) {
                    
                    echo "<tr><td><a href='artisti-Info.php?id=" .$artist['artistiID']."' value=".$artist['artistiID']." id=".$artist['artistiID'].">".$artist["artistiNimi"]."</a></td><td>" . $artist["svuosi"]."</td><td>" . $artist["maa"]."</td>";

                    echo "<td><a class='deletebtn' href='artistit.php?id=". $artist["artistiID"]."'><i class='bi bi-trash'></i><span class='btntext'> Poista artisti</span></a></td>";

                    echo "<td><a class='deletebtn' href='artisti.php?id=". $artist["artistiID"]. '&name='. $artist["artistiNimi"] .'&year='. $artist["svuosi"] . '&country='. $artist["maa"]."'><i class='bi bi-pencil-square'></i><span class='btntext'> Muokkaa</span></a></td></tr>";
                }

            ?>
        </table>
    </div>

<?php include TEMPLATES_DIR.'foot.php';?>

