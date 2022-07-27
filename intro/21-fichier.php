<?php
date_default_timezone_set("Europe/Paris");
//CREATION DOSSIER MKDIR
define("DOSSIER", "log/");
define("FICHIER",DOSSIER."mon-fichier-txt");

//CONTENU DE DEPART ICI ON VEUT ECRIRE DANS UN FICHEIR TEXTE DONC PAS DE <BR>
$contenu = "Départ\n";

//si log/ n'existe aps , je le crée
if(!is_dir(DOSSIER)){
    mkdir(DOSSIER);
}

//SI FICHIER existe j'ajoute le contenu si je le recupere et j'en rajoute
if(file_exists(FICHIER)){
    //JE RECUPERE LE CONTENU DU FIXHIER
    $contenu = file_get_contents(FICHIER);

}    

$contenu .= "Une nouvelle ligne - ".date("d/m/Y H:i:s") ."\n";
//J'AJOUTE LE CONTENU
file_put_contents(FICHIER, $contenu);