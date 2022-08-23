<?php

class Ninja extends Personnage{
    private $rang;


    public function getRang()
    {
        return $this->rang;
    }

    public function setRang($rang)
    {
        $this->rang = $rang;

        return $this;
    }
}