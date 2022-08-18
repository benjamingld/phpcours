<?php

class Voiture{
    //  CE SONT MES ATTRIBUT DE LA CLASS VOITURE
    public $_marque = "Volkswagen";
    public $_km;
    public $_modele;
    public $_puissance;
    public $_color;
    public $_vitesse_max;
    public $_proprietaire;

    //LA METHODE QUI SE LANCE DES QUE JE CREE UN OBJET
    public function __construct($marque, $km, $modele, $proprietaire){
        echo "Initialisation de la classe ".__CLASS__."<br>";
        $this->_marque = $marque;
        $this->_km = $km;
        $this->_modele = $modele;
        $this->_proprietaire = $proprietaire;
    }

    public function affichageProprietaire(){
        if($this->_proprietaire){
            echo "Le proprietaire est : {$this->_proprietaire} <br>";
        }else{
            echo "Le proprietaire n'est pas défini <br>";
        }
    }
}

//QQUAND AUCUN PARAMETTRE DANS LE CONSTRUCTEUR, LES PARANTHESES SONT FACULTATIVES
$mavoiture = new Voiture("Peugeot", 50000, "2008", "Jean");
//LANCEMENT DE LA METHODE AFFICHAGE PROPRIETAIRE
$mavoiture->affichageProprietaire();


$mavoiture2 = new Voiture("Nissan", 20000, "Skyline", "Abdel");
$mavoiture2->affichageProprietaire();

var_dump($mavoiture,$mavoiture2);