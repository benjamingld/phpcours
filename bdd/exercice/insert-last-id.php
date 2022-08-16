<?php
include_once "../exemple/config/setup.php";
$connexion = getPDO();


//REQUETE D'AJOUT
$sql = "INSERT INTO `utilisateur`( `nom`, `prenom`, `mail`, `ip`, `activation`) 
        VALUES ('PARIS',".$connexion->quote("Anthony").",".$connexion->quote("anthonyparis59@gmail.com").",'{$_SERVER['REMOTE_ADDR']}',1)";
//EXECUTION DE LA REQUETE
$connexion->exec($sql);
//RECUPERE LE DERNIER ID USER
$id_last_user = $connexion->lastInsertId();

//SI IL EXIST (SI L'AJOUT A FONCTIONNE)
if($id_last_user){
    //REQUETE AJOUT LOCATION
    $sql = "INSERT INTO `location`(`id_user`, `ref_produit`, `date_location`) VALUES ($id_last_user,'HB-201',NOW())";
    //EXECUTION DE LA REQUETE
    $connexion->exec($sql);
    $id_last_location = $connexion->lastInsertId();
}

if($id_last_location){
    echo "Le user {$id_last_user} a bien une nouvelle location {$id_last_location}";
}