<?php
include('../src/templates/head.php');
echo "<h1>Kappaleen lisäys</h1>";
    echo'
    <form action="http://localhost" method="post">
    <label>Kappaleen nimi</label>
    <input type="text" name="kappaleNimi"> <br>
    <label>Kappaleen kesto</label>
    <input type="text" name="kesto"><br>
    <label>Artisti</label>
    <input type="text" name="artistiNimi">  <br>  
    <input type="submit" value="Lisää kappale">
    </form>';

include('../src/templates/foot.php');