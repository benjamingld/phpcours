<?php

class Utilisateur{

    public $_id;
    public $_civilite;
    public $_nom;
    public $_prenom;
    public $_naissance;
    public $_email;
    public $_password;
    public $_date_creation;
    public $_ip;

    public function __construct($id, $civilite, $nom, $prenom, $naissance, $email, $password, $date_creation, $ip){
        $this->_id = $id;
        $this->_civilite = $civilite;
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_naissance = $naissance;
        $this->_email = $email;
        $this->_password = $password;
        $this->_date_creation = $date_creation;
        $this->_ip = $ip;

    }

}

$user1 = new Utilisateur(1, "Monsieur", "Vandamme", "Jean-Claude", "10-10-1990", "jcvd@test.com", 123456, "07-05-2020", "135.135.135.135");
var_dump($user1);