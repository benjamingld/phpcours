<?php

include_once "config/setup.php";
$connexion = getPDO();
echo "<h1>REQUETES PREPARE</h1>";
//UPDATE REQUETES PREPARE MARQUEURS ORDINAUX

echo "<h2>UPDATE REQUETES PREPARE MARQUEURS ORDINAUX</h2>";

$sql = "UPDATE utilisateur SET nom=? WHERE id=?";
//donner la main a PO pour compiler la requete en memoire
$statement = $connexion->prepare($sql);
var_dump($statement);
$statement->execute(["Martin",1]);

//compter le nombre de lignes affectees
if($statement->rowCount()){
    echo"update realise1<br>";
} else{
    echo "update non realise1<br>";
}
//si les champs a modifier sont identiques, l'update ne se realise pas pour economiser de la memoire.


$statement->execute(["Thomas", 4]);
if($statement->rowCount()){
    echo"update realise2<br>";
} else{
    echo "update non realise2<br>";
}


echo "Voir code <br>";

echo "<h2>UPDATE REQUETES PREPARE BIND VALUE</h2>";

$sql = "SELECT * FROM utilisateur WHERE prenom = ? AND activation = ? LIMIT ?";
//preparation de la requetet
$statement = $connexion->prepare($sql);
//bindValue permet de specifier un type sur chacune des données
$statement->bindValue(1,"Anthony");
$statement->bindValue(2, true, PDO::PARAM_BOOL);
$statement->bindValue(3, 2, PDO::PARAM_INT);
//execution de la requete
$statement->execute();
//recuperation des resultats
$users = $statement->fetchAll(PDO::FETCH_ASSOC);

var_dump($users);
foreach($users as $key=> $user){
    echo "user : {$user['id']} - ".htmlspecialchars($user['prenom'])." - ".htmlspecialchars($user['nom'])." - ".htmlspecialchars($user['mail'])." <br>";
}

echo "<h2>UPDATE REQUETES PREPARE BIND PARAM</h2>";

$sql = "SELECT * FROM utilisateur WHERE prenom = ? AND activation = ? LIMIT ?";
//preparation de la requetet
$statement = $connexion->prepare($sql);

$prenom="Anthony";
$limit=2;
$actived=true;

$statement->bindParam(1,$prenom);
$statement->bindParam(2, $actived, PDO::PARAM_BOOL);
$statement->bindParam(3, $limit, PDO::PARAM_INT);
//execution de la requete
$statement->execute();
//recuperation des resultats
$users = $statement->fetchAll(PDO::FETCH_ASSOC);

var_dump($users);
foreach($users as $key=> $user){
    echo "user : {$user['id']} - {$user['prenom']} - {$user['nom']} - {$user['mail']} <br>";
}


echo "<h2>UPDATE REQUETES PREPARE MARQUEURS ASSOCIATIFS</h2>";

$sql = "UPDATE utilisateur SET nom=:nom WHERE id=:id";
//donner la main a PO pour compiler la requete en memoire
$statement = $connexion->prepare($sql);
var_dump($statement);
$statement->execute([":nom" => "Anthony", ":id" => 1]);

//compter le nombre de lignes affectees
if($statement->rowCount()){
    echo"update realise1<br>";
} else{
    echo "update non realise1<br>";
}
//si les champs a modifier sont identiques, l'update ne se realise pas pour economiser de la memoire.


$statement->execute([":nom" => "Thomas", "id" => 4]);
if($statement->rowCount()){
    echo"update realise2<br>";
} else{
    echo "update non realise2<br>";
}

echo "Voir code <br>";



echo "<h2>REQUETES PREPARE BINDCOLUMN</h2>";

$sql = "SELECT nom, prenom, mail FROM utilisateur limit 5";
$statement = $connexion->prepare($sql);

$statement->bindColumn(1, $nom);
$statement->bindColumn(2, $prenom);
$statement->bindColumn(3, $mail);

$statement->execute();

while($statement->fetch(PDO::FETCH_BOUND)){
    echo "{$nom} {$prenom} {$mail} <br>";
}
