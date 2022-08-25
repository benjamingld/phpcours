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

class ContactController{

    public function contact(){
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
       
        require_once "../views/content/login.php";
    }


        
}
