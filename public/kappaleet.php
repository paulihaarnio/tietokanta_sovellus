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
                <th style="width:60px"></th>
                <th>Nimi</th>
                <th>Artisti</th>
                <th>Kesto</th>
                <th>Lisää soittolistaan</th>
                <th></th>
            </tr>
        

            <?php
                foreach($songs as $s) {
                    echo "<tr><td><button id='".$s["mediaNimi"]."button' class='play' onClick=\"playPause('".$s["mediaNimi"]."')\">
                        <audio id='".$s["mediaNimi"]."' src='../media/".$s["mediaNimi"].".mp3'></audio><i id='".$s["mediaNimi"]."icon' class='bi bi-play-fill'></i></i></button></td>
                        <td>".$s["kappaleNimi"]."</td><td>" . $s["artistiNimi"]."</td><td>" . $s["kesto"]. "</td><td><button class='heartbtn'><i class='bi bi-heart'></i></button></td>
                        <td><button class='deletebtn'><i class='bi bi-trash'></i> Poista kappale</button></td></tr>";
                }
            ?>

        </table>
    </div>

    <script>
        var isPlaying = false;

        function playPause(nimi) {

            var aud = document.getElementById(nimi);
            var button = document.getElementById(nimi + "button");
            var icon = document.getElementById(nimi + "icon");

            if (isPlaying) {
            aud.pause();
            icon.classList.remove("bi-pause-fill");
            icon.classList.add("bi", "bi-play-fill");
            } else {
            aud.play();
            icon.classList.remove("bi-play-fill");
            icon.classList.add("bi-pause-fill");
            }
            isPlaying = !isPlaying;
        }
    </script>

<?php include TEMPLATES_DIR.'foot.php';?>