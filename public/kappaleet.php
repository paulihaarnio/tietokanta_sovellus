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
                <th>Nimi</th>
                <th>Kesto</th>
                <th>Artisti</th>
            </tr>
        

            <?php
                foreach($songs as $s) {
                    echo "<tr><td>".$s["kappaleNimi"]."</td><td>" . $s["kesto"]."</td><td>" . $s["artistiID"]. "</td></tr>";
                }

            ?>
        </table>

        <button id="ASong" onClick="playPause()">
            <audio
                src="../media/satulinna.mp3"
                autoplay
                loop
            ></audio>
            Satulinna
        </button>

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