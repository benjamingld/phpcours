<!-- cree un film 
cree un produit relatif a ce film avec l'id recuperer
ajouter une location de ce produit a l'utilisateur--!>

<?php

include_once "../exemple/config/setup.php";

try{
    $db = getPDO();

    $db->beginTransaction();

    echo "--INSERTION FILM--<br>";
    $stm = $db->prepare("INSERT INTO `film`(`titre`, `description`, `date_parution`, `photo`) VALUES (?,?,?,?)");
    $stm->execute(["Le Loups de WallStreet","Film bien","2015-07-28","https://fr.web.img6.acsta.net/pictures/210/604/21060483_20131125114549726.jpg"]);
    echo "--EXECUTION FILM--<br>";

    $film_id = $db->lastInsertId();
    echo "--LAST INSERT ID FILM {$film_id}--<br>";

    echo "--INSERTION PRODUIT--<br>";
    $ref_produit = rand(1,50)."-XXX-LLDWS-XXX-".rand(1,80);
    $stm = $db->prepare("INSERT INTO `produit`(`ref`, `id_film`, `stock`, `id_etat`) VALUES (?,?,?,?)");
    $stm->execute([$ref_produit,$film_id,2,1]);
    echo "--EXECUTION PRODUIT--<br>";

    echo "--REF PRODUIT {$ref_produit}--<br>";

    echo "--INSERTION LOCATION--<br>";
    $stm = $db->prepare("INSERT INTO `location`(`id_user`, `ref_produit`, `date_location`) VALUES (?,?,NOW())");
    $stm->execute([1,$ref_produit]);
    echo "--EXECUTION LOCATION--<br>";

    $db->commit();

}catch(PDOException $e){
    $db->rollBack();
    echo "Une erreur est survenue";
    var_dump($e);
}
