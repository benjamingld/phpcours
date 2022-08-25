<?php
namespace Controller;

use PDO;
use GUMP;
use Model\Contact;
use Model\Database;
use Model\trait\Mail;
use Model\Utilisateur;
use Model\manager\ContactManager;
use Model\manager\UtilisateurManager;

//REDIRECT
if(!isset($_SESSION['mail']) && $_SERVER['REQUEST_URI'] === D_ROOT."profil.php"){
    header("Location: connexion.php");
}

//CONTROL
if($_SERVER['REQUEST_URI'] === D_ROOT."contact.php"){
    $info = Database::query("SELECT * FROM utilisateur");
    $info->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($info);
    $erreur = "";

    $gump = new GUMP("fr");

    // set validation rules
    $gump->validation_rules([
        'nom'           => 'required|max_len,50|min_len,3',
        'prenom'        => 'required|max_len,50|min_len,3',
        'mail'          => 'required|valid_email',
        'demande'       => 'required|min_len,2',
    ]);


    // on success: returns array with same input structure, but after filters have run
    // on error: returns false
    $valid_data = $gump->run(array_map("trim",$_POST));

    //SI IL N'Y A PAS D'ERREUR
    if (!$gump->errors()) {  
        //INSERTION EN BASE DE DONNEES
        $contactManager = new ContactManager(Database::getInstance());
        $contact = new Contact($valid_data);
        $retour = $contactManager->add($contact);
    }

}

if($_SERVER['REQUEST_URI'] === D_ROOT."connexion.php"){
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
            $userManager = new UtilisateurManager(Database::getInstance());
            $userManager->connect($valid_data['mail'], $valid_data['password']);

        switch($retour){
            case Utilisateur::CONNECT_EMAIL_MISS:
                $erreur = "Email inconnu";
                break;
            case Utilisateur::CONNECT_PASS_ERROR:
                $erreur = "Mot de pase invalide";
                break;

            default:
                //si ok creation de session + redirection
                $_SESSION['mail'] = $valid_data['mail'];
                $_SESSION['pass'] = $valid_data['pass'];
                header('Location: profil.php');
        }
    }
}

if($_SERVER['REQUEST_URI'] === D_ROOT."creation_compte.php"){
    
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
            $userManager = new UtilisateurManager(Database::getInstance());
            $user = new Utilisateur($valid_data);
            $retour = $userManager->createUser($user);
            switch($retour){
                case Utilisateur::ADD_CLIENT_DOUBLON:
                    $erreur = "Ce mail a déjà été utilisé";
                    break;
                case Utilisateur::ADD_CLIENT_OK:
                    Mail::sendMailUser($user->getEmail(), $user->getPassword());
                    break;
            }

    }
}

if($_SERVER['REQUEST_URI'] === D_ROOT."logout.php"){
    session_destroy(); 
    header('Location: connexion.php'); 
}
