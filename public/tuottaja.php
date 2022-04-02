<?php
include('../src/templates/head.php');
echo "<h1>Tuottajan lisäys</h1>";
    echo'
    <form action="http://localhost" method="post">
    <label>Tuottajan nimi</label>
    <input type="text" name="nimi"> <br>
    <label>Tuottajan syntymävuosi</label>
    <input type="text" name="svuosi"><br>
    <label>Syntymämaa</label>
    <input type="text" name="maa">  <br>
    <input type="submit" value="Lisää tuottaja">
    </form>';

include('../src/templates/foot.php');