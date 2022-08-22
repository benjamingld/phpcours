<?php

class Compteur{
    private $test;
    public static $cpt = 0;

    public function __construct(){
        $this->test++;
        self::$cpt++;
    }
}

$c1 = new Compteur;
$c2 = new Compteur;
$c3 = new Compteur;

echo Compteur::$cpt;