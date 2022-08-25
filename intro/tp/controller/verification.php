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
   
}

