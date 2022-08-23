<?php

class Mage extends Personnage{
    
    private $magie;

    public function getMagie(){return $this->magie;}
    public function setMagie($magie){
        $this->magie = $magie;
        return $this;
    }

}