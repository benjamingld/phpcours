<?php

require_once 'model/newsManager.php';

$newsManager = new NewsManager($connexion);
$tabNews = $newsManager->getAll();
var_dump($tabNews);

//$newsManager->insert("Bonjogluguyigur111", "jkbkvvghfyfkyttghgv,");
$newsManager->update("Bonsoir", "a personne", 7);
//$newsManager->delete(8);