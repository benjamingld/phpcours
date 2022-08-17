<?php
include_once "config/setup.php";
$connexion = getPDO();

try{

    $result = $connexion->query("SELECT * FROM utiliateur");
    $result1 = $result->fetch(PDO::FETCH_ASSOC);
    var_dump($result1);
}catch(PDOException $e){
    $x = "--ERREUR REQUETE LE".date("d/m/y H:i:s")."--<br>";
    $x = $x. "[FICHIER] : ".$e->getFile()."<br>";
    $x = $x. "[LIGNE] : ".$e->getLine()."<br>";
    $x = $x. "[CODE] : ".$e->getCode()."<br>";
    $x = $x. "[MESSAGE] : ".$e->getMessage()."<br>";
    $x = $x. "[IP USER] : ".$_SERVER["REMOTE_ADDR"]."<br>";
    echo $x;
;
}

echo "Salut a tous";