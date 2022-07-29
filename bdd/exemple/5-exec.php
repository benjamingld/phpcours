<?php
include_once "config/setup.php";
$connexion = getPDO();

$sql = "DELETE FROM utilisateur where id = 1";

?>


<?=$connexion->exec($sql); ?>