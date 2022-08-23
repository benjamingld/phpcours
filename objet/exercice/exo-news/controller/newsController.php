<?php

require_once 'model/newsManager.php';

$newsManager = new NewsManager($connexion);
$tabNews = $newsManager->getAll();

//$newsManager->insert("Bonjogluguyigur111", "jlglikbkvvghfyfkyttghgv,");
$newsManager->update("Bonkjhluihhiksoir", "a peguyliglyiursonne", 7);
//$newsManager->delete(8);


var_dump($tabNews);