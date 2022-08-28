<?php
namespace Model\trait;

trait Log{
    private $dossier = "../log/";


    public function historisation($nomfichier, $erreur):bool{
        //CHEMIN + FICHIER LOG
        $chemin = "{$this->dossier}{$nomfichier}";
    
        //GESTION DE MES ERREURS
        $message = "--ERREUR REQUETE LE ".date("d/m/y H:i:s")."--\n";
        $message .=  "[FICHIER] : ".$erreur->getFile()."\n";
        $message .=  "[LIGNE] : ".$erreur->getLine()."\n";
        $message .=  "[CODE] : ".$erreur->getCode()."\n";
        $message .=  "[MESSAGE] : ".$erreur->getMessage()."\n";
        $message .=  "[IP USER] : ".$_SERVER['REMOTE_ADDR']."\n";
    
    
        //SI LE DOSSIER N'EXISTE, PHP LE CREE AVEC MKDIR
        //IS_DIR($DOSSIER) RENVOI FALSE SI LE DOSSIER EXISTE
        if(!is_dir($this->dossier)){
            mkdir($this->dossier);
        }
    
        //POURLE FICHIER
        if(file_exists($chemin)){
            //RECUPERATION DU CONTENU + AJOUT DE MESSAGE
            $contenu = file_get_contents($chemin);
            $message = $contenu.$message;
        }
    
        //SI LE FICHIER N'EXISTE PAS LA FONCTION CREE LE FICHIER AVEC LE CONTENU DONNE
        //SI LE FICHIER EXISTE, ECRASE LE FICHIER EXISTANT AVEC LE CONTENU DONNE
        file_put_contents($chemin, $message);

        return true;
    }


    
}