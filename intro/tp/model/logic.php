<?php

function historisation($nomfichier, $e){

    
    //CHEMIN + FICHIER LOG
$dossier = "../logs/";
$chemin = "{$dossier}{$nomfichier}";

$message = "--ERREUR REQUETE LE".date("d/m/y H:i:s")."--<br>";
$message .= "[FICHIER] : ".$e->getFile()."<br>";
$message .= "[LIGNE] : ".$e>getLine()."<br>";
$message .= "[CODE] : ".$e->getMessage()."<br>";
$message .= "[IP USER] : ".$_SERVER["REMOTE_ADDR"]."<br>";   

//VERIFIER SI LE FICHEIR EXISTE SINON LE CREE $nomfichier

//si log/ n'existe aps , je le crée
if(!is_dir($dossier)){
    mkdir($dossier);
}

//SI FICHIER existe j'ajoute le contenu si je le recupere et j'en rajoute
if(file_exists($chemin)){
    //JE RECUPERE LE CONTENU DU FIXHIER
    $contenu = file_get_contents($chemin);
    $message = $contenu.$message;
}    

//SI LE FICHIER N'EXISTE PAS LA FONCTION CREE LE FICHIER AVEC LE CONTENU DONNEE
//SI LE FICHIER EXISTE, ECRASE LE FICHIER EXISTANT AVECLE CONTENU DONNEE
file_put_contents($chemin, $message);

}

?>
