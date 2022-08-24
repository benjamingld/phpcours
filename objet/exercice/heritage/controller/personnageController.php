<?php


$bdd1 = [
    "id" => 1,
    "nom" => "Naruto",
    "lvl" => 100,
    "hp" => 280,
    "mp"  => 75,
    "force" => 70,
    "image" => "https://www.seekpng.com/png/detail/975-9751497_render-uzumaki-naruto-petit-naruto-render.png",
    "dateCreation" => date("d-m-Y"),
    "activation" => 2,
    "description" => "Naruto l'hokage",
    "ip" => "125.125.125.142",
    "rang" => "Hokage"
];

$bdd2 = [
    "id" => 2,
    "nom" => "Sasuke",
    "lvl" => 90,
    "hp" => 260,
    "mp"  => 85,
    "force" => 20,
    "image" => "https://www.pngitem.com/pimgs/m/469-4693410_sasuke-uchiha-sasuke-png-sasuke-uchiha-render-transparent.png",
    "dateCreation" => date("d-m-Y"),
    "activation" => 2,
    "description" => "Sasuke le gros traitre",
    "ip" => "125.145.125.142",
    "magie" => "Feu"
];

$naruto = new Ninja($bdd1);
$sasuke = new Mage($bdd2);

var_dump($naruto,$sasuke);
$retourCombat = $naruto->Combat($sasuke);










