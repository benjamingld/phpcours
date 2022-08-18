<?php
include_once "config/setup.php";

try{
    $db = getPDO();

    $db->beginTransaction();
    
    echo "--INSERTION USER--<br>";
    $stm = $db->prepare("INSERT INTO `utilisateur`(`nom`, `prenom`, `mail`, `ip`, `activation`) VALUES (?,?,?,?,?)");
    $stm->execute(["Dupond","Xavier","x.b@gmail.com","125.125.125.125",true]);
    echo "--EXECUTION USER--<br>";

    $user_id = $db->lastInsertId();
    echo "--LAST INSERT ID USER {$user_id}--<br>";

    echo "--INSERTION PRODUIT--<br>";
    $ref_produit = rand(1,50)."-XXX-D-XXX-".rand(1,80);
    $stm = $db->prepare("INSERT INTO `produite`(`ref`, `id_film`, `stock`, `id_etat`) VALUES (?,?,?,?)");
    $stm->execute([$ref_produit,1,1,1]);
    echo "--EXECUTION PRODUIT--<br>";

    echo "--REF PRODUIT {$ref_produit}--<br>";

    echo "--INSERTION LOCATION--<br>";
    $stm = $db->prepare("INSERT INTO `location`(`id_user`, `ref_produit`, `date_location`) VALUES (?,?,NOW())");
    $stm->execute([$user_id,$ref_produit]);
    echo "--EXECUTION LOCATION--<br>";

    $db->commit();


}catch(PDOException $e){
    $db->rollBack();
    echo "Une erreur est survenue";
    var_dump($e);
}

