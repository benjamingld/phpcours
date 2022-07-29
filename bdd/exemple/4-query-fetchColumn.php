<?php
include_once "config/setup.php";
$connexion = getPDO();
$sql = "SELECT * FROM utilisateur";

?>

<?=$connexion->query($sql); ?>
