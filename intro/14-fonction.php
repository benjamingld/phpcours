<?php
//mode plus strict
//AVEC LES BALISES HTML , on place le declare au dessus du DOCTYPE.
declare(strict_types=1);

// =============================================================
//         DEFINITION DE LA FONCTION/PROCEDURE (PROTOTYPE)
// =============================================================

    echo "<hr><h2>PROTOTYPE FONCTION ET APPEL</h2>";

    //CREATION DE LA FONCTION
    function hello($name) {
        echo "Bonjout $name <br>";
    }

    //APPEL DE LA FONCTION
    hello("Julien");
    hello("Sofiane");
    hello("Sabrine");

    //DEFINITION DE LA FONCTION OU PROTOTYPAGE
    function affichage($age, $name, $heure="16h",string|float $passion="jeux") {
        echo "Bonjour, ".$name;
        echo "<br>";
        echo "Tu as : ".$age." ans";
        echo "<br>";
        echo "Il est : ".$heure;
        echo ", PASSION : ".$passion;
        echo "<hr>";
    }

    affichage(15,"anthony");
    affichage(15,"anthony","17h");
    affichage(15,"anthony","17h","foot");
    affichage(15,"anthony","16h","foot");


// =============================================================
//                      MULTIPLICATION
// =============================================================


    echo "<hr><h2>MULTIPLICATION</h2>";
    //DEUX ARGUMENTS DONNE = MULTIPLICATION
    function multiplication($a,$b){
        return $a*$b;
    }
    $result = multiplication(14,15);
    echo $result;


// =============================================================
//                      COMPTEUR DE LETTRE
// =============================================================


    echo "<hr><h2>COMPTEUR DE LETTRE</h2>";
    //PERMET DE COMPTER LE NOMBRE TOTAL DE LETTRE D'UN MOT
    function compteurdelettre($mot){
        return strlen($mot);
    }

    echo compteurdelettre("Bonjour à tous");



// =============================================================
//                      OPERATEUR ...
// =============================================================


    echo "<hr><h2>OPERATEUR ...</h2>";
    //pour avoir autant de parametre que l'on veut
    function add(...$number){
        $total = 0;
        var_dump($number);
        foreach($number as $value){
            $total = $total + $value;
            //equivalent
            // $total += $value;
        }
        return $total;
    }

    $somme = add(2,3,4,5,6);
    echo $somme;

// =============================================================
//                      INVERSE ...
// =============================================================
    
    
        echo "<hr><h2>INVERSE ...</h2>";
        function addbis($a,$b){
            return $a + $b;
        }

        echo addbis(...[1,2]);


// =============================================================
//                  PORTE VARIABLE + REFERENCE
// =============================================================
    
    
    echo "<hr><h2>PORTE VARIABLE + REFERENCE</h2>";

    $aux = "bonjour";

    //============ PASSAGE PAR COPIE DE VALEUR ===============

    // function porte($a){
    //     $a = "Au revoir";
    //     return $a;
    // }

    //======== PASSAGE PAR REFERENCE (espace mémoire) ========

    function porte(&$a){
        $a = "Au revoir";

    }

    echo "Avant l'appel de la fonction : ".$aux."<br>";
    echo porte($aux)."<br>";
    echo "Aprés l'appel de la fonction : ".$aux."<br>";


// =============================================================
//                     TYPAGE PARAMETRE
// =============================================================
    

    echo "<hr><h2>TYPAGE PARAMETRE</h2>";
    
    //double typage doit etre séparer par un | ex:float|int

    /**
     * function addition
     *
     * @param float|integer $a
     * @param float|integer $b
     * @param integer|null $c
     * @return integer|float
     */
    //ON PEUT UTILIER LE DOUBLE TYPAGE DEPUIS PHP 8.
    function addStrict(float|int $a, float|int $b, ?int $c=5):int|float{
        return $a+$b+$c;
    }

    echo addStrict (8,5);

    //erreur sur ce echo si on declare (strict_types=1).
    //sinon il a faire une convertion à la voler.
    //echo addStrict ("8",5);


// =============================================================
//                     FONCTION VARIABLE
// =============================================================
    

//VOID = PROCEDURE (NE RETOURNE RIEN)
echo "<hr><h2>FONCTION VARIABLE</h2>";
function hello1(string $name):void {
    echo "bonjour {$name}";
}
//https://www.php.net/manual/fr/language.variables.variable.php
hello1("Julien");

$func = "hello1";
$func ("Sébastien");

// =============================================================
//                     FONCTION ANONYME (CLOSURE)
// =============================================================
    
echo "<hr><h2>FONCTION ANONYME (CLOSURE)</h2>";

//PENSEZ UU POINT VIRGULE FINALE
$greet = function ($name) {
    echo "bonjour {$name}";
};

$greet("Antho");
//REDEFINITION DE LA VARIABLE
$greet = 1;
//JE NE PEUT PLUS APPELER LA FONCTION $GREET
// $greet ("Antho");


// =============================================================
//            FONCTIONS AVEC IMPORTATION DE VARIABLES
// =============================================================
    
echo "<hr><h2>FONCTIONS AVEC IMPORTATION DE VARIABLES</h2>";

$message = "HELLO";

$greet = function(string $name) use (&$message):void{
    echo "{$message} {$name}";
    $message = "Au revoir";
};

$greet("Anthony");
echo $message;
