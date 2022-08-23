<?php

class Ninja extends Personnage{
    private $classePerso;

    /**
     * Get the value of classePerso
     */ 
    public function getClassePerso()
    {
        return $this->classePerso;
    }

    /**
     * Set the value of classePerso
     *
     * @return  self
     */ 
    public function setClassePerso($classePerso)
    {
        $this->classePerso = $classePerso;

        return $this;
    }
}