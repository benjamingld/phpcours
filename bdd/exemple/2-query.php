<?php

include_once "config/setup.php";

$connexion = getPDO();

$sql = "SELECT * FROM utilisateur";

$result = $connexion->query($sql);

var_dump($result);