<?php
include_once "config/setup.php";
$connexion = getPDO();
$sql = "SELECT * FROM utilisateur";

//a partir de la variable, je veut acceder a query
$result = $connexion->query($sql);
$users = $result->fetchAll(PDO::FETCH_ASSOC);
if($result->rowCount()){

    echo "Il y a des utilisaterus";
    echo("<ul>");
    foreach($users as $user){
        echo "id".$user['id']."nom{$user['id']}<br>";
    }
    echo("</ul>");
}else{
    echo "Aucun user";
}
?>