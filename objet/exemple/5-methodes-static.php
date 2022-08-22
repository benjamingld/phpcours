<?php

//Quand les attribut sont en private, le getter et setter permet de modifier les attribut, chose que l(on ne peut pas faire sans.)
class Voiture{
    //  CE SONT MES ATTRIBUT DE LA CLASS VOITURE
    private $_marque = "Volkswagen";
    private $_km;
    private $_modele;
    private $_puissance;
    private $_color;
    private $_vitesse_max;
    private $_proprietaire;

    private static $_contrainte = "Permis obligatoire ";

    const MARQUE_FRANCAISE = "Peugeot";
    const MARQUE_ALLEMANDE = "Volkswagen";
    const MARQUE_ITALIENNE = "Ferrari";
    
//----------------------------------------------
        //GETTER (acceder a un attribut)
//----------------------------------------------
    public function get_marque($_marque){
        return $this->_marque;
    }

    public function get_modele($_modele){
        return $this->_modele;
    }

    public function get_puissance($_puissance){
        return $this->_puissance;
    }

    public function get_color($_color){
        return $this->_color;
    }
    public function get_vitesse_max($_vitesse_max){
        return $this->_vitesse_max;
    }
    public function get_proprietaire($_proprietaire){
        return $this->_proprietaire;
    }

//----------------------------------------------
        //SETTER (modifier un attribut)
//----------------------------------------------
    public function set_marque($_marque){
        if(in_array($_marque, [self::MARQUE_FRANCAISE,self::MARQUE_ALLEMANDE,self::MARQUE_ITALIENNE])){
            $this->_marque = $_marque;
        }else{
            $this->_marque = "Non défini";
        }
        
    }

    public function set_modele($m_odele){
        $this->_modele = $_modele;
    }

    public function set_puissance($_puissance){
        $this->_puissance = $_puissance;
    }

    public function set_color($_color){
        $this->_color = $_color;
    }

    public function set_vitesse_max($_vitesse_max){
        if(!is_int($_vitesse_max)){
            trigger_error("Un entier est requis".E_USER_WARNING);
            return;
        }
        $this->_vitesse_max = $_vitesse_max;
    }

    public function setProprietaire($_proprietaire){
        $this->_proprietaire = ucfirst(trim($_proprietaire));
    }    


    
    
    //LA METHODE QUI SE LANCE DES QUE JE CREE UN OBJET
    public function __construct($marque, $km, $modele, $proprietaire){
        echo "Initialisation de la classe ".__CLASS__."<br>";
        $this->set_marque($marque);
        $this->_km = $km;
        $this->_modele = $modele;
        $this->_proprietaire = $proprietaire;
        self::rapport();
    }

    public function affichageProprietaire(){
        if($this->_proprietaire){
            echo "Le proprietaire est : {$this->_proprietaire} <br>";
        }else{
            echo "Le proprietaire n'est pas défini <br>";
        }
    }

    
    private static function rapport(){
        echo "Véhicule ne possèdant aucun défaut";
    }

    public static function informations($pays){
        echo self::$_contrainte."{$pays}";
    }
}


echo Voiture::MARQUE_FRANCAISE;
$mavoiture = new Voiture("Volkswagen", 50000, "2008", "Jean");
var_dump($mavoiture);


Voiture::informations("Francais");