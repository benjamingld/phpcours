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

    public function error(){
        header("HTTP/1.0 410 GONE");
        require_once()
    }
}
