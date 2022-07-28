<?php
    //attention verifier bien votre port
    $dsn = "mysql:host=localhost; dbname=bibliotheque2; charset=utf8; port=3306";
    $user = "root";

    //MAC ROOT
    $pass = "";

    $connexion = new PDO($dsn,$user,$pass);

    var_dump($connexion);


?>