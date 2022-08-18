<!-- Ajout un utilisateur a la base de données -->

<?php
include_once "../exemple/config/setup.php";


try{
    $db = getPDO();    
    $db->beginTransaction();

    $sql = "INSERT INTO `utilisateur`(`nom`, `prenom`, `mail`, `ip`, `activation`) VALUES (?,?,?,?,?)";
    $statement = $db->prepare($sql);

    $statement->execute(["Dupond", "Jean", "j@test.com", "132.132.132.132", 1]);

    $db->commit();

}catch(PDOException $e){
    $db->rollBack();
    echo "Une erreur est survenue";
    var_dump($e);
}

