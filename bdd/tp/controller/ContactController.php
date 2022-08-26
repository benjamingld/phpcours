<?php
namespace Controller;

use GUMP;
use Model\Seo;
use Model\Contact;
use Model\Database;
use Model\manager\ContactManager;

class ContactController{
    public function demande(){
    $seo = new Seo(["title"=>"Contactez-nous", "meta_desc" => "Ma page d'accueil est super", "keywords"=> "m2i, cours, php, framework"]);
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
        $contactManager->add(new Contact($valid_data));
    }
        require_once "../views/content/contact.php";
        return ["seo" => $seo];
    }
    

}