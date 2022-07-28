<?php

echo "<br><h1>Exercice 1</h1><br>";
echo "Créez une fonction possédant 2 arguments en entrée vérifiant si un chiffre et plus grand que l’autre ou égal. Utiliser l’opérateur spaceship et un switch pour analyser le résultat de l’opérateur.<br><br>";



    function dif($a,$b) {    
        
        $result = $a <=> $b;
        switch($result){
           case -1:
            echo "Le $a est inférieur à $b<br>";
            break;
           case 0:
            echo "Les 2 chiffres sont égaux<br>";
            break;
           case 1:
            echo "Le $a est supérieur à $b<br>";
            break;
        };
    }

    dif(4,25);
    dif(5,5);
    
     

echo "<br><h1>Exercice 2</h1><br>";
echo "<br>Inversez la chaîne de caractère “156987”, créer une fonction inversant les caractères d’une chaîne de caractères (NE PAS UTILISER STRREV…)
<br><br>";

    function inverse($chiffre){
//      $chiffre = "156987";
//      $chiffre = [0=>1, 1=>5, 2=>6, 3=>9, 4=>8, 5=>7];

        for($i=strlen($chiffre)-1; $i>=0; $i--){
            echo $chiffre[$i];
        }
    }

inverse("156987");


// $i = 5  donc  $chiffre[$i] = 7
// $i = 4  donc  $chiffre[$i] = 8
// $i = 3  donc  $chiffre[$i] = 9
// $i = 2  donc  $chiffre[$i] = 6
// $i = 1  donc  $chiffre[$i] = 5
// $i = 0  donc  $chiffre[$i] = 1

echo "<br><h1>Exercice 3</h1><br>";
echo "<br>Créez une fonction vous retournant l’acronyme d’une phrase. (NE PAS UTILISER DE REGEX CAR PAS ENCORE VU…)
Exemple : Bonjour je mange dehors.
Résultat : BJMD.<br><br>";

    function acronyme($mot){

        $mot = "Bonjour je mange dehors";

        $tab_chaine_info = explode(" ",$mot);
        var_dump($tab_chaine_info);
        $tab_chaine_info;

        for($i=0;$i<count($tab_chaine_info); $i++) {
            $chaine_info = $tab_chaine_info[$i];
            echo strtoupper($chaine_info[0]);

        }
    }

    acronyme("Bonjour je mange dehors");
   
?>