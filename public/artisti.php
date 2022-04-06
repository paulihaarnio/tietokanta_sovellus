<?php
include('../src/templates/head.php');
echo "<h1>Artistin lisäys</h1>";
    echo'
    <form action="add_artisti.php" method="post">
    <label>Artistin nimi</label>
    <input type="text" name="nimi"> <br>
    <label>Artistin syntymävuosi</label>
    <input type="text" name="svuosi"><br>
    <label>Syntymämaa</label>
    <input type="text" name="maa">    <br>   
    <br><input type="submit" value="Lisää artisti">
    </form>';

include('../src/templates/foot.php');