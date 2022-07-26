<?php

include("vendor/autoload.php");

if (isset($_POST['send'])) {

    dump($_FILES);
    dump($_POST);

    //REPERTOIRE OU L ON VEUT STOCKER NOTRE FICHIER getcwd est le repertoir courant chemin complet jusqu'a notre fichier
    $targetPath = getcwd()."/image/";

    echo "REPERTOIRE OU L'ON VEUT STOCKER NOTRE FICHIER : ";
    dump($targetPath);

    //CHEMIN COMPLET FINAL + NOM DU FICHIER DE L'IMAGE
    //basename permet de donner le nom final de l'image
    $filePath = $targetPath.basename($_FILES["fichier"]["name"]);
    echo "chemin du fichier dans le dossier : ";
    dump($filePath);
    echo "nom du fichier : ";
    dump(basename($_FILES["fichier"]["name"]));


    //si un dossier n'existe pas on crée un dossier
    if(!file_exists($targetPath)){
        mkdir($targetPath);
    };
   
    //deplacer mon fichier telecharger
    if(move_uploaded_file($_FILES["fichier"]["tmp_name"], $filePath)){
        echo "TELECHARGER";
        echo "<img src=\"image/".basename($_FILES["fichier"]["name"])."\">";

    }else{
        echo "PAS TELECHARGER";
    }
    
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
<!-- enctype="multipart/form-data" obligatoire pour les fichier -->
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="fichier" id=""> 
        <input type="text" name="" id=""> 
        <input type="submit" name="send" value="Envoyer">
    </form>
</body>
</html>