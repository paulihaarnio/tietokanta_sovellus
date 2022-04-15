<?php 
    include TEMPLATES_DIR.'head.php';
    include MODULES_DIR.'add_kappale.php';

    //hae kaikki albumit tietokannasta
    $songs = getSongs();

    

?>

    <div class="main-container">
        <h2>Kappaleet</h2>
        <table class="table table-striped">
            <tr>
                <th></th>
                <th>Nimi</th>
                <th>Artisti</th>
                <th>Kesto</th>
            </tr>
        

            <?php
                foreach($songs as $s) {
                    echo "<tr><td><button class='play' onClick=\"playPause('".$s["mediaNimi"]."')\">
                        <audio id='".$s["mediaNimi"]."' src='../media/".$s["mediaNimi"].".mp3'></audio>&#9654;</button></td>
                        <td>".$s["kappaleNimi"]."</td><td>" . $s["artistiNimi"]."</td><td>" . $s["kesto"]. "</td></tr>";
                }
            ?>

        </table>
    </div>

    <script>
        var isPlaying = false;

        function playPause(nimi) {

            var aud = document.getElementById(nimi);

            if (isPlaying) {
            aud.pause();
            } else {
            aud.play();
            }
            isPlaying = !isPlaying;
        }
    </script>

<?php include TEMPLATES_DIR.'foot.php';?>