<?php
session_start();

// SI LA SESSION N'EXISTE PAAS JE REDIRIGE
if(!isset($_SESSION["mail"]) and !isset($_SESSION["pass"])) {
    header("location: 20-session-init.php");
}

//FOREACH PERMET DE LIRE LE CONTENU D'UN TABLEAU
foreach($_SESSION as $key =>$valeur) { 
    echo "Pour la clé $key, la valeur est : $valeur<br>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    bonjour<?=htmlspecialchars($_SESSION["mail"])?>
    <br>
    <p>Vous pouvez vous deco en <a herf="20-session-delete.php">cliquant ici</a></p>
    
</body>
</html>