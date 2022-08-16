<?php

include_once "config/setup.php";

$connexion = getPDO();

$sql = "INSERT INTO `utilisateur`(`nom`, `prenom`, `mail`, `ip`, `activation`) 
        VALUES (".$connexion->quote("PARIS").",".$connexion->quote("Anthony").",".$connexion->quote("anthony@test.com").",".$connexion->quote($_SERVER['REMOTE_ADDR']).",1)";

$retour = $connexion->exec($sql);
var_dump($retour,$connexion->lastInsertId());