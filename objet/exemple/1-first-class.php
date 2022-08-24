<?php

class Voiture{
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


    /**
     * Get the value of _proprietaire
     */ 
    public function get_proprietaire()
    {
        return $this->_proprietaire;
    }

    /**
     * Set the value of _proprietaire
     *
     * @return  self
     */ 
    public function set_proprietaire($_proprietaire)
    {

        $this->_proprietaire = ucfirst(trim($_proprietaire));

        return $this;
    }

    /**
     * Get the value of _vitesse_max
     */ 
    public function get_vitesse_max()
    {
        return $this->_vitesse_max;
    }

    /**
     * Set the value of _vitesse_max
     *
     * @return  self
     */ 
    public function set_vitesse_max($_vitesse_max)
    {
        if(!is_int($_vitesse_max)){
            trigger_error('Un entier est requis',E_USER_WARNING);
            return;
        }
        $this->_vitesse_max = $_vitesse_max;

        return $this;
    }

    /**
     * Get the value of _color
     */ 
    public function get_color()
    {
        return $this->_color;
    }

    /**
     * Set the value of _color
     *
     * @return  self
     */ 
    public function set_color($_color)
    {
        $this->_color = $_color;

        return $this;
    }

    /**
     * Get the value of _puissance
     */ 
    public function get_puissance()
    {
        return $this->_puissance;
    }

    /**
     * Set the value of _puissance
     *
     * @return  self
     */ 
    public function set_puissance($_puissance)
    {
        $this->_puissance = $_puissance;

        return $this;
    }

    /**
     * Get the value of _modele
     */ 
    public function get_modele()
    {
        return $this->_modele;
    }

    /**
     * Set the value of _modele
     *
     * @return  self
     */ 
    public function set_modele($_modele)
    {
        $this->_modele = $_modele;

        return $this;
    }

    /**
     * Get the value of _km
     */ 
    public function get_km()
    {
        return $this->_km;
    }

    /**
     * Set the value of _km
     *
     * @return  self
     */ 
    public function set_km($_km)
    {
        $this->_km = $_km;

        return $this;
    }

    /**
     * Get the value of _marque
     */ 
    public function get_marque()
    {
        return $this->_marque;
    }

    /**
     * Set the value of _marque
     *
     * @return  self
     */ 
    public function set_marque($_marque)
    {
        $this->_marque = $_marque;

        return $this;
    }
}


//QUAND AUCUN PARAMETRE DANS LE CONSTRUCTEUR LES PARENTHESES SONT FACULTATIVES
$mavoiture = new Voiture("Peugeot", 50000, "2008","Jean");
//LANCEMENT DE LA METHODE AFFICHAGE PROPRIETAIRE
$mavoiture->affichageProprietaire();


$mavoiture->set_vitesse_max(230);
echo $mavoiture->get_vitesse_max();


$voiture2 = new Voiture("Nissan",20000,"Skyline", "Abdel");
$voiture2->affichageProprietaire();

var_dump($mavoiture,$voiture2);
$voiture2->set_proprietaire("    julien     ");
echo $voiture2->get_proprietaire();





$mavoiture2 = new Voiture("Nissan", 20000, "Skyline", "Abdel");
$mavoiture2->affichageProprietaire();

var_dump($mavoiture,$mavoiture2);

$mavoiture2->set_proprietaire = 100;
echo $mavoiture2->get_proprietaire();


//GENERER GETTER ET SETTER ET RAJOUTER UNE METHODE