<?php


$bdd1 = [
    "id" => 1,
    "nom" => "Naruto",
    "lvl" => 100,
    "hp" => 280,
    "mp"  => 75,
    "rang" => "Hokage",
    "force" => 70,
    "image" => "https://www.seekpng.com/png/detail/975-9751497_render-uzumaki-naruto-petit-naruto-render.png",
    "dateCreation" => date("d-m-Y"),
    "activation" => 2,
    "ip" => "125.125.125.142"
];

$bdd2 = [
    "id" => 2,
    "nom" => "Sasuke",
    "lvl" => 90,
    "hp" => 260,
    "mp"  => 85,
    "magie" => "Feu",
    "force" => 20,
    "image" => "https://www.pngitem.com/pimgs/m/469-4693410_sasuke-uchiha-sasuke-png-sasuke-uchiha-render-transparent.png",
    "dateCreation" => date("d-m-Y"),
    "activation" => 2,
    "ip" => "125.145.125.142"
];

$naruto = new Ninja($bdd1);
$sasuke = new Ninja($bdd2);



$retourCombat = $sasuke->Combat($naruto);






