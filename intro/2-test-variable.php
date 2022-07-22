<?php 
    //Tester des variables

    $chaine = "Salut, je suis en cours";

    //savoir si la chaine existe
    if(isset($chaine)) {
       echo "{$chaine} : existe<br>";
    } else {
        echo "{$chaine} : n'existe pas<br>";
    }

    //savoir si la chaine est null
    if(is_null($chaine)) {
        echo "{$chaine} : est null<br>";
    } else {
        echo "{$chaine} : n'est pas null<br>";
    }

    //savoir si la chaine est un boolean
    if(is_bool($chaine)) {
        echo "{$chaine} : est boolean<br>";
    } else {
        echo "{$chaine} : n'est pas boolean<br>";
    }

    //savoir si la chaine est une chaine de caractère
    if(is_string($chaine)) {
        echo "{$chaine} : est une chaine de caractère<br>";
    } else {
        echo "{$chaine} : n'est pas une chaine de caractère<br>";
    }

    //savoir si la chaine est un entier
    if(is_int($chaine)) {
        echo "{$chaine} : est un entier<br>";
    } else {
        echo "{$chaine} : n'est pas un entier<br>";
    }

    //savoir si la chaine est un décimale
    if(is_float($chaine)) {
        echo "{$chaine} : est un décimal<br>";
    } else {
        echo "{$chaine} : n'est pas un décimal<br>";
    }

    //savoir si la chaine est un tableau
    if(is_array($chaine)) {
        echo "{$chaine} : est un tableau<br>";
    } else {
        echo "{$chaine} : n'est pas un tableau<br>";
    }

    //savoir si la chaine est un objet
    if(is_object($chaine)) {
        echo "{$chaine} : est un objet<br>";
    } else {
        echo "{$chaine} : n'est pas un objet<br>";
    }

    //savoir si la chaine est vide
    if(empty($chaine)) {
        echo "{$chaine} : est vide<br>";
    } else {
        echo "{$chaine} : n'est pas vide<br>";
    }

