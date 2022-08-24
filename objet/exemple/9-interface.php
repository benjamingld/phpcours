<?php

use Voiture as GlobalVoiture;

class Voiture implements Bouger{
    //CE SONT MES ATTRIBUTS DE LA CLASSE VOITURE
    private $_marque = "Nissan";
    private $_km;
    private $_modele;
    private $_puissance;
    private $_color;
    private $_vitesse_max;
    private $_proprietaire;

    //LA METHODE QUI SE LANCE DES QUE JE CREE UN OBJET
    public function __construct($marque,$km,$modele,$proprietaire)
    {
        echo "Initialisation de la classe".__CLASS__."<br>";
        $this->_marque = $marque;
        $this->_km = $km;
        $this->_modele = $modele;
        $this->_proprietaire = $proprietaire;
    }

    public function affichageProprietaire(){
        if($this->_proprietaire){
            echo "Le propriétaire est : {$this->_proprietaire}<br>";
        }else {
            echo "Le propriétaire n'est pas défini<br>";
        }

    }


    public function get_proprietaire(){return $this->_proprietaire;}
    public function set_proprietaire($_proprietaire){
        $this->_proprietaire = ucfirst(trim($_proprietaire));
        return $this;
    }

    public function get_vitesse_max(){return $this->_vitesse_max;}
    public function set_vitesse_max($_vitesse_max){
        if(!is_int($_vitesse_max)){
            trigger_error('Un entier est requis',E_USER_WARNING);
            return;
        }
        $this->_vitesse_max = $_vitesse_max;
        return $this;
    }

    public function get_color(){return $this->_color;}
    public function set_color($_color){
        $this->_color = $_color;
        return $this;
    }

    public function get_puissance(){return $this->_puissance;}
    public function set_puissance($_puissance){
        $this->_puissance = $_puissance;
        return $this;
    }

    public function get_modele(){return $this->_modele;}
    public function set_modele($_modele){
        $this->_modele = $_modele;
        return $this;
    }

    public function get_km(){return $this->_km;}
    public function set_km($_km){
        $this->_km = $_km;
        return $this;
    }

    public function get_marque(){return $this->_marque;}
    public function set_marque($_marque){
        $this->_marque = $_marque;
        return $this;
    }

    public function deplacement($destination){
        echo "{$this->get_proprietaire()} part en direction de {$destination} avec sa {$this->get_modele()}, il est content il ".self::INFO;
    }
}



interface Bouger{

    const INFO = "ROULE";
    public function deplacement($destination);
}

$voiture = new Voiture("Peugeot", 5000, "208", "Anthony");
$voiture->deplacement("Paris");

//echo Voiture::INFO;