<?php
$g=$Goods->find($_GET['id']);

echo "<h1 class='ct'>".$g['name']."</h1>";

?>