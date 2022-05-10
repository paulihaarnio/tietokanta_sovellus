<?php 
    include TEMPLATES_DIR.'head.php';
    include MODULES_DIR.'add_playlist.php';

    if(isset($_SESSION['userID'])) {
        $userID = $_SESSION['userID'];
        $playlist = getPlaylist($userID);
    }
    

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

                if(!isset($userID)) {
                    echo "<p style='color:#2159ff;'>Kirjaudu sisään käyttääksesi soittolistaa</p>";
                }else {
                    foreach($playlist as $s) {
                        echo "<tr><td><button id='".$s["mediaNimi"]."button' class='play' onClick=\"playPause('".$s["mediaNimi"]."')\">
                        <audio id='".$s["mediaNimi"]."' src='../media/".$s["mediaNimi"].".mp3'></audio><i id='".$s["mediaNimi"]."icon' class='bi bi-play-fill'></i></i></button></td>
                        <td>".$s["kappaleNimi"]."</td><td>" . $s["artistiNimi"]."</td><td>" . $s["kesto"]. "</td><td><a class='deletebtn' href='removeFromPlaylist.php?kappaleID=".$s["kappaleID"]."'><i class='bi bi-suit-heart-fill '></i>Poista soittolistasta</a></td>";
                    }
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