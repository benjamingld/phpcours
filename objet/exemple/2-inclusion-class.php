<?php

require_once "../model/User.php";
require_once "../model/Voiture.php";

//DECLARATION DES UTILISATEURS
$user1 = new User(1, true, "Vandamme", "Jean-Claude", "10-10-1990", "jcvd@test.com", 123456, "07-05-2020", "135.135.135.135");
$user2 = new User(2, false, "Post", "Julie", "10-12-2000", "julie@test.com", 65874, "07-05-2021", "155.542.548.128");

var_dump($user1);
echo $user1->informationUtilisateur();

//GENERER GETTER ET SETTER ET RAJOUTER UNE METHODE
//QUI PERMET D'AFFICHER SOUS FORME D'UN TABLEAU HTML LES INFORMATIONS DE MON UTILISATEUR

//AFFICHAGE LIGNE PAR LIGNE
// $color = "blue";
// $user1->affichageTableau($color);

// $color = "red";
// $user2->affichageTableau($color);

//AFFICHAGE DINAMIQUE
$users = [$user1,$user2];
var_dump($users);

foreach($users as $user){
    echo $user->affichageTableau("red");
}




//QUAND AUCUN PARAMETTRE DANS LE CONSTRUCTEUR, LES PARANTHESES SONT FACULTATIVES
$mavoiture = new Voiture("Peugeot", 50000, "2008", "Jean");
//LANCEMENT DE LA METHODE AFFICHAGE PROPRIETAIRE
$mavoiture->affichageProprietaire();


$mavoiture->set_vitesse_max(230);
echo $mavoiture->get_vitesse_max();


$mavoiture2 = new Voiture("Nissan", 20000, "Skyline", "Abdel");
$mavoiture2->affichageProprietaire();

var_dump($mavoiture,$mavoiture2);

$mavoiture2->set_proprietaire = 100;
echo $mavoiture2->get_proprietaire();


//GENERER GETTER ET SETTER ET RAJOUTER UNE METHODE