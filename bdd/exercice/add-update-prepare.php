<?php
include_once "../exemple/config/setup.php";
$connexion = getPDO();




$sqlverif = "SELECT * FROM utilisateur WHERE mail = ?";
$statementverif = $connexion->prepare($sqlverif);
$statementverif->execute(["paul@test.com"]);

if($statementverif->rowCount()){
    echo "USER paul@test.com existe déjà";
}else{

    $sql = "INSERT INTO `utilisateur` (`nom`,`prenom`,`mail`,`ip`,`activation`)
            VALUES (:nom, :prenom, :mail, :ip, :act)";
    $statement = $connexion->prepare($sql);
    $statement->execute([":nom" => "Marius", ":prenom" => "Paul", ":mail" =>"paul@test.com", ":ip" => $_SERVER['REMOTE_ADDR'], ":act" => 0]);

    if($statement->rowCount()){
        echo"insert realise<br>";
        $idUser = $connexion->lastInsertId();


        $statementverif->execute(["newmail@test.fr"]);

        if($statementverif->rowCount()){
            echo "Modification impossible car mail déjà present dans la base <br>";
        }else {
            $sql = "UPDATE utilisateur SET mail = ? , nom = ? , activation = ? WHERE id = ?";
            $statement = $connexion->prepare($sql);
            $statement->execute(["newmail@test.fr", "Raphael", 1, $idUser]);
            
            if($statement->rowCount()){
                echo "MODIF OK<br>";
            }else{
                echo "insert non realise<br>";
            }
        }
    }
}






