<?php
require_once MODULES_DIR.'db.php'; // DB connection
include TEMPLATES_DIR.'head.php';
include MODULES_DIR.'add_playlist.php';

$kappaleID = $_GET['kappaleID'];
$userID = $_SESSION['userID'];

if(isset($userID) && isset($kappaleID)) {
    try {
        addSongToPlaylist($userID, $kappaleID);
    }catch(Exception $e) {
        echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
    }
}



include TEMPLATES_DIR.'foot.php';
?>