<?php
include('../src/templates/head.php');
echo "<h1>Artistin lisäys</h1>";
    echo'
    <form action="http://localhost" method="post">
    <label>Artistin nimi</label>
    <input type="text" name="nimi"> <br>
    <label>Artistin syntymävuosi</label>
    <input type="text" name="svuosi"><br>
    <label>Artistin genre</label>
    <input type="text" name="genre">    
    <br><input type="submit" value="Lisää artisti">
    </form>';

include('../src/templates/foot.php');