<?php 
    include TEMPLATES_DIR.'head.php';
    include MODULES_DIR.'add_kappale.php';

    $userID = $_SESSION['userID'];
    //hae kaikki albumit tietokannasta
    $songs = getSongs();
    $inPlaylist = songsInPlaylist($userID);

    $id = filter_input(INPUT_GET, "id");

    if(isset($id)) {
        try{
            deleteSong($id);
            echo '<div class="alert alert-success" role="alert">Kappale poistettu!!</div>';
        }catch(Exception $e){
            echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
        }
    }
?>

    <div class="main-container">
        <h2>Kappaleet</h2>
        <table class="table table-striped">
            <tr>
                <th style="width:60px"></th>
                <th>Nimi</th>
                <th>Artisti</th>
                <th>Kesto</th>
                <th></th>
                <th></th>
            </tr>

            <?php
                foreach($songs as $s) {
                    echo "<tr><td><button id='".$s["mediaNimi"]."button' class='play' onClick=\"playPause('".$s["mediaNimi"]."')\">
                        <audio id='".$s["mediaNimi"]."' src='../media/".$s["mediaNimi"].".mp3'></audio><i id='".$s["mediaNimi"]."icon' class='bi bi-play-fill'></i></i></button></td>
                        <td>".$s["kappaleNimi"]."</td><td>" . $s["artistiNimi"]."</td><td>" . $s["kesto"]. "</td><td>";
                    
                    if(in_array($s["kappaleID"], $inPlaylist)){
                        echo "<a class='deletebtn' href='../src/modules/removeFromPlaylist.php?kappaleID=".$s["kappaleID"]."'><i class='bi bi-suit-heart-fill '></i>Poista soittolistasta</a></td>";
                    }else {
                        echo "<a class='deletebtn' href='../src/modules/songToPlaylist.php?kappaleID=".$s["kappaleID"]."'><i class='bi bi-suit-heart'></i>Lisää soittolistaan</a></td>";
                    }
                        

                    echo "<td><a class='deletebtn' href='kappaleet.php?id=". $s["kappaleID"]."'><i class='bi bi-trash'></i> Poista kappale</a></td></tr>";
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