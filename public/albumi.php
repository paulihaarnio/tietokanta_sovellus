<?php
include('../src/templates/head.php');
echo "<h1>Albumin lisäys</h1>";
    echo'
    <form action="../src/modules/add_albumi.php" method="post">
    <label>Albumin nimi</label>
    <input type="text" name="albumiNimi"> <br>
    <label>Albumin tekovuosi</label>
    <input type="text" name="vuosi"><br>
    <label>Albumin genre</label>
    <input type="text" name="genre">  <br>
    <label>Albumin artisti</label>
    <input type="text" name="artisti">  <br>  
    <label>Albumin tuottaja</label>
    <input type="text" name="tuottaja">  <br>
    <input type="submit" value="Lisää albumi">
    </form>';

include('../src/templates/foot.php');