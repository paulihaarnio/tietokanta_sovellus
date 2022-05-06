<?php 
    include TEMPLATES_DIR.'head.php';
    include MODULES_DIR.'add_playlist.php';

    //hae kaikki albumit tietokannasta
    $playlist = getPlaylist();

?>

    <div class="main-container">
        <h2>Soittolista</h2>
        <table class="table table-striped">
            <tr>
                <th></th>
                <th>Nimi</th>
                <th>Artisti</th>
                <th>Kesto</th>
                <th></th>
            </tr>
        

            <?php

                if(!isset($_SESSION['userID'])) {
                    echo "<p style='color:#2159ff;'>Kirjaudu sisään käyttääksesi soittolistaa</p>";
                }else {
                    foreach($playlist as $s) {
                        echo "<tr><td><button id='".$s["mediaNimi"]."button' class='play' onClick=\"playPause('".$s["mediaNimi"]."')\">
                        <audio id='".$s["mediaNimi"]."' src='../media/".$s["mediaNimi"].".mp3'></audio><i id='".$s["mediaNimi"]."icon' class='bi bi-play-fill'></i></i></button></td>
                        <td>".$s["kappaleNimi"]."</td><td>" . $s["artistiNimi"]."</td><td>" . $s["kesto"]. "</td><td><a class='deletebtn' href='../src/modules/removeFromPlaylist.php?kappaleID=".$s["kappaleID"]."'><i class='bi bi-suit-heart-fill '></i>Poista soittolistasta</a></td>";
                    }
                }
                
            ?>
        </table>
    </div>

    <script>
        var aud = document.getElementById("ASong").children[0];
        var isPlaying = false;
        aud.pause();

        function playPause() {
            if (isPlaying) {
            aud.pause();
            } else {
            aud.play();
            }
            isPlaying = !isPlaying;
        }
    </script>

<?php include TEMPLATES_DIR.'foot.php';?>