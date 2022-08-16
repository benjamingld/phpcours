<?php
include_once "../exemple/config/setup.php";
$connexion = getPDO();

$sql = "INSERT INTO `utilisateur` (`nom`,`prenom`,`mail`,`ip`,`activation`)
        VALUES (:nom, :prenom, :mail, :ip, :act)";

$statement = $connexion->prepare($sql);
var_dump($statement);

$statement->execute([":nom" => "Marius", ":prenom" => "Paul", ":mail" =>"paul@test.com", ":ip" => $_SERVER['REMOTE_ADDR'], ":act" => 0]);

if($statement->rowCount()){
    echo"insert realise<br>";
}else{
    echo "insert non realise<br>";
}

$user_id = "SELECT * FROM utilisateur WHERE ";