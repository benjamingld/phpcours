<?php

class Ninja extends Personnage{

    private $classePersonnage;


    public function getClassePersonnage(){return $this->classePersonnage;}
    public function setClassePersonnage($classePersonnage){
        $this->classePersonnage = $classePersonnage;
        return $this;
    }
}