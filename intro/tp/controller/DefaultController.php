<?php
namespace Controller;

use GUMP;
use Model\Database;
use Model\trait\Mail;
use Model\Utilisateur;
use Model\manager\UtilisateurManager;

class DefaultController{

    public function index(){
        require_once "../views/content/index.php";
    }
        
}
