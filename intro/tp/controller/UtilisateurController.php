<?php
namespace Controller;

use GUMP;
use Model\Seo;
use Model\Mail;
use Model\Database;
use Model\Utilisateur;
use Model\manager\UtilisateurManager;

class UtilisateurController{

    public function creation(){
        $seo = new Seo(["title"=>"Création de compte", "meta_desc" => "Ma page d'accueil est super", "keywords"=> "m2i, cours, php, framework"]);   
        $gump = new GUMP("fr");
        $erreur = "";

        // set validation rules
        $gump->validation_rules([
            'civilite'    => 'required|contains,1;2',
            'nom'         => 'required|max_len,50|min_len,3',
            'prenom'      => 'required|max_len,50|min_len,3',
            'email'       => 'required|valid_email',
            'password'    => 'required|min_len,6',
            'naissance'   => 'required|date|min_age,18'
        ]);


        // on success: returns array with same input structure, but after filters have run
        // on error: returns false
        $valid_data = $gump->run(array_map("trim",$_POST));
        //SI IL N'Y A PAS D'ERREUR
        if (!$gump->errors()) {
            //JE N'AI PAS D'ERREURS
            // var_dump($valid_data);   
            //INSERTION EN BASE DE DONNEES
            $utilisateurManager = new UtilisateurManager(Database::getInstance());
            $utilisateur = new Utilisateur($valid_data);
            $retour = $utilisateurManager->add($utilisateur);
            switch($retour){
                case Utilisateur::ADD_CLIENT_DOUBLON :
                    $erreur = "Votre adresse e-mail est déjà présente dans notre base de données.";
                    break;
                case Utilisateur::ADD_CLIENT_OK :
                    Mail::sendMailUser($utilisateur->getEmail(),$utilisateur->getPassword());
                    break;
            }
            
        }
            require_once "../views/content/account.php";
            return ["seo" => $seo];
    }


    public function connexion(){
            $seo = new Seo(["title"=>"Connexion utilisateur", "meta_desc" => "Ma page d'accueil est super", "keywords"=> "m2i, cours, php, framework"]);   
            $erreur = "";
            $gump = new GUMP("fr");
        
            // set validation rules
            $gump->validation_rules([
                'mail'           => 'required|valid_email',
                'pass'           => 'required|min_len,6',
            ]);
        
        
            // on success: returns array with same input structure, but after filters have run
            // on error: returns false
            $valid_data = $gump->run(array_map("trim",$_POST));
        
            //SI IL N'Y A PAS D'ERREUR
            if (!$gump->errors()) {
                //JE N'AI PAS D'ERREURS
                //var_dump($valid_data);   
                    //VERIFICATION BASE DE DONNEES
                    //VERIFIER SI UN USER EXISTE
                    $utilisateurManager = new UtilisateurManager(Database::getInstance());
                    $retour = $utilisateurManager->connect($valid_data['mail'],$valid_data['pass']);
                    if(is_int($retour)){
                        switch($retour){
                            case Utilisateur::CONNECT_EMAIL_MISS :
                                $erreur = "E-mail inconnu";
                                break;
                            case Utilisateur::CONNECT_PASS_ERROR :
                                $erreur = "Mot de passe invalide";
                                break;
                        }  
                    } else {
                        $_SESSION['mail'] = $valid_data['mail'];
                        $_SESSION['pass'] = $valid_data['pass'];
                        header('Location: profil'); 
                    }
            }
            require_once "../views/content/connexion.php";
            return ["seo" => $seo];
        }

    public function profil(){
        $seo = new Seo(["title"=>"profil utilisateur", "meta_desc" => "Ma page d'accueil est super", "keywords"=> "m2i, cours, php, framework"]);   
        if(!isset($_SESSION['mail']) && $_SERVER['REQUEST_URI'] === D_ROOT."profil.php"){
            header("Location: connexion");
        }
        require_once "../views/content/profil.php";
        return ["seo" => $seo];
    }

    public function logout(){  
        session_destroy(); 
        header('Location: connexion'); 
    }
}