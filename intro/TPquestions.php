<?php

echo "Créez une fonction possédant 2 arguments en entrée vérifiant si un chiffre et plus grand que l’autre ou égal. Utiliser l’opérateur spaceship et un switch pour analyser le résultat de l’opérateur.<br><br>";

    $a = 4;
    $b = 25;

    $result = $a <=> $b;

    switch($result){
           case -1:
            echo "Le $a est inférieur a $b<br>";
            break;
           case 0:
            echo "Les 2 chiffres sont égaux<br>";
            break;
           case 1:
            echo "Le $a est supérieur a $b<br>";
            break;
    };
     
echo "<br>Inversez la chaîne de caractère “156987”, créer une fonction inversant les caractères d’une chaîne de caractères (NE PAS UTILISER STRREV…)
<br><br>";

    $chaine = "156987";



echo "<br>Créez une fonction vous retournant l’acronyme d’une phrase. (NE PAS UTILISER DE REGEX CAR PAS ENCORE VU…)
Exemple : Bonjour je mange dehors.
Résultat : BJMD.<br><br>";

    $mot = "Bonjour je mange dehors";

    $tab_chaine_info = explode(" ",$mot);
    var_dump($tab_chaine_info);

    for($i=0;$i<count($tab_chaine_info); $i++) {
        echo "{$tab_chaine_info[$i]}";
  }
?>